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
		$condition['delete_tag'] = 0;
		$result = $this->where($condition)
			 		   ->field('Attention_id')
			 		   ->select();
		return $result;
	}
}