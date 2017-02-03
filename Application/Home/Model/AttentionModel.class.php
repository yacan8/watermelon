<?php
namespace Home\Model;
use Think\Model\RelationModel;
class AttentionModel extends RelationModel{


	//关联属性
	protected $_link = array(
	    'fans'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'user_id',
	        'mapping_fields'=>'nickname,icon,user_id'
	    ),
	    'attentions'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'attention_id',
	        'mapping_fields'=>'nickname,icon,user_id'
	    )
	);

	/**
	 * [checkFollow 检查是否已关注]
	 * @param  [Integer] $user_id  [用户id]
	 * @param  [Integer] $follow_id [关注用户ID]
	 * @return [list]           [查询到的列表 如果存在长度且删除标识delete_tag为0 为已关注 否则为已取消关注]
	 */
	public function checkFollow($user_id,$follow_id){
		$condition['user_id'] = $user_id;
		$condition['Attention_id'] = $follow_id;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}

	public function getAttentioner($condition){
		$result = $this->where($condition)
			 		   ->field('Attention_id')
			 		   ->select();
		return $result;
	}

	public function getFans($condition){
		$result = $this->where($condition)->field('user_id')->select();
		return $result;
	}


	public function getFansList($user_id){
		$result = $this->where(array('Attention_id'=>$user_id,'delete_tag'=>(bool)0))->relation('fans')->select();
		$userModel = M('User');
		for ($i=0; $i < count($result); $i++) { 
			$result[$i]['userinfo'] = $userModel->where(array('id'=>$result[$i]['fans']['user_id']))->find();
		}
		return $result;
	}

	public function getAttentionerList($user_id){
		$result = $this->where(array('user_id'=>$user_id,'delete_tag'=>(bool)0))->relation('attentions')->select();
		$userModel = M('User');
		for ($i=0; $i < count($result); $i++) { 
			$result[$i]['userinfo'] = $userModel->where(array('id'=>$result[$i]['attentions']['user_id']))->find();
		}
		return $result;
	}



	/**
	 * [getMessage5 获取消息 类型5 被关注了]
	 * @param  [Integer] $id [关注ID]
	 * @return [array] 
	 */
 	public function getMessage5($id){
 		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
 		$result = $this->table($DB_PREFIX.'attention a,'.$DB_PREFIX.'login l')->field('l.id id,l.nickname nickname,l.icon icon,l.id user_id')->where('a.id = '.$id.' and a.user_id = l.id')->find();
 		return $result;
 	}
}