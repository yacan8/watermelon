<?php
namespace Home\Controller;
use Think\Controller;
class AttentionController extends Controller{


	public function AjaxAttention(){
		if(IS_AJAX){
			if(session('?login')){
				$model = M('');
				$model->startTrans();//开启事务
				$follow_id = I('post.follow_id');
				$user_id = session('login');
				$AttentionModel = D('Attention');
				$list = $AttentionModel->checkFollow($user_id,$follow_id);
				if(count($list)==0){//如果为第一次关注
					$data['Attention_id']  = $follow_id;
					$data['user_id'] 	= $user_id;
					$data['delete_tag'] = (bool)0;
					$result = $AttentionModel->add($data);
					$content_id = $AttentionModel->getLastInsID();

					
					$mesData['type'] = 5;
					$mesData['user_id'] = $follow_id;
					$mesData['content_id'] = $content_id;
					$mesData['time'] = date('Y-m-d H:i:s',time());
					$mesData['state'] = (bool)0;
					$MessageModel = M('Message');
					$messageResult = $MessageModel->add($mesData);

				}else{//曾经点收藏
					if($list[0]['delete_tag'] == '1')
						$data['delete_tag'] = (bool)0;//解决sql语句自动把bit转化为string问题
					else if($list[0]['delete_tag'] == '0')
						$data['delete_tag'] = (bool)1;
					$result = $AttentionModel->where("id=".$list[0]['id'])->save($data);
					$messageResult = 1;//假装有消息添加成功
				}
				if($result!=0){
					if(count($list)==0||$list[0]['delete_tag'] == '1'){
						if($messageResult!=0){
							$json['Code'] = '200';
							$json['Message'] = '关注成功';
							$model->commit();
						}else{
							$json['Code'] = '202';
							$json['Message'] = '操作失败';
							$model->rollback();
						}

					}else{
						$json['Code'] = '201';
						$json['Message'] = '取消关注成功';
						$model->commit();
					}
				}else{
					$json['Code'] = '202';
					$json['Message'] = '操作失败';
					$model->rollback();
				}
				// echo $CollectionModel->getLastSql();
			}else{
				$json['Code'] = '199';
				$json['Message'] = '您还未登录';
			}
			echo json_encode($json);
		}
	}
}