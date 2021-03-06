<?php
namespace Home\Model;
use Think\Model;
class ZanModel extends Model{
	
	/**
	 * [checkByZanIdAndUserIdAndType 检测是否被点赞]
	 * @param  [Integer] $zan_id  [被点赞ID]
	 * @param  [Integer] $user_id [用户ID]
	 * @param  [Integer] $type    [点赞类型 1为话题 2为评论]
	 * @return [list]          [返回查询列表 如果存在长度且删除标识delete_tag为0 为已被点赞 否则为未点赞]
	 */
	public function checkByZanIdAndUserIdAndType($zan_id,$user_id,$type){
		$condition['user_id'] = $user_id;
	    $condition['other_id'] = $zan_id;
		$condition['type'] = $type;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}




	public function getMessageType3($id){
 		$DB_PREFIX = C('DB_PREFIX');
 		$array = $this->table($DB_PREFIX.'login u,'.$DB_PREFIX.'topic_zan z,'.$DB_PREFIX.'topic t')
 					->field('u.id u_id,u.icon u_icon,u.nickname u_nickname,z.zan_id topic_id, t.title t_title')
 					->where('u.id = z.user_id and t.id = z.zan_id and z.type = 1 and z.id ='.$id)
 					->find();

 		return $array;
 	}

 	public function getMessageType4($id){
 		$DB_PREFIX = C('DB_PREFIX');
 		$array = $this ->table($DB_PREFIX.'login u,'.$DB_PREFIX.'topic_zan z,'.$DB_PREFIX.'topic t,'.$DB_PREFIX.'topic_comment co,'.$DB_PREFIX.'login uu')
 					->field('u.id u_id,u.icon u_icon,u.nickname u_nickname,z.zan_id comment_id,co.topic_id topic_id, t.title t_title,uu.id topic_user_id,uu.nickname topic_user_nickname')
 					->where('u.id = z.user_id and t.id = co.topic_id and co.id = z.zan_id and z.type = 2 and uu.id = t.user_id and z.id = '.$id)
 					->find();

 		return $array;
 	}


 	public function getCountById($type,$other_id){
 		$condition['type'] = $type;
 		$condition['other_id'] = $other_id;
 		$condition['delete_tag'] = 0;
 		return $this->where($condition)->count();
 	}

 	public function getZanSortByType($type){
 		$condition['type'] = $type;
 		$condition['delete_tag'] = 0;
 		return $this->where($condition)->order('count(user_id) desc')->field('other_id,count(user_id) zannum')->group('other_id')->select();
 	}

 	/**
	 * [getDynamics10 获取动态 类型10 点赞了景点]
	 * @param  [Integer] $id [点赞ID]
	 * @return [array] 
	 */
 	public function getDynamics10($id){
 		$DB_PREFIX = C('DB_PREFIX');
 		$condition['_string'] = 'z.other_id = s.id and z.type = 1 and s.delete_tag = 0';
 		$condition['z.id'] = $id;
 		return $this->table($DB_PREFIX.'zan z,'.$DB_PREFIX.'scenic s')->field('s.name scenic,z.id scenic_id')->where($condition)->find();
 	}

}