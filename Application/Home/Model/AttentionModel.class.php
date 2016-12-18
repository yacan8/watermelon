<?php
namespace Home\Model;
use Think\Model;
class AttentionModel extends Model{
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




	/**
	 * [getMessage5 获取消息 类型5 被关注了]
	 * @param  [Integer] $id [关注ID]
	 * @return [array] 
	 */
 	public function getMessage3($id){
 		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
 		$result = $this->table($DB_PREFIX.'attention a,'.$DB_PREFIX.'login l')->field('l.id id,l.nickname nickname,l.icon icon')->where('a.id = '.$id.' and a.user_id = l.id')->find();
 		return $result;
 	}
}