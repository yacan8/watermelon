<?php
namespace Home\Model;
use Think\Model;
class EquipmentModel extends Model{

	public function getList(){

	}

	public function getById($id){
		$condition['id'] = $id;
		return $this->where($condition)->find();
	}



	/**
	 * [search 搜索]
	 * @param  [String]  $key         [关键字]
	 * @param  boolean $is_subQuery [是否为子查询]
	 * @param  max $page [页数，如果为空，只返回全部]
	 * @param  max $count [每页显示页数]
	 * @return max 如果is_subQuery为true，则为自查询，返回查询SQL，如果为false，则返回搜索到的列表List
	 */
	public function search($key,$is_subQuery=true,$page='',&$count=''){
		$firstrow = ($page-1)*$count;
		if($page!='')
			$limit_str = "$firstrow,$count";
		else
			$limit_str = '';
		if($is_subQuery){
			$result = $this ->field('id,name title,description content,time,null user_id,image,null nickname,4 type')
							->where(array('name'=>array('like','%'.$key.'%')))
							->limit($limit_str)
							->select(!$is_subQuery);
		}else{
			$result = $this ->field('id,name title,description content,time,null user_id,image,null nickname,4 type')
							->where(array('name'=>array('like','%'.$key.'%')))
							->limit($limit_str)
							->select();
		}
		$count = $this ->where(array('name'=>array('like','%'.$key.'%')))->count();
		return $result;
	}

	/**
	 * [getHotCommentEquipment 获取热评装备]
	 * @param  integer $brand_id [品牌ID]
	 * @param  integer $type_id  [类型ID]
	 * @param  integer $limit    [个数]
	 * @return [List] 
	 */
	public function getHotCommentEquipment($brand_id=0,$type_id=0,$limit=5){
		$DB_FREFIX = $this->tablePrefix;
		if($brand_id!=0){
			$condition['e.brand_id'] = $brand_id;
		}
		if($type_id!=0){
			$condition['e.type_id'] = $type_id;
		}

		$List = $this->table($DB_FREFIX.'equipment e')
					 ->field("e.id,e.name,e.image,e.grade,(select count(*) from {$DB_FREFIX}equipment_grade where equipment_id = e.id) comment_count")
					 ->where($condition)
					 ->order('comment_count desc')
					 ->limit($limit)
					 ->select();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image'] == '')
				$List[$i]['image'] = 'default.jpg';
		}
		return $List;
	}
}