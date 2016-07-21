<?php
namespace Home\Model;
use Think\Model;
class CityWantModel extends Model{

	/**
	 * [getCountByCityId 获取数量通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @return [Integer]          [想去数量]
	 */
	public function getCountByCityId($city_id){
		$count = $this->where(array('city_id'=>$city_id,'delete_tag'=>0))->count();
		return $count;
	}
}