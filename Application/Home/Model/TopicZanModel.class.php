<?php
namespace Home\Model;
use Think\Model;
class TopicZanModel extends Model{
	
	/**
	 * [checkByZanIdAndUserIdAndType 检测是否被点赞]
	 * @param  [Integer] $zan_id  [被点赞ID]
	 * @param  [Integer] $user_id [用户ID]
	 * @param  [Integer] $type    [点赞类型 1为话题 2为评论]
	 * @return [list]          [返回查询列表 如果存在长度且删除标识delete_tag为0 为已被点赞 否则为未点赞]
	 */
	public function checkByZanIdAndUserIdAndType($zan_id,$user_id,$type){
		$condition['user_id'] = $user_id;
	    $condition['zan_id'] = $zan_id;
		$condition['type'] = $type;
		$condition['_logic'] = 'AND';
		$list = $this->where($condition)->field('id,delete_tag')->select();
		return $list;
	}

	/**
	 * [getTopicHotUser 获取按点赞数排序的用户信息]
	 * @param  [Integer] $count [数量]
	 * @return [List]        [查询到的列表]
	 */
	public function getTopicHotUser($count){
		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
		$M = M('');
		$result = $M->query("select id,icon,nickname,((select count(*) from ".$DB_PREFIX."topic_zan where zan_id in( select id from ".$DB_PREFIX."topic where user_id = l.id ) and type =1  and delete_tag = 0)+(select count(*) from ".$DB_PREFIX."topic_zan where zan_id in( select id from ".$DB_PREFIX."topic_comment where user_id = l.id) and type =2 and delete_tag = 0 )) count from ".$DB_PREFIX."login l  order by count desc limit  $count");
		return $result;
	}



	/**
	 * [getDynamics17 获取动态 类型17 点赞了话题]
	 * @param  [Integer] $id [点赞ID]
	 * @return [array] 
	 */
 	public function getDynamics17($id){
 		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
 		$result = $this->table($DB_PREFIX.'topic_zan tz,'.$DB_PREFIX.'topic t')->field('t.id id,t.title title')->where('tz.id = '.$id.' and tz.zan_id = t.id and tz.type=1')->find();

 		return $result;
 	}



 	/**
	 * [getDynamics18 获取动态 类型18 点赞了话题中的评论]
	 * @param  [Integer] $id [点赞ID]
	 * @return [array] 
	 */
 	public function getDynamics18($id){
 		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
 		$result = $this->table($DB_PREFIX.'topic_zan tz,'.$DB_PREFIX.'topic t,'.$DB_PREFIX.'topic_comment tc')->field('t.id t_id,tc.id tc_id,t.title title,tc.content')->where('tz.id = '.$id.' and tz.zan_id = tc.id and tz.type=2 and tc.topic_id = t.id and tc.delete_tag = 0')->find();
 		dump($this->getLastSql());
 		$result['content'] = D('TopicComment')->replaceUserText($result['content']);
 		return $result;
 	}
}