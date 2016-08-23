<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{

	/**
	 * [getUserInfoById 获取用户个人信息]
	 */
	public function getUserInfoById($condition){
		return $this->where($condition)->find();
	}

	public function updateUserInfo($data){
		if ($this->create($data)) {
			return $this->save();
		} else {
			return false;
		}
		
	}

}