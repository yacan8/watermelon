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
			if($other_id!=''&&$content!=''){
				$model = M('');
				$model->startTrans();//开启事务

				$coment_count = M('Infomation')->where(array('id'=>$other_id)) ->setInc('comment_count',1);//冗余字段浏览数+1

				$CommentData['other_id'] = $other_id;
				$CommentData['receiver'] = $receiver;
				$CommentData['content']  = $content;
				$CommentData['sender']   = $user_id;
				$CommentData['type']     = 2;
				$CommentData['time']     = $time;

				$commentResult = $CommentModel->add($CommentData);

				if($receiver!=0){//添加消息
					$content_id = $CommentModel->getLastInsID();
					$mesData['user_id']    = $receiver;
					$mesData['state']      = (bool)0;
					$mesData['type']       = 4;
					$mesData['time']       = $time;
					$mesData['content_id'] = $content_id;
					$mesResult = M('Message')->add($mesData);
				}else{
					$mesResult = 1;
				}



				if($commentResult!=0&&$mesResult!=0&&$coment_count!=0){
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
