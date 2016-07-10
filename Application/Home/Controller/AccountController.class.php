<?php
namespace Home\Controller;
use Think\Controller;
class AccountController extends Controller{




	public function index(){
		$LoginModel = D('Login');
		$id = session('login');
		$userinfo = $LoginModel->getById($id);
		$this->assign('userinfo',$userinfo);
		$this->display();
	}

}