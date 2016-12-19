<?php
namespace Home\Model;
use Think\Model\RelationModel;
/**
* 
*/
class BoardReplyModel extends RelationModel{



	//关联属性
	protected $_link = array(
	    'sender'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'sender',
	        'mapping_fields'=>'nickname,icon'
	    )
	);


	
	/**
	 * [getList 获取留言回复列表]
	 *	@param [Integer] $boardid 留言编号
	 *	@return [array] 留言回复数组
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



	/**
	 * [getMessage12获取消息 类型12 个人中心被留言被回复了]
	 * @param  [Integer] $id [留言编号]
	 * @return [array] 
	 */
	public function getMessage12($id){
		$result = $this->relation('sender')->find($id);
		return $result;
	}


}