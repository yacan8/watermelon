<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {


	public function comment(){
		$other_id = I('get.other_id',0);
		$user_id = I('get.user_id',0);
		$type = I('get.type',2);
		$p = I('get.p',1);
		$CommentModel = D('Comment');
		if($other_id!=0){//如果选中了景点
			if($type==3){
				$Model = M('TravelNote');
			}else{
				$Model = M('Infomation');
			}
			$name = $Model->where(array('id'=>$other_id))->getField('title');
			$this->assign('name',$name);
			$e_name = str_sub($name,10);
			$this->assign('e_name',$e_name);
		}
		if($user_id!=0){//如果选中了用户
			$userinfo = D("Login")->getInfoByid($user_id);
			$this->assign('userinfo',$userinfo);
		}
		$count = 20;//每页显示个数
		$all_count = $CommentModel->getCount($other_id,$user_id,$type);//获取全部的数量
		$commentList = $CommentModel->getList($other_id,$user_id,$type,$p,$count);
		$Page       = new \Think\Page($all_count,$count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出

		$this->assign('page',$show);
		$this->assign('commentList',$commentList);
		$this->assign('all_count',$all_count);
		$this->assign('type',$type);
		$this->assign('other_id',$other_id);
		$this->assign('user_id',$user_id);
		$this->display();

	}


	//评论删除active
	public function delete(){
		$id = I('get.id');
		if($id!=0){
			$CommentModel = M('Comment');
			$data['delete_tag'] = (bool)1;
			$result = $CommentModel->where(array('id'=>$id))->save($data);
			if($result !== false){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}else{
			$this->error('参数错误');
		}
	}



}