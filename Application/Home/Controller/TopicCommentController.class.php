<?php
namespace Home\Controller;
use Think\Controller;
class TopicCommentController extends Controller {

    public function loading(){
        $topic_id = I('get.topic_id');
        $TopicCommentModel = D('TopicComment');
        $List = $TopicCommentModel->getByTopicId($topic_id,1,4);
        if(IS_AJAX)
            echo json_encode($List);
    }


    public function addComment(){
    	
    	if(session('?login')){
			$model = M('');
			$TopicCommentModel = D('TopicComment');
			$result = $TopicCommentModel->create();
			if($result){
				$user_id = session('login');
				$ImgStr = I('post.imgStr','');
				$TopicCommentModel->sender = session('login');
				$TopicCommentModel->time = date('Y-m-d H-i-s',time());
				$TopicCommentModel->zan_count = 0;
				
				$model->startTrans();//开启事务
				$content = I('post.content','','htmlspecialchars_decode');
				$messageReplyData = $TopicCommentModel->checkAndSendMessage($content);//检查是否符合@回复


				$TopicCommentResult = $TopicCommentModel->add();
				$other_id = $TopicCommentModel->getLastInsID();
				$topic_id = I('post.topic_id');
				$comment_id = I('post.comment_id');
				if($ImgStr != ''){
					$ImgStr = substr($ImgStr,0,-1);
					$TopicPictrueModel = D('TopicPicture');
					$PictrueResult = $TopicPictrueModel->addDataByTypeAndImgStr($other_id,2,$ImgStr);
				}
				$j = 0;
				$messageData = array();
				$topic_user_id = M('Topic')->where(array('id'=>$topic_id))->getField('user_id');
				if($comment_id == 0){//如果为评论信息、评论信息不存在@操作
					$comment_count_up = M('Topic')->where(array('id'=>$topic_id))->setInc('comment_count',1);
					if($topic_user_id!=$user_id){//如果评论者不为自己
						$messageData[$j]['content_id'] = $other_id;//消息数据
						$messageData[$j]['time'] = date('Y-m-d H-i-s',time());
						$messageData[$j]['type'] = 1;
						$messageData[$j]['user_id'] = $topic_user_id;
						$j++;
					}
					//发表动态类型
					$dynamicsData['type'] = 15;



				}else{//如果为回复信息
					$comment_user_id = $TopicCommentModel->where(array('id'=>$comment_id))->getField('sender');
					if($comment_user_id==$topic_user_id && $comment_user_id!=$user_id){//评论者==话题者!=发送者
						$messageData[$j]['content_id'] = $other_id;//消息数据
						$messageData[$j]['time'] = date('Y-m-d H:i:s',time());
						$messageData[$j]['type'] = 2;
						$messageData[$j]['user_id'] = $topic_user_id;
						$j++;
					}else if($comment_user_id!=$topic_user_id){


						if($topic_user_id!=$user_id){//评论者!=话题者==发送者
							$messageData[$j]['content_id'] = $other_id;//话题者接收消息
							$messageData[$j]['time']       = date('Y-m-d H:i:s',time());
							$messageData[$j]['type']       = 2;
							$messageData[$j]['user_id']    = $topic_user_id;
							$j++;
						}
						if($comment_user_id!=$user_id){
							//评论者发送消息
							$messageData[$j]['content_id'] = $other_id;//评论者接收消息
							$messageData[$j]['time']       = date('Y-m-d H:i:s',time());
							$messageData[$j]['type']       = 2;
							$messageData[$j]['user_id']    = $comment_user_id;
							$j++;
						}
					}


					
					// 是否存在@ 如果存在添加@接收信息。 $messageData[1]、$messageData[2]
					/* Code... */
					if($messageReplyData!==false){
						$messageData[$j]['content_id'] = $other_id;//评论者接收消息
						$messageData[$j]['time']       = date('Y-m-d H:i:s',time());
						$messageData[$j]['type']       = 6;
						$messageData[$j]['user_id']    = $messageReplyData['user_id'];

						$j++;
					}

	

					$comment_count_up = 1;
					$dynamicsData['type'] = 16;//动态类型
				}

				
				if(count($messageData)!=0){
					$MessageModel = M('Message');
					$MessageResult = $MessageModel->addAll($messageData);
				}else
					$MessageResult = 'no_message';


				// 添加动态
				$dynamicsData['user_id'] =$user_id;
				$dynamicsData['content_id'] =$other_id;
				$dynamicsData['time'] = date('Y-m-d H-i-s',time());
				$dynamicsResult = M('Dynamics')->add($dynamicsData);
				
				if($TopicCommentResult!=0&&$comment_count_up!=0&&$MessageResult!==false&&$dynamicsResult!==false){
					if($ImgStr!= '' ){
						if($PictrueResult!=0){
							$message = '200';
							$model->commit();
						}else{
							$message = '发表失败';
							$model->rollback();
						}
					}else{
						$message = '200';
						$model->commit();
					}
				}else{
					$message = '发表失败';
					$model->rollback();
				}
				session('message',$message);
				if($comment_id=='0'){
					$this->redirect('Topic/detail',array('id'=>$topic_id,'sort_type'=>'time_down'));
				}else{
					// 如果为回复，返回当前评论页面
					$sort_type = I('get.sort_type','');
					$p = I('get.p',1);
					$this->redirect('Topic/detail',array('id'=>$topic_id,'sort_type'=>$sort_type,'p'=>$p));
					
				} 

			}else{
				// echo '数据创建失败';
				session('message',$message);
				$this->redirect('Topic/detail',array('id'=>$topic_id,'sort_type'=>'time_down'));
			}
		}else{
			// 未登录
			$this->redirect('Login/index');
		}
    }
}