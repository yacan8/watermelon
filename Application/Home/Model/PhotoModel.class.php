<?php
namespace Home\Model;
use Think\Model;
class PhotoModel extends Model{

	/**
	 * [getList] 
	 */
	public function getList($condition=null){
		$result = $this->where($condition)->select();
		return $result;
	}

	/**
	 * [getCount]
	 */
	public function getCount($condition=null){
		$result = $this->where($condition)->select();
		if ($result) {
			return $result;
		} else {
			return 0;
		}
		
	}
}