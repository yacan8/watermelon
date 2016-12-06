<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ScenicWantModel extends RelationModel{

	//关联属性
	protected $_link = array(
		'scenic'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Scenic',
	        'foreign_key'=>'scenic_id',
	        'mapping_fields'=>'name',
	        'as_fields'=>'name'
	    )
	);

	/**
	 * [getCountByScenicId 获取数量通过景点编号]
	 * @param  [Integer] $scenic_id [景点编号]
	 * @return [Integer]          [想去数量]
	 */
	public function getCountByScenicId($scenic_id){
		$count = $this->where(array('scenic_id'=>$scenic_id,'delete_tag'=>0))->count();
		return $count;
	}




	/**
	 * [checkByScenicIdAndUserId 检测是否想去]
	 * @param  [Integer] $scenic_id  [景点ID]
	 * @param  [Integer] $user_id [用户ID]
	 * @return [list]          [返回查询结果 如果存在长度且删除标识delete_tag为0 为已被想去 否则为未想去]
	 */
	public function checkByScenicIdAndUserId($scenic_id,$user_id){
		$condition['user_id'] = $user_id;
	    $condition['scenic_id'] = $scenic_id;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}



	/**
	 * [getDynamics8 获取动态 类型8 获取景点想去信息]
	 * @param  [Integer] $id [景点想去ID]
	 * @return [array] 
	 */
	public function getDynamics8($id){
		$result = $this->relation('scenic')->where(array('delete_tag'=>(bool)0))->find($id);
		return $result;
	}


}