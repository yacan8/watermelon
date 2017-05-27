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
		if(session('login')==$id){
			$info['message_count'] = D('Message')->getCount($id);
		}
		return $info;
	}


	public function getSideContent($user_id){
		$CityBeenModel = D('CityBeen');
		$CityBeenList = $CityBeenModel->getListByUserId($user_id,5,true);

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
		$this->assign('user_id',$id);
		$this->assign('page',$Page->show());
		$this->assign('dynamics',$reslut);
		$this->display('index');
	}

	// 个人游记view
	public function travelNote(){
		$id = I('get.id');
		$p = I('get.p',1);
		$info = $this->getInfo($id);
		$model = D('TravelNote');
		$condition['user_id'] = $id;
		$this->assign('content','AccountContent/travelNote');
		$Page = new \Think\Page($model->getCount($condition),10);
		$result = $model->getList($p,10,$id,0);
		$this->assign('user_id',$id);
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
		$this->assign('user_id',$id);
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
		$this->assign('photonum',$imodel->where(array('user_id'=>$id,'delete_tag'=>(bool)0,'album_id'=>0))->count());
		// $this->assign('photonum',$imodel->getCountByUserId($id));
		$this->assign('albumnum',$amodel->getCount($condition)+1);
		$this->assign('album',$amodel->getList(array('user_id'=>$id,'delete_tag'=>(bool)0,'album_id'=>0)));
		$this->assign('info',$info);
		$this->assign('user_id',$id);
		$this->assign('content','AccountContent/album');
		$this->display('photo');
	}
	// 照片-相片页view
	public function photo(){
		$id = I('get.id');
		$info = $this->getInfo($id);
		$album_id = I('get.album_id');
		$AlbumModel =M('Album');
		$AlbumModel->where(array('id'=>$album_id))->setInc('browse');
		$condition['album_id'] = $album_id;
		$condition['user_id'] = $id;
		$amodel = D('Album');
		$condition['delete_tag'] = (bool)0;
		$imodel = D('Image');
		$count = $imodel->where(array('album_id'=>$album_id,'delete_tag'=>(bool)0,'user_id'=>$id))->count();
		$ImageList = $imodel->getListByAlbumId($condition);
		$this->assign('albumnum',$amodel->getCount(array('user_id'=>$id))+1);
		// $this->assign('album',$amodel->getList(array('user_id'=>$id,'delete_tag'=>(bool)0,'album_id'=>0)));
		$this->assign('photonum',$imodel->where(array('user_id'=>$id,'delete_tag'=>(bool)0,'album_id'=>0))->count());
		$this->assign('imgList',$ImageList);
		$this->assign('count',$count);
		$this->assign('user_id',$id);
		$this->assign('album_id',$album_id);
		$this->assign('content','ScenicContent/photoList');
		$this->assign('info',$info);
		$this->display('photo');
	}
	// 我的收藏view
	public function collection(){
		if(session('?login')){
			$id = session('login');
			$info = $this->getInfo($id);
			$model = D('Collection');
			$condition['delete_tag'] = (bool)0;
			$condition['user_id'] = $id;
			$this->assign('user_id',$id);
			$Page = new \Think\Page($model->getCount($condition),4);
			$result = $model->getList($Page->firstRow,$Page->listRows,$condition);
			$this->assign('page',$Page->show());
			$this->assign('collection',$result);
			$this->assign('info',$info);
			$this->assign('content','AccountContent/collection');
			$this->display('index');
		}else{
			$this->error('你还未登录');
		}
	}

	// 我的消息view
	public function message(){
		$id = I('get.id',0);
		if(session('login')!=$id||$id==0){
			$this->error('参数错误');
		}else{
			$p = I('get.p',1);
			$info = $this->getInfo($id);
			$MessageModel = D('Message');
			$MessageList = $MessageModel ->getList($p,10,$id);
			$LoginModel = D('Login');
			$data['last_read_message_time'] = date('Y-m-d H:i:s',time());
			$LoginModel->where(array('id'=>$id))->save($data);
			// dump($MessageModel->getLastSql());
			// dump($MessageList);
			$Page = new \Think\Page($MessageModel->where(array('user_id'=>$id))->count(),10);
			$this->assign('Page',$Page->show());
			$this->assign('MessageList',$MessageList);
			$this->assign('user_id',$id);
			$this->assign('info',$info);
			$this->assign('content','AccountContent/message');
			$this->display('index');
		}

	}


	// 个人资料页
	public function information(){
		if(session('?login')){
			$id = session('login');
			$info = $this->getInfo($id);
			$umodel = D('User');
			$lmodel = D('Login');
			$this->assign('content','AccountContent/information');
			$this->assign('userinfo',$umodel->getUserInfoById($id));
			$this->assign('logininfo',$lmodel->getLoginInfoById($id));
			$this->assign('user_id',$id);
			$this->assign('info',$info);
			$this->display('index');
		}else{
			$this->error('你还未登录');
		}

	}


	// 资料编辑view
	public function edit(){
		if(session('?login')){
			$user_id = session('login');
			$info = $this->getInfo($user_id);
			$umodel = D('User');
			$lmodel = D('Login');
			$userInfo = $umodel->find($lmodel->where(array('id'=>$user_id))->getField('user_id'));
			$this->assign('userinfo',$userInfo);
			$this->assign('logininfo',$lmodel->getLoginInfoById(session('login')));
			$ProvincesModel = M("AddressProvinces");
			$provinceList = $ProvincesModel->select();
			$provinceId = $ProvincesModel->where(array('province'=>$userInfo['province']))->getField("provinceid");
			$cities = M('AddressCities')->where(array('provinceid'=>$provinceId))->select();
			$this->assign('content','AccountContent/edit_information');
			$this->assign('cities',$cities);
			$this->assign('provinceList',$provinceList);
			$this->assign('user_id',$user_id);
			$this->assign('info',$info);
			$this->display('index');
		}else{
			$this->error('你还未登录');
		}
	}

	public function Doedit(){
		$lmodel = D('Login');
		$umodel = D('User');
		$lmodel->id = session('login');
		$lmodel->nickname = I('post.nickname');
		if($_FILES['file']['name']!=null){
			$errorMessage = $lmodel->change_icon($user_id);
		}
		$loginResult = $lmodel->where(array('id'=>session('login')))->save();
		$userId = $lmodel->where(array('id'=>session('login')))->getField('user_id');
		$user['id'] = $userId?$userId:0;
		$province = I('post.province');
		if( $province == '0' || $province == '--请选择--') {
			$user['province'] = '';
		}else {
			$user['province'] = $province;
		}
		$city = I('post.city');
		if( $city == '0' || $city == '--请选择--') {
			$user['city'] = '';
		}else {
			$user['city'] = $city;
		}
		$user['email'] = I('post.email');
		$user['signature'] = I('post.signature');
		$user['job'] = I('post.job');
		$userResult = $umodel->where(array('id'=>$user['id']))->save($user);
		if($userResult!==false && $loginResult!==false){
			redirect(U('Account/edit'));
		}else{
			$this->error('操作错误');
		}

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
	public function follow(){

		$id = I('get.id',session('login'));
		$info = $this->getInfo($id);
		$AttentionModel = D('Attention');
		$AttentionerList = $AttentionModel->getAttentionerList($id);
		$this->assign('user_id',$id);
		$this->assign('List',$AttentionerList);
		$this->assign('info',$info);
		$this->assign('content','AccountContent/attention');
		$this->assign('contentTitle','粉丝');
		$this->display('index');
	}


	//关注view
	public function fans(){
		$id = I('get.id',session('login'));
		$info = $this->getInfo($id);
		$AttentionModel = D('Attention');
		$FansList = $AttentionModel->getFansList($id);
		$this->assign('user_id',$id);
		$this->assign('List',$FansList);
		$this->assign('info',$info);
		$this->assign('content','AccountContent/fans');
		$this->assign('contentTitle','关注');
		$this->display('index');
	}


	// //想去view
	// public function want(){
	// 	$this->assign('content','AccountContent/cityList');
	// 	$this->assign('contentTitle','想去的地方');
	// 	$this->display('index');
	// }


	//去过view
	public function been(){
		$id = I('get.id',session('login'));
		$info = $this->getInfo($id);
		$CityBeenModel = D('CityBeen');
		$CityBeenList = $CityBeenModel->getListByUserId($id,0,true);
		// dump($CityBeenList);
		$this->assign('user_id',$id);
		$this->assign('info',$info);
		$this->assign('List',$CityBeenList);
		$this->assign('content','AccountContent/cityList');
		$this->assign('contentTitle','去过的地方');
		$this->display('index');
	}

}
