<?php
namespace Home\Controller;
use Think\Controller;
class AccountController extends Controller{

	public $userinfo;
	public $visiter;

	public function _initialize(){
		$userinfo = $this->getInfo(session('login'));
	}

	public function getInfo($id){
		$umodel = D('User');
		$lmodel = D('Login');
		$condition['user_id'] = $id;
		$info_one = $umodel->getUserInfoById($condition);
		$info_two = $lmodel->getById($condition['user_id']);
		$info = $info_two;
		$info['signature'] = $info_one['signature'];
		return $info;
	}

	public function index(){
		// $visitid = I('get.id');
		// if($visitid){
		// 	$this->assign('info',$this->getInfo($visitid));
		// }else{
		// 	$this->assign('info',$userinfo);			
		// }
		$this->assign('info',$userinfo);
		$this->display('index');
	}

	// 个人动态view
	public function dynamics(){
		$model = D('Dynamics');
		$Page = new \Think\Page($model->getCount(),2);
		$reslut = $model->getList(); 
		$this->assign('content','AccountContent/dynamics');
		$this->assign('dynamics',$reslut);
		$this->display('index');
	}

	// 个人游记view
	public function travelNote(){
		$model = D('TravelNote');
		$this->assign('content','AccountContent/travelNote');
		$Page = new \Think\Page($model->getCount(),2);
		$reslut = $model->getList($Page->firstRow,$Page->listRows);
		$this->assign('result',$reslut);
		$this->assign('page',$Page->show());
		$this->display('index');
	}

	//个人话题view
	public function topic(){
		$id = I('get.id',2);
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
			$this->assign('content','AccountContent/topic');
			$this->display('index');
		}else{
			header("Content-type: text/html; charset=utf-8"); 
			exit('参数错误');
		}
	}

	// 留言板view
	public function board(){
		$this->assign('content','AccountContent/board');
		$model = D('Board');
		$condition['user_id'] = session('login');
		$Page = new \Think\Page($model->getCount($condition),4);
		$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
		$this->assign('count',$model->getCount($condition));
		$this->assign('board',$result);
		$this->assign('page',$Page->show());
		$this->display('index');
	}

	// 照片-相册页view
	public function album(){
		$amodel = D('Album');
		$pmodel = D('Photo');
		$condition['user_id'] = session('login');

		$this->assign('photonum',$pmodel->getCount($condition));
		dump($pmodel->getCount($condition));
		$this->assign('albumnum',$amodel->getCount($condition));
		$this->assign('album',$amodel->getList($condition));
		$this->assign('content','AccountContent/album');
		$this->display('photo');
	}
	// 照片-相片页view
	public function photo(){
		$albumid = I('get.albumid');
		$condition['album_id'] = $albumid;
		$pmodel = D('Photo');
		$this->assign('photo',$pmodel->getList($condition));
		$this->assign('content','ScenicContent/photoList');
		$this->display('photo');
	}
	// 我的收藏view
	public function collection(){
		$model = D('Collection');
		$condition['user_id'] = session('login');
		$Page = new \Think\Page($model->getCount($condition),4);
		$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
		$this->assign('page',$Page->show());
		$this->assign('collection',$result);
		$this->assign('content','AccountContent/collection');
		$this->display('index');
	}

	// 我的消息view
	public function message(){
		$this->assign('content','AccountContent/message');
		$this->display('index');
	}


	// 个人资料页
	public function information(){
		$umodel = D('User');
		$lmodel = D('Login');
		$this->assign('content','AccountContent/information');
		$this->assign('userinfo',$umodel->getUserInfoById(session('login')));
		$this->assign('logininfo',$lmodel->getLoginInfoById(session('id')));
		$this->display('index');
	}


	// 资料编辑view
	public function edit(){
		$provinceList = M("AddressProvinces")->select();
		$this->assign('content','AccountContent/edit_information');
		$this->assign('provinceList',$provinceList);
		$this->display('index');
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