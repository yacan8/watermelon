<?php
namespace Home\Model;
use Think\Model;
class CityBeenModel extends Model{

	/**
	 * [getCountByCityId 获取数量通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @return [Integer]          [去过数量]
	 */
	public function getCountByCityId($city_id){
		$count = $this->where(array('city_id'=>$city_id,'delete_tag'=>0))->count();
		return $count;
	}


	/**
	 * [checkByCityIdAndUserId 检测是否去过]
	 * @param  [Integer] $city_id  [城市ID]
	 * @param  [Integer] $user_id [用户ID]
	 * @return [list]          [返回查询结果 如果存在长度且删除标识delete_tag为0 为已被去过 否则为未去过]
	 */
	public function checkByCityIdAndUserId($city_id,$user_id){
		$condition['user_id'] = $user_id;
	    $condition['city_id'] = $city_id;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}


	public function getListByUserId($user_id,$limit){
		$condition['user_id'] = $user_id;
		return $this->where($condition)->limit($limit)->select();
	}
}