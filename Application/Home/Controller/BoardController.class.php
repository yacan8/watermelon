<?php
namespace Home\Controller;
use Think\Controller;
class BoardController extends Controller{


	public function board(){
		if(session('?login')){
			$board_id = I('post.board_id');
			$receiver = I('post.receiver');
			$user_id = I('post.user_id');
			$content = I('post.content');
			$time = date('Y-m-d H:i:s',time());
			$m = M('');
			$m->startTrans();
			if($board_id == '0'){
				$Model = D('Board');
				$data['user_id'] = $user_id;
				$data['message_user_id'] = session('login');
				
			}else{
				$Model = D('BoardReply');
				$data['board_id'] = $board_id;
				$data['receiver'] = $receiver;
				$data['sender'] = session('login');
			}
			$data['content'] = $content;
			$data['time'] = $time;

			$boardResult = $Model->add($data);
			if($boardResult!==false){
				$MessageData['time'] = $time;
				$MessageData['content_id'] = $Model->getLastInsID();
				if($board_id=='0'){
					if($user_id!=session('login')){
						$MessageData['user_id'] = session('login');
						$MessageData['type'] = 11;
					}
				}else{
					$MessageData['user_id'] = $receiver;
					$MessageData['type'] = 12;
				}
				$MessageResult = M('Message')->add($MessageData);
				if($MessageResult!==false){
					$json['code'] = 200;
					$json['mes'] = '操作成功';
					$m->commit();
				}else{
					$json['code'] = 201;
					$json['mes'] = '操作失败';
					$m->rollback();
				}
			}else{
				$json['code'] = 201;
				$json['mes'] = '操作失败';
			}
		}else{
			$json['code'] = 199;
			$json['mes'] = '未登录';
		}
		echo json_encode($json);

	}

}