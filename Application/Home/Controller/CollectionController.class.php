<?php
namespace Home\Controller;
use Think\Controller;
class CollectionController extends Controller{


	public function AjaxCollecting(){
		if(IS_AJAX){
			if(session('?login')){
				$collect_id = I('post.collect_id');
				$type = I('post.type');
				$user_id = session('login');
				$CollectionModel = D('Collection');
				$list = $CollectionModel->CheckIsCollected($collect_id,$user_id,$type);
				if(count($list)==0){//如果为第一次收藏
					$data['other_id']  	= $collect_id;
					$data['user_id'] 	= $user_id;
					$data['type']    	= $type;
					$data['delete_tag'] = (bool)0;
					$result = $CollectionModel->add($data);
				}else{//曾经点收藏
					if($list[0]['delete_tag'] == '1')
						$data['delete_tag'] = (bool)0;//解决sql语句自动把bit转化为string问题
					else if($list[0]['delete_tag'] == '0')
						$data['delete_tag'] = (bool)1;
					$result = $CollectionModel->where("id=".$list[0]['id'])->save($data);
				}
				if($result !=0){
					if(count($list)==0||$list[0]['delete_tag'] == '1'){
						$json['Code'] = '200';
						$json['Message'] = '收藏成功';
					}else{
						$json['Code'] = '201';
						$json['Message'] = '取消收藏成功';
					}
				}else{
					$json['Code'] = '202';
					$json['Message'] = '操作失败';
				}
				// echo $CollectionModel->getLastSql();
			}else{
				$json['Code'] = '199';
				$json['Message'] = '您还未登录';
			}
			echo json_encode($json);
		}
	}


	public function delete(){
		if(session('?login')){
			$user_id = session('login');
			$id = I('get.id');
			$CollectionModel = M('Collection');
			$data = $CollectionModel->find($id);
			if($data!=null&&$data['user_id']==$user_id){
				$data['delete_tag'] = (bool)1;
				if($CollectionModel->where(array('id'=>$id))->save($data)!==false)
					$this->success('取消收藏成功');
				else
					$this->error('操作失败');
			}else{
				$this->error('错误');
			}
		}else{
			$this->error('请先登录');
		}
	}
}