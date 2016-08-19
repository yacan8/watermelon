<?php
namespace Home\Model;
use Think\Model;
/**
* 
*/
class BoardModel extends Model{
	/**
	 * [getList 获取留言列表]
	 */
	public function getList($first,$list,$condition){
		$lmodel = D('Login');
		$rmodel = D('BoardReply');
		$result = $this->where($condition)->order('time desc')->limit($first.','.$list)->select();
		foreach ($result as &$value) { 
			$value['messageuserinfo'] = $lmodel->getById($value['message_user_id']);
			$value['reply'] = $rmodel->getList($value['id']);
		}
		return $result;
	}

	/**
	 * [getCount 获取该用户留言总数]
	 *	@param [Array] $condition 条件
	 *	@return 留言总数
	 */
	public function getCount($condition){
		return $this->where($condition)->count();
	}

}