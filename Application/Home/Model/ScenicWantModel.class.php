<?php
namespace Home\Model;
use Think\Model;
class ScenicWantModel extends Model{

	/**
	 * [getCountByScenicId 获取数量通过景点编号]
	 * @param  [Integer] $scenic_id [景点编号]
	 * @return [Integer]          [想去数量]
	 */
	public function getCountByScenicId($scenic_id){
		$count = $this->where(array('scenic_id'=>$scenic_id,'delete_tag'=>0))->count();
		return $count;
	}
}