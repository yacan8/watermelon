<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ScenicGradeModel extends RelationModel{

	//关联属性
	protected $_link = array(
		'scenic'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Scenic',
	        'foreign_key'=>'scenic_id',
	        'mapping_fields'=>'name',
	        'as_fields'=>'name'
	    )
	);

	protected $_validate = array(     
		array('description','require','请输入评论内容！'), 
		array('recommend_level','require','请选择评分星级'), 
		array('scenic_id','require','数据错误！')
	);



	/**
	 * [getList 获取列表]
	 * @param  integer  $scenic_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @param  integer  $recommend_level   [星级  1~5星 Integer 1~5]
	 * @param  integer  $page      [页数]
	 * @param  integer $count     [每页显示个数]
	 * @return List
	 */
	public function getList($scenic_id,$user_id=0,$recommend_level=0,$page,$count=10){
		$DB_PREFIX = $this->tablePrefix;
		if($scenic_id!=0){
			$condition['sg.scenic_id'] = $scenic_id;
		}
		if($user_id!=0){
			$condition['sg.user_id'] = $user_id;
		}
		if($recommend_level!=0){
			$condition['sg.recommend_level'] = $recommend_level*2;
		}
		$condition['sg.delete_tag'] = (bool)0;
		$condition['_string'] = 'sg.user_id = l.id';
		$condition['_logic']  = 'and';
		$Model = M('');
		$List = $Model  ->table($DB_PREFIX.'scenic_grade sg,'.$DB_PREFIX.'login l')
						->field('sg.id,sg.scenic_id,sg.description,sg.recommend_level,sg.time,sg.user_id,l.icon,l.nickname')
						->order('time desc')
						->where($condition)
						->page($page.",".$count)
						->select();
		return $List;
	}


	/**
	 * [getCount 获取评论数量]
	 * @param  integer  $scenic_id [景点ID]
	 * @param  integer  $user_id   [用户ID]
	 * @param  integer  $recommend_level   [星级  1~5星 Integer 1~5]
	 * @return integer  数量
	 */
	public function getCount($scenic_id = 0,$user_id = 0,$recommend_level=0){
		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}
		if($user_id!=0){
			$condition['user_id'] = $user_id;
		}
		if($recommend_level!=0){
			$condition['recommend_level'] = $recommend_level*2;
		}
		$condition['delete_tag'] = (bool)0;
		$count = $this ->where($condition)->count();
		return $count;
	}



	/**
	 * [getDynamics3 获取动态 类型3 评论了景点]
	 * @param  [Integer] $id [评论编号]
	 * @return [array] 
	 */
	public function getDynamics3($id){
		return $this->relation('scenic')->where(array('delete_tag'=>(bool)0))->find($id);
	}
}
