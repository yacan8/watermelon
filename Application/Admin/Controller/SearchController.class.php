<?php
namespace Admin\Controller;
use Think\Controller;
class SearchController extends Controller{

	//搜索景点
	public function scenic(){
		$key = trim(I('get.key'));
		$ScenicModel = D('Scenic');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$scenicList = $ScenicModel->search($key,$p,$count);

		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:scenic');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('scenicList',$scenicList);
		$this->display('Search:common');
	}

	//搜索资讯
	public function infomation(){
		$key = trim(I('get.key'));
		$InfomationModel = D('Infomation');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$infomationList = $InfomationModel->search($key,$p,$count);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:infomation');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('infomationList',$infomationList);
		$this->display('Search:common');
	}


	//搜索游记
	public function travel_note(){
		$key = trim(I('get.key'));
		$TravelNoteModel = D('TravelNote');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$travelNoteList = $TravelNoteModel->search($key,$p,$count);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:travelNote');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('travelNoteList',$travelNoteList);
		$this->display('Search:common');
	}


	//搜索话题
	public function topic(){
		$key = trim(I('get.key'));
		$TopicModel = D('Topic');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$topicList = $TopicModel->search($key,$p,$count);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:topic');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('topicList',$topicList);
		$this->display('Search:common');
	}

	//搜索装备
	public function equipment(){
		$key = trim(I('get.key'));
		$EquipmentModel = D('Equipment');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$equipmentList = $EquipmentModel->search($key,$p,$count);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:equipment');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('equipmentList',$equipmentList);
		$this->display('Search:common');
	}


	public function user(){
		$key = trim(I('get.key'));
		$LoginModel = D('Login');
		$p = I('get.p',1);
		$count = $show_count = 30;
		$userList = $LoginModel->search($key,$p,$count);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		
		$this->assign('content','Search:user');
		$this->assign('key',$key);
		$this->assign('count',$count);
		$this->assign('userList',$userList);
		$this->display('Search:common');
	}




}

