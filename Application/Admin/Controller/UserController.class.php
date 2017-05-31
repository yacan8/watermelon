<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}
	public function index(){
		$sort = I('get.sort','reg_time');//哪个字段
		$s = I('get.s','desc');//正序还是逆序
		if($sort=='reg_time'){
			$sort_str = '注册时间';
		}else{
			$sort_str = '登录时间';
		}
		if($s == 'desc'){
			$s_str = ' <span class="glyphicon glyphicon-circle-arrow-down">';
		}else{
			$s_str = ' <span class="glyphicon glyphicon-circle-arrow-up">';
		}
		$sort_text = $sort_str.$s_str;
		$p = I('get.p');
		$order = $sort.' '.$s;
		$LoginModel = D('Login');
		$count      = $LoginModel->count();
		$Page       = new \Think\Page($count,20);
		$show       = $Page->show();
		$List = $LoginModel->getList($order,$p,20);
		$this->assign('sort_text',$sort_text);
		$this->assign('sort',$sort);
		$this->assign('s',$s);
		$this->assign('title','用户管理');
		$this->assign('page',$show);
		$this->assign('userList',$List);
		$this->display();
	}


	public function user(){
		$id = I('get.id');
		$LoginModel = D('Login');
		$user = $LoginModel->relation(true)->find($id);
		$this->assign('user',$user);
		$this->display();
	}


	//删除active
	public function delete(){
		$id = I('get.id',0);
		if($id!=0){
			$user_id = session('Adminlogin');
			$LoginModel = D('Login');
			if($user_id == $id){
				$this->error('不能修改自己');
			}else{
				$power = $LoginModel->where(array('id'=>$user_id))->getField('power');
				if($power=='2'){
					$data['delete_tag'] = (bool)1;
					$result = $LoginModel->where(array('id'=>$id))->save($data);
					if($result !== false){
						$this->success('操作成功');
					}else{
						$this->error('操作失败');
					}
				}else{
					$this->error('没有权限');
				}
			}
		}else{
			$this->error('参数错误');
		}
	}

	//成员管理权限切换
	public function power_toggle(){
		$id = I('get.id',0);
		if($id!=0){
			$user_id = session('Adminlogin');
			$LoginModel = D('Login');
			if($user_id == $id){
				$this->error('不能修改自己');
			}else{
				$power = $LoginModel->where(array('id'=>$user_id))->getField('power');
				$change_power = $LoginModel->where(array('id'=>$id))->getField('power');
				if($power=='2'){
					if($change_power == '1'){
						$data['power'] = 0;
					}else{
						$data['power'] = 1;
					}
					$result = $LoginModel->where(array('id'=>$id))->save($data);
					if($result !== false){
						$this->success('操作成功');
					}else{
						$this->error('操作失败');
					}
				}else{
					$this->error('没有权限');
				}
			}
		}else{
			$this->error('参数错误');
		}
	}



}
