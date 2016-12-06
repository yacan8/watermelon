<?php
namespace Home\Widget;
use Think\Controller;
class AccountWidget extends Controller{

	public function sideBar($id){
		//去过的城市
		$cbmodel = D('CityBeen');
		$citymodel = D('City');
		$citybeen = $cbmodel->getListByUserId($id,5);
		foreach ($citybeen as $key => $value) {
			$city[$key] = $citymodel->getById($value['city_id']);
		}
		//获取粉丝
		$amodel = D('Attention');
		$lmodel = D('Login');
		$condition_one['Attention_id'] = $id;
		$condition_one['delete_tag'] = 0;
		$fans = $amodel->getFans($condition_one);
		foreach ($fans as $key => $value) {
			$fansinfo[$key] = $lmodel->getById($value['attention_id']);
		}
		//获取关注的人
		$condition_two['user_id'] = $id;
		$condition_two['delete_tag'] = 0;
		$attention = $amodel->getAttentioner($condition_two);
		foreach ($attention as $key => $value) {
			$attentioninfo[$key] = $lmodel->getById($value['attention_id']);
		}
		$this->assign('citybeen',$city);
		$this->assign('fans',$fansinfo);
		$this->assign('fansnum',count($fans));
		$this->assign('attention',$attentioninfo);
		$this->assign('attentionnum',count($attention));
		$this->assign('id',$id);
		$this->display("AccountContent:sideContent");
	}




	public function dynamicsImg($dynamics_id){
        $ImageModel = D('Image');
        $List = $ImageModel->getImgByDynamicsId($dynamics_id);
        for ($i=0; $i < count($List); $i++) { 
        	$List[$i]['image_loading'] = urlencode($List[$i]['image']);
        }
        $this->assign('List',$List);
        $this->display('Widget:TopicImg');
    }
}