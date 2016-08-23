<?php
namespace Home\Model;
use Think\Model;
class DynamicsModel extends Model{

	/**
	 * [getList 获取动态列表]
	 * @param [Integer] $first
	 * @param [Integer] $list
	 * @param [Array] $condition
	 * @return 动态列表
	 */
	public function getList($first,$list,$condition=null){
		$amodel = D('Attention');
		$lmodel = D('Login');
		$attentioner = $amodel->getAttentioner($condition);
		$con['user_id'] = array('in',$attentioner);
		$result = $this->where($con)
					   ->order('time desc')
					   ->limit($first.','.$list)
					   ->select();
		// foreach ($result as &$value) {
		// 	$value['nickname'] = $lmodel->getNickByUserId($value['user_id']);
		// 	switch ($value['type']) {
		// 		case 6: break;
				
		// 		default:
		// 			# code...
		// 			break;
		// 	}
		// }
	}

	/**
	 * [getCount] 获取数目
	 *	@param [Array] $condition
	 */
	public function getCount($condition=null){
		return $this->where($condition)->count();
	}
}