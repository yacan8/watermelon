<?php
namespace Home\Model;
use Think\Model;
class ScenicBeenModel extends Model{

	/**
	 * [getCountByScenicId 获取数量通过城市编号]
	 * @param  [Integer] $scenic_id [景点编号]
	 * @return [Integer]          [去过数量]
	 */
	public function getCountByScenicId($scenic_id){
		$count = $this->where(array('scenic_id'=>$scenic_id,'delete_tag'=>0))->count();
		return $count;
	}
}