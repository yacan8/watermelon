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



	/**
	 * [checkByScenicIdAndUserId 检测是否去过]
	 * @param  [Integer] $scenic_id  [景点ID]
	 * @param  [Integer] $user_id   [用户ID]
	 * @return [list]          [返回查询结果 如果存在长度且删除标识delete_tag为0 为已被去过 否则为未去过]
	 */
	public function checkByScenicIdAndUserId($scenic_id,$user_id){
		$condition['user_id'] = $user_id;
	    $condition['scenic_id'] = $scenic_id;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}
}