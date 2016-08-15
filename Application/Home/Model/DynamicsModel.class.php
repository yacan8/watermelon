<?php
namespace Home\Model;
use Think\Model;
class DynamicsModel extends Model{

	/**
	 * [getList 获取动态列表]
	 * @param [Integer] $first
	 * @param [Integer] $list
	 * @param [Array] $condition
	 * @return 动态列表
	 */
	public function getList($first,$list,$condition=null){
		$result = $this->where($condition)
					   ->order('time desc')
					   ->limit($first.','.$list)
					   ->select();
		return $result;
	}

	/**
	 * [getCount] 获取数目
	 *	@param [Array] $condition
	 */
	public function getCount($condiiton=null){
		return $this->where($condiiton)->count();
	}
}