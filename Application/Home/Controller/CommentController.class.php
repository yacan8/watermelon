<?php
namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller {
	/**
	 * [loading AJAX加载评论信息]
	 * @param  [Integer] get.id    [get参数 被评论的个体ID]
	 * @param  [Integer] get.type  [get参数 被评论的类型（1为景点、2为资讯、3为游记）]
	 * @param  [Integer] get.page  [get参数 加载的页数]
	 * @return [json] [评论信息]
	 */
	public function loading(){
		$id   = I('get.id');
		$page = I('get.page');
		$type = I('get.type');
		$CommentModel = D('Comment');
		$List = $CommentModel->getCommentByOtherId($id,$type,$page,4);
		$this->ajaxReturn($List,'json');
	}


	public function addComment(){
    	if(session('?login')){
			
			$CommentModel = M('Comment');
			$user_id = session('login');
			$time = date('Y-m-d H-i-s',time());
			$other_id = I('post.other_id');
			$receiver = I('post.receiver',0);
			$content  = I('post.content');
			$type  = I('post.type');
			if($other_id!=''&&$content!=''){
				$model = M('');
				$model->startTrans();//开启事务
				if($type=='2')//如果为资讯评论、修改冗余字段
					$coment_count = M('Infomation')->where(array('id'=>$other_id)) ->setInc('comment_count',1);//冗余字段浏览数+1
				else
					$coment_count = 1;
				$CommentData['other_id'] = $other_id;
				$CommentData['receiver'] = $receiver;
				$CommentData['content']  = $content;
				$CommentData['sender']   = $user_id;
				$CommentData['type']     = $type;
				$CommentData['time']     = $time;
				$commentResult = $CommentModel->add($CommentData);
				$content_id = $CommentModel->getLastInsID();

				// 消息类型
				// 1-话题被评论、
				// 2 话题评论被回复、
				// 3-话题被点赞、
				// 4-话题评论被点赞、
				// 5你被关注了、
				// 6话题中有人@你、
				// 7-游记被评论、
				// 8-游记评论被回复、 
				// 9-你的游记被点赞了、
				// 10-资讯评论被回复、
				// 11- 你的个人中心被留言了、
				// 12-你的留言被回复了
				$MessageModel = M('Message');
				// 添加被回复用户的消息通知
				if($receiver!='0'){//添加消息
					$mesData['user_id']    = $receiver;
					$mesData['state']      = (bool)0;
					if($type=='3')
						$mesData['type'] = 8;
					else if($type =='2')
						$mesData['type'] = 10;
					$mesData['time']       = $time;
					$mesData['content_id'] = $content_id;
					$mesResult = $MessageModel->add($mesData);
				}else{
					$mesResult = 1;
				}

				// 添加被评论游记的用户的消息通知
				if($type == '3'){
					$author = M('TravelNote')->where(array('id'=>$other_id))->getField('user_id');
					if($user_id!=$author){//如果发表者不等于作者、则添加消息
						$messageData['user_id']    = $user_id;
						$messageData['state']      = (bool)0;
						$messageData['type']       = 7;
						$messageData['content_id'] = $content_id; 
						$messageData['time']       = $time;
						$messsageResult = $MessageModel->add($messageData);
					}
				}else{
					$messsageResult=1;
				}


				//添加动态
				// 动态类型、
				// 1-评论了资讯* 、
				// 2-在资讯*中回复了*、
				// 3-评论了景点*、
				// 4-点赞了游记、
				// 5-在景点*中上传了*张照片、
				// 6-在城市*中添加了想去标记、
				// 7-在城市*中添加了去过标记、
				// 8-在景点*中添加想去标记、
				// 9-在景点*中添加去过标记、
				// 10-点赞了景点*、
				// 11-评论了装备*、
				// 12-发表了游记*、
				// 13-在游记*中回复了*、
				// 14-发表了话题*、
				// 15-在帖子*中发表了评论、
				// 16-在帖子*中回复了*、
				// 17-点赞了话题*、
				// 18-点赞了话题*中的评论
				// 19-上传了*张照片
				// 20-评论了游记*

				// 动态content_id内容ID
				// 1-评论ID、
				// 2-评论ID、
				// 3-景点ID、4-点赞ID、
				// 5-为0、
				// 6-城市想去ID、
				// 7-城市去过ID、
				// 8-景点想去ID、
				// 9-景点去过ID、
				// 10-点赞ID、
				// 11-装备ID、
				// 12-游记ID、
				// 13-评论ID、
				// 14-话题ID、
				// 15话题评论ID、
				// 16-话题评论ID、
				// 17-话题点赞ID、
				// 18-话题点赞ID
				// 19-为0
				// 20-评论ID
				if($type=='2'){//为评论了资讯
					if($receiver=='0'){//直接评论
						$dynamicsData['type'] = 1;
					}else{//回复评论
						$dynamicsData['type'] = 2;
					}
				}else if($type=='3'){
					if($receiver=='0'){//直接评论
						$dynamicsData['type'] = 20;
					}else{//回复评论
						$dynamicsData['type'] = 13;
					}
				}
				$dynamicsData['content_id'] = $content_id;
				$dynamicsData['user_id'] = $user_id;
				$dynamicsData['time'] = $time;
				$dynamicsResult = M('Dynamics')->add($dynamicsData);

				if($commentResult!==false&&$mesResult!==false&&$coment_count!==false&&$dynamicsResult!==false&&$messsageResult!==false){
					$json['Code'] = '200';
					$json['Message'] = '评论成功';
					$model->commit();
				}else{
					$json['Code'] = '201';
					$json['Message'] = '评论失败';
					$model->rollback();
				}

			}else{
				$json['Code'] = '202';
				$json['Message'] = '内容不能为空';
			}

		}else{
			$json['Code'] = '203';
			$json['Message'] = '你还没有登录';
		}
    	$this->ajaxReturn($json,'json');
    }
}
