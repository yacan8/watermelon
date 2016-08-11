<?php
namespace Admin\Model;
use Think\Model;
class ScenicGradeModel extends Model{


	/**
	 * [getCountGroupRecommendLevel 获取星级分组数量]
	 * @param  integer $scenic_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @return [List]
	 */
	public function getCountGroupRecommendLevel($scenic_id=0,$user_id=0){
		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}
		if($user_id !=0){
			$condition['user_id'] = $user_id;
		}

		$List = $this->field('recommend_level r,count(*) count')->group('r')->where($condition)->select();
		return $List;
	}

	/**
	 * [getCount 获取数量]
	 * @param  integer $scenic_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @return [integer]
	 */
	public function getCount($scenic_id=0,$user_id=0){
		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}
		if($user_id !=0){
			$condition['user_id'] = $user_id;
		}
		$count = $this->where($condition)->count();
		return $count;
	}

	/**
	 * [getList 获取信息列表]
	 * @param  integer $scenic_id       [景点ID]
	 * @param  integer $user_id         [用户ID]
	 * @param  integer $recommend_level [推荐指数]
	 * @param  integer $page            [页数]
	 * @param  integer $count           [每页显示个数]
	 * @return [List]
	 */
	public function getList($scenic_id=0,$user_id=0,$recommend_level=0,$page=1,$count=20){
		$DB_FREFIX = $this->tablePrefix;
		if($scenic_id!=0){
			$condition['sg.scenic_id'] = $scenic_id;
		}
		if($user_id !=0){
			$condition['sg.user_id'] = $user_id;
		}
		if($recommend_level !=0){
			$condition['sg.recommend_level'] = $recommend_level;
		}
		$condition['_string'] = 'sg.scenic_id =s.id and l.id = sg.user_id';
		$List = $this->table($DB_FREFIX.'scenic_grade sg,'.$DB_FREFIX.'scenic s,'.$DB_FREFIX.'login l')
					 ->field('sg.id id,sg.description,sg.recommend_level r,sg.time time,sg.delete_tag is_delete,s.name scenic_name,s.id scenic_id,l.id user_id,l.nickname user_nickname,l.icon icon')
					 ->where($condition)
					 ->order('time desc')
					 ->page("$page,$count")
					 ->select();
		return $List;
	}
}