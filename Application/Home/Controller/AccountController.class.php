<?php
namespace Home\Controller;
use Think\Controller;
class AccountController extends Controller{
	//构造函数，检验是否登录
	public function _initialize(){
        if (!isset($_SESSION['login'])) {
            $this->error('请先登录', U('Index/index'), 2);
        }
 	}



	public function index(){
		$LoginModel = D('Login');
		$id = session('login');
		$userinfo = $LoginModel->getById($id);
		$this->assign('userinfo',$userinfo);
		$this->display();
	}

	//关注view
	public function attention(){
		$id = session('login');
		$TypeModel = M('Type');
		$p = I('get.p',1);
		$LoginModel = D('Login');
		$NewsModel = D('News');
		$List = $LoginModel->relation(true)->where(array('id'=>$id))->find();
		$CollectionList = $List['collection'];
		$CollectionList = $NewsModel->GenerateNews($CollectionList);
		for ($i=0; $i < count($CollectionList); $i++) { 
			$CollectionList[$i]['type'] = $TypeModel->find($CollectionList[$i]['type']);
		}
    	$m = M('Collection');
		$count      = $m->where(array('collecting'=>$id))->count();// 查询满足要求的总记录数
		$Page       = new  \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$p = ($p-1)*4;
		$this->assign('List',$CollectionList);
		$this->assign('page',$show);
		$this->assign('p',$p);
		$this->display();
	}



	public function message(){
		$login_id = session('login');
		$p = isset($_GET['p'])?$_GET['p']:1;
		$p = ($p-1)*4;
		$MessageModel = D('Message');
		$List = $MessageModel ->getByReceiver($user_id);
		$count = count($List);
		$Page  = new  \Think\Page($count,4);
		$show  = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		$this->assign('List',$List);
		$this->assign('p',$p);
		$this->display();
	}

	public function ChangeUserinfo(){
		$LoginModel = D("Login");
		$login_id = session('login');
		$userInfo = $LoginModel->where('id = '.$login_id)->find();
		$o_nickname = $userInfo['nickname'];
		$tel = $userInfo['tel'];
		if(I('post.email')!=''){
			$validate = array(
			    array('email','email','输入正确的邮箱'), // 仅仅需要进行验证码的验证
			);
			$LoginModel-> setProperty("_validate",$validate);
		}
		$nickname = I('post.nickname');
		if($nickname!=$o_nickname){
			$count = $LoginModel->where(array('nickname'=>$nickname))->count();
			if($count == 1){
				session('message','用户名已存在');
				$this->redirect('Account/index',array());
			}else{
				$LoginModel->id = $login_id;
				$result = $LoginModel->create();
				if(!$result){
					$message = $LoginModel->getError();
					session('message',$message);
					$this->redirect('Account/index',array());
				}else{
					if($_FILES['file']['name']!=null){
						$errorMSG = $LoginModel->change_icon($tel);
						if($errorMSG!='')
							$this->error($errorMSG);
					}
					session('message','修改成功');
					$LoginModel->where(array('id'=>$login_id))->save();
					$this->redirect('Account/index',array());
				}
			}
		}else{
			if($_FILES['file']['name']!=null){
				$errorMSG = $LoginModel->change_icon($tel);
				if($errorMSG!='')
					$this->error($errorMSG);
				session('message','修改成功');
				$LoginModel->where(array('id'=>$login_id))->save();
				$this->redirect('Account/index',array());
			}
		}
		
		
		
	}


	public function ChangePassword(){
		$o_password  = I('post.o_password');
		$n_password  = I('post.n_password');
		$re_password = I('post.re_password');
		if($n_password!=$re_password){
			session('message','新密码与确认密码不一致');
			$this->redirect('Account/index',array());
		}else{
			if(strlen($n_password)<6||strlen($n_password)>20){
				session('message','密码长度必须为6~20');
			}else{
				$LoginModel = D("Login");
				$message = $LoginModel->ChangePassword($o_password,$n_password,session('login'));
				session('message',$message);
			}
		}
		$this->redirect('Account/index',array());
	}

	//取消收藏
	public function d_attention(){
		$id = I('get.id');
		$tel = session('login');
		$CollectionModel = D('Collection');
		$result = $CollectionModel->DeleteById($id,$tel);
		if($result){
			$this->redirect('Account/attention',array());
		}else{
			session('message','取消收藏失败');
			$this->redirect('Account/attention',array());
		}
	}


	public function reply(){
		$MessageModel = D('Message');
		$receiver = I('post.receiver');
		$id = I('post.other_id');
		$content = $this ->_post('content');
		$data['other_id'] = $id;
		$data['receiver'] = $receiver;
		$data['content'] = $content;
		$data['sender'] = session('login');
		$data['time'] = date('y-m-d h:i:s',time());
		$data['state'] = '1';
		$result = $MessageModel->addMessage($data);
		if(!$result){
			session('message','回复失败');
		}
		$this->redirect('Account/message');
	}


	public function read(){
		$id = I('get.id');
		$MessageModel = D('Message');
		$result = $MessageModel->read($id);
		if(!$result){
			session('message','标记失败');
		}
		$this->redirect('Account/message');
	}
}