<?php
namespace Home\Model;
use Think\Model\Model;
/**
* 
*/
class BoardModel extends Model{
	/**
	 * [getList 获取留言列表]
	 */
	public function getList($userid,$first,$list){
		// $condition['user_id'] = $userid;
		$lmodel = D('Login');
		$rmodel = D('BoardReply');
		$result = $this->where($condition)->limit($first.','.$list)->select();
		foreach ($result as $value) { 
			$value['messageuserinfo'] = $lmodel->getById($value['message_user_id']);
			$value['reply'] = $rmodel->getList($value['id']);
		}
		return $result;
	}

	/**
	 * [getCount 获取该用户留言总数]
	 *	@param [Integer] $userid 用户编号
	 *	@return 留言总数
	 */
	public function getCount($userid){
		$condition['user_id'] = $userid;
		$result = $this->where($condition)->count();
		return $result;
	}

}