<?php
namespace Home\Widget;
use Think\Controller;
class AccountWidget extends Controller{

	public function sideBar(){
		$cbmodel = D('CityBeen');
		$citymodel = D('City');
		$citybeen = $cbmodel->getListByUserId(session('login'),5);
		foreach ($citybeen as $key => $value) {
			$city[$key] = $citymodel->getById($value['city_id']);
		}
		$amodel = D('Attention');
		$lmodel = D('Login');
		$condition_one['attention_id'] = session('login');
		$fans = $amodel->getAttentioner($condition_one);
		foreach ($fans as $key => $value) {
			$fansinfo[$key] = $lmodel->getById($value['attention_id']);
		}
		$condition_two['user_id'] = session('login');
		$attention = $amodel->getAttentioner($condition_two);
		foreach ($attention as $key => $value) {
			$attentioninfo[$key] = $lmodel->getById($value['attention_id']);
		}

		$this->assign('citybeen',$city);
		$this->assign('fans',$fansinfo);
		$this->assign('fansnum',count($fans));
		$this->assign('attention',$attentioninfo);
		$this->assign('attentionnum',count($attention));
		$this->display("Widget:sideContent");
	}
}