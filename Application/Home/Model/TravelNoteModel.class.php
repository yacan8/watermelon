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


	/**
	 * [getHotByCityId 通过城市ID获取最热游记]
	 * @param  [Integer] $city_id [城市ID]
	 * @param  [Integer] $count   [数量]
	 * @return [List]
	 */
	public function getHotByCityId($city_id,$count){
		$DB_PREFIX = $this->tablePrefix;
		$Model = M('');
		$condition['t.city_id'] = $city_id;
		$condition['_string'] = 't.user_id = l.id';
		$condition['_logic'] = 'and';
		// SELECT t.id,t.title,t.image,l.id user_id,l.nickname,l.icon FROM wt_travel_note t,wt_login l WHERE t.user_id = l.id
		$List = $Model  ->table($DB_PREFIX.'travel_note t,'.$DB_PREFIX.'login l')
						->field('t.id,t.title,t.image,l.id user_id,l.nickname,l.icon')
						->where($condition)
						->limit($count)
						->order('t.browse desc')
						->select();
						// dump($Model->getLastSql());
		return $List;

	}
}