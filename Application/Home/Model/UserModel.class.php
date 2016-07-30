<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{

	/**
	 * [getSignaById 获取个性签名]
	 *	@param [Integer] $userid 用户编号
	 *  @return [String] 个性签名内容
	 */
	public function getSignaById($userid){
		$condition['id'] = $userid;
		$result = $this->where($condition)->field('signature')->find();
		return $result['signature'];
	}

	/**
	 * [getUserInfoById 获取用户个人信息]
	 */
	public function getUserInfoById($userid){
		$condition['id'] = $userid;
		$result = $this->where($condition)->find();
		return $result;
	}

}