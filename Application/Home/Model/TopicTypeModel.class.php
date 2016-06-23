<?php
namespace Home\Model;
use Think\Model;
class TopicTypeModel extends Model{
	
	/**
	 * [getByTopicId 通过话题ID获取话题类型列表]
	 * @param  [Integer] $id [话题ID]
	 * @return [List]     [查询到的列表]
	 */
	public function getByTopicId($id){
		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
		$M = M('');
		$List = $M->query('select id,type from wt_topic_type where id in (select type_id from wt_topic_type_belong where topic_id = '.$id.') and state =1');
		return $List;
	}
	
}