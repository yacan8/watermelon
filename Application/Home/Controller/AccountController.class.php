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



	//话题view
	public function topic(){
		$id = I('get.id');
		$p = I('get.p',1);
		if($id!=""){
			$showCount = 10;//每页显示个数
			$TopicModel = D('Topic');
			$count = $TopicModel->getAllCount(0,$id);
			if($count%$showCount==0)
				$TotalPage = intval($count/$showCount);
			else
				$TotalPage = intval($count/$showCount)+1;
			$List = $TopicModel ->getList(0,$p,$showCount,$id);


			$this->assign('p',$p);//分页
			$this->assign('TotalPage',$TotalPage);//总页数
			$this->assign('count',$count);//总数
			$this->assign('user_id',$id);
			$this->assign('List',$List);
			// $this->assign('UserContent','UserContent/topic');
			$this->display('index');
		}else{
			header("Content-type: text/html; charset=utf-8"); 
			exit('参数错误');
		}
		
	}
}