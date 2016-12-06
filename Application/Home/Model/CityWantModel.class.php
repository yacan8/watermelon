<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CityWantModel extends RelationModel{

	//关联属性
	protected $_link = array(
		'city'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'City',
	        'foreign_key'=>'city_id',
	        'mapping_fields'=>'city',
	        'as_fields'=>'city'
	    )
	);

	/**
	 * [getCountByCityId 获取数量通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @return [Integer]          [想去数量]
	 */
	public function getCountByCityId($city_id){
		$count = $this->where(array('city_id'=>$city_id,'delete_tag'=>0))->count();
		return $count;
	}




	/**
	 * [checkByCityIdAndUserId 检测是否想去]
	 * @param  [Integer] $city_id  [城市ID]
	 * @param  [Integer] $user_id [用户ID]
	 * @return [list]          [返回查询结果 如果存在长度且删除标识delete_tag为0 为已被想去 否则为未想去]
	 */
	public function checkByCityIdAndUserId($city_id,$user_id){
		$condition['user_id'] = $user_id;
	    $condition['city_id'] = $city_id;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}

	/**
	 * [getDynamics6 获取动态 类型6 获取想去信息]
	 * @param  [Integer] $id [城市想去ID]
	 * @return [array] 
	 */
	public function getDynamics6($id){
		$result = $this->relation('city')->where(array('delete_tag'=>(bool)0))->find($id);
		return $result;
	}


}