<?php
namespace Home\Model;
use Think\Model\RelationModel;
/**
* 
*/
class BoardModel extends RelationModel{


	//关联属性
	protected $_link = array(
	    'userinfo'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'message_user_id',
	        'mapping_fields'=>'nickname,icon'
	    )
	);


	/**
	 * [getList 获取留言列表]
	 */
	public function getList($first,$list,$condition){
		$lmodel = D('Login');
		$rmodel = D('BoardReply');
		$result = $this->where($condition)->relation('userinfo')->order('time desc')->limit($first.','.$list)->select();
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


	/**
	 * [getMessage11 获取消息 类型10 个人中心被留言了]
	 * @param  [Integer] $id [留言编号]
	 * @return [array] 
	 */
	public function getMessage11($id){
		$result = $this->relation('userinfo')->find($id);
		return $result;
	}


}