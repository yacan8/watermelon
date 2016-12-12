<?php
namespace Home\Model;
use Think\Model;
/**
* 
*/
class BoardReplyModel extends Model{
	
	/**
	 * [getList 获取留言回复列表]
	 *	@param [Integer] $boardid 留言编号
	 *	@return 留言回复数组
	 */
	public function getList($boardid){
		$condition['board_id'] = $boardid;
		$result = $this->where($condition)->select();
		$lmodel = D('Login');
		foreach ($result as &$value) {
			$value['senderinfo'] = $lmodel->getById($value['sender']);
			$value['receiverinfo'] = $lmodel->getById($value['receiver']);
		}
		return $result;
	}
}