<?php
namespace Home\Model;
use Think\Model;
class AlbumModel extends Model{

	/**
	 * [getList] 获取相册列表
	 * @param $condition 条件
 	 */
	public function getList($condition=null){
		$result = $this->where($condition)->select();
		return $result;
	}

	/**
	 * [getCount] 获取相册总数
	 */
	public function getCount($condition=null){
		$result = $this->where($condition)->count();
		if($result){
			return $result;
		}else{
			return 0;
		}
	}
}