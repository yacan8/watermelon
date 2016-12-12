<?php
namespace Home\Controller;
use Think\Controller;
class AccountController extends Controller{

	public function getInfo($id){
		$umodel = D('User');
		$lmodel = D('Login');
		$condition['user_id'] = $id;
		$info_one = $umodel->getUserInfoById($condition);
		$info_two = $lmodel->getById($condition['user_id']);
		$info = $info_two;
		$info['signature'] = $info_one['signature'];
		$info['id'] = $id;
		return $info;
	}

	public function index(){
		$id = I('get.id',session('login'));
		$info = $this->getInfo($id);
		if($id!=session('login')){
			$model = D('Attention');
			$result = $model->checkFollow(session('login'),$id);
			$info['attention'] = $result[0]['delete_tag'];
		}
		$this->assign('info',$info);
		$this->display('index');
	}


	// 个人动态view
	public function dynamics(){
		$id = I('get.id',session('login'));
		$p = I('get.p',1);//页数
		$count = 10 ; //每页显示个数
		$info = $this->getInfo($id);
		$model = D('Dynamics');
		$condition['user_id'] = $id;
		$Page = new \Think\Page($model->getCount($id),$count);
		$reslut = $model->getList($p,$count,$id); 
		$this->assign('content','AccountContent/dynamics');
		$this->assign('info',$info);
		$this->assign('page',$Page->show());
		$this->assign('dynamics',$reslut);
		$this->display('index');
	}

	// 个人游记view
	public function travelNote(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$model = D('TravelNote');
		$condition['user_id'] = $id;
		$this->assign('content','AccountContent/travelNote');
		$Page = new \Think\Page($model->getCount($condition),2);
		$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
		$this->assign('result',$result);
		$this->assign('info',$info);
		$this->assign('page',$Page->show());
		$this->display('index');
	}

	//个人话题view
	public function topic(){
		$id = I('get.id');
		$info = $this->getInfo($id);
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
			$this->assign('info',$info);
			$this->assign('content','AccountContent/topic');
			$this->display('index');
		}else{
			header("Content-type: text/html; charset=utf-8"); 
			exit('参数错误');
		}
	}

	// 留言板view
	public function board(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$this->assign('content','AccountContent/board');
		$model = D('Board');
		$condition['user_id'] = $id;
		$Page = new \Think\Page($model->getCount($condition),4);
		$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
		if(session('?login')){
			$user = D('Login')->getById(session('login'));
			$this->assign('user',$user);
		}
		$this->assign('count',$model->getCount($condition));
		$this->assign('board',$result);
		$this->assign('info',$info);
		$this->assign('page',$Page->show());
		$this->display('index');
	}

	// 照片-相册页view
	public function album(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$amodel = D('Album');
		$imodel = D('image');
		$condition['user_id'] = $id;

		$this->assign('photonum',$imodel->getCountByUserId($id));
		$this->assign('albumnum',$amodel->getCount($condition));
		$this->assign('album',$amodel->getList($condition));
		$this->assign('info',$info);
		$this->assign('content','AccountContent/album');
		$this->display('photo');
	}
	// 照片-相片页view
	public function photo(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$albumid = I('get.albumid');
		$condition['album_id'] = $albumid;
		$imodel = D('Image');
		$this->assign('image',$imodel->getListByAlbumId($condition));
		$this->assign('content','ScenicContent/photoList');
		$this->assign('info',$info);
		$this->display('photo');
	}
	// 我的收藏view
	public function collection(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$model = D('Collection');
		$condition['delete_tag'] = (bool)0;
		$condition['user_id'] = $id;
		$Page = new \Think\Page($model->getCount($condition),4);
		$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
		$this->assign('page',$Page->show());
		$this->assign('collection',$result);
		$this->assign('info',$info);
		$this->assign('content','AccountContent/collection');
		$this->display('index');
	}

	// 我的消息view
	public function message(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$mmodel = D('Message');
		// $
		$this->assign('info',$info);
		$this->assign('content','AccountContent/message');
		$this->display('index');
	}


	// 个人资料页
	public function information(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$umodel = D('User');
		$lmodel = D('Login');
		$this->assign('content','AccountContent/information');
		$this->assign('userinfo',$umodel->getUserInfoById($id));
		$this->assign('logininfo',$lmodel->getLoginInfoById($id));
		$this->assign('info',$info);
		$this->display('index');
	}


	// 资料编辑view
	public function edit(){
		$umodel = D('User');
		$lmodel = D('Login');
		$this->assign('userinfo',$umodel->getUserInfoById(session('login')));
		$this->assign('logininfo',$lmodel->getLoginInfoById(session('login')));
		$provinceList = M("AddressProvinces")->select();
		$this->assign('content','AccountContent/edit_information');
		$this->assign('provinceList',$provinceList);
		$this->display('index');
	}

	public function Doedit(){
		$data = I('post.');
		$lmodel = D('Login');
		$umodel = D('User');
		$login['nickname'] = $data['nickname'];
		$login['id'] = session('login');
		$lmodel->updateNickname($login);
		unset($data['nickname']);
		$data['id'] = session('login');
		$umodel->updateUserInfo($data);
		redirect(U('Account/edit'));
	} 

	public function ChangePassword(){
		$data = I('post.');
		$model = D('Login');
		$result = $model->ChangePassword($data['o_password'],$data['$n_password'],session('login'));
		switch ($result) {
			case '0': $this->error('修改失败');break;
			case '1': $this->error('原密码错误');break;
			case '2': $this->error('原密码与新密码相同');break;
			case '3': $this->success('修改成功');break;
			default:redirect(U('Account/edit')); break;
		}
	}

	//粉丝view
	public function fans(){
		$this->assign('content','AccountContent/userList');
		$this->assign('contentTitle','粉丝');
		$this->display('index');
	}


	//关注view
	public function follow(){
		$this->assign('content','AccountContent/userList');
		$this->assign('contentTitle','关注');
		$this->display('index');
	}


	//想去view
	public function want(){
		$this->assign('content','AccountContent/cityList');
		$this->assign('contentTitle','想去的地方');
		$this->display('index');
	}


	//去过view
	public function been(){
		$this->assign('content','AccountContent/cityList');
		$this->assign('contentTitle','去过的地方');
		$this->display('index');
	}

}