<?php
namespace Home\Model;
use Think\Model\Model;
/**
* 
*/
class BoardReplyModel extends Model{
	
	/**
	 * [getList 获取留言回复列表]
	 *	@param [Integer] $boardid 留言编号
	 *	@return 留言回复数组
	 */
	public function getList($boardid);{
		$condition['board_id'] = $boardid;
		$result = $this->where($condition)->select();
		$lmodel = D('Login');
		foreach ($result as $value) {
			$value['sender'] = $lmodel->getById($value['sendar']);
			$value['receiver'] = $lmodel->getNickByUserId($value['receiver']);
		}
		return $result;
	}
}