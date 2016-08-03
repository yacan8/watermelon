<?php
namespace Home\Model;
use Think\Model;
class DynamicsModel extends Model{

	/**
	 * [getList 获取动态列表]
	 * @return 动态列表
	 */
	public function getList(){
		$condition['user_id'] = session('userid');
		$result = $this->where($condition)->select();
		return $result;
	}
}