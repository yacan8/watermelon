<?php
namespace Home\Model;
use Think\Model;
class TravelNoteModel extends Model{


	public function getList($first,$list){
		$model = M('TravelNote');
		$cmodle = D('City');
		$lmodel = D('Login');
		$condition['user_id'] = session('userid'); 
		$result = $model->limit($first.','.$list)->select();
		for ($i=0; $i < 2; $i++) { 
			preg_match_all('/(?<=original=").+?(?=")/', $result[$i]['content'],$result[$i]['pic']);
			$result[$i]['content'] = substr(preg_replace('/<img.+?>/', " ", $result[$i]['content']),0,1000)."。。。。";
			$city = $cmodle->getById($result[$i]['city_id']);
			$result[$i]['city'] = $city['city'];
			$result[$i]['nickname'] = $lmodel->getNickByUserId($result[$i]['user_id']);
		}
		return $result;
	}

	public function getCount(){
		$condition['user_id'] =	session('userid'); 
		return $this->count();
	}

}