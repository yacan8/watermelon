<?php
namespace Admin\Model;
use Think\Model;
class EquipmentGradeModel extends Model{

	/**
	 * [getCountGroupRecommend 获取星级分组数量]
	 * @param  integer $equipment_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @return [List]
	 */
	public function getCountGroupRecommend($equipment_id=0,$user_id=0){
		if($equipment_id!=0){
			$condition['equipment_id'] = $equipment_id;
		}
		if($user_id !=0){
			$condition['user_id'] = $user_id;
		}

		$List = $this->field('recommend r,count(*) count')->group('r')->where($condition)->select();
		return $List;
	}

	/**
	 * [getCount 获取数量]
	 * @param  integer $equipment_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @return [integer]
	 */
	public function getCount($equipment_id=0,$user_id=0){
		if($equipment_id!=0){
			$condition['equipment_id'] = $equipment_id;
		}
		if($user_id !=0){
			$condition['user_id'] = $user_id;
		}
		$count = $this->where($condition)->count();
		return $count;
	}

	/**
	 * [getList 获取信息列表]
	 * @param  integer $equipment_id     [装备ID]
	 * @param  integer $user_id         [用户ID]
	 * @param  integer $recommend       [推荐指数]
	 * @param  integer $page            [页数]
	 * @param  integer $count           [每页显示个数]
	 * @return [List]
	 */
	public function getList($equipment_id=0,$user_id=0,$recommend=0,$page=1,$count=20){
		$DB_FREFIX = $this->tablePrefix;
		if($equipment_id!=0){
			$condition['eg.equipment_id'] = $equipment_id;
		}
		if($user_id !=0){
			$condition['eg.user_id'] = $user_id;
		}
		if($recommend !=0){
			$condition['eg.recommend'] = $recommend;
		}
		$condition['_string'] = 'eg.equipment_id =s.id and l.id = eg.user_id';
		$List = $this->table($DB_FREFIX.'equipment_grade eg,'.$DB_FREFIX.'equipment s,'.$DB_FREFIX.'login l')
					 ->field('eg.id id,eg.price_source,eg.advantage,eg.disadvantage,eg.synthesize,eg.recommend r,eg.time time,eg.delete_tag is_delete,s.name equipment_name,s.id equipment_id,l.id user_id,l.nickname user_nickname,l.icon icon')
					 ->where($condition)
					 ->order('eg.delete_tag asc,time desc')
					 ->page("$page,$count")
					 ->select();
		return $List;
	}


}