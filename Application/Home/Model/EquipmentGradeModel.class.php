<?php
namespace Home\Model;
use Think\Model\RelationModel;
class EquipmentGradeModel extends RelationModel{

	protected $_link = array(
		'equipment'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Equipment',
	        'foreign_key'=>'equipment_id',
	        'mapping_fields'=>'name',
	        'as_fields'=>'name'
	    )
	);


	public function getNumById($id,$recommend=null){
		$condition['equipment_id'] = $id;
		if($recommend!=null){
			$condition['recommend'] = $recommend;
		}
		return $this->where($condition)->count();
	}

	public function getList($first,$list,$condition){
		$lmodel = D("Login");
		$result = $this->where($condition)
			 		   ->limit($first.','.$list)
			 		   ->order('time desc')
			 		   ->select();
		foreach ($result as $key => &$value) {
			switch ($value['recommend']) {
				case '2': $value['recommendinfo'] = "很差"; break;
				case '4': $value['recommendinfo'] = "较差"; break;
				case '6': $value['recommendinfo'] = "还行"; break;
				case '8': $value['recommendinfo'] = "推荐"; break;
				case '10': $value['recommendinfo'] = "力荐"; break;
				default:break;
			}
			$value['userinfo'] = $lmodel->getById($value['user_id']);
		}
		return $result;
	}

	public function refreshGrade($id){
		$avg = $this->where(array('equipment_id'=>$id))->avg("recommend");
		$emodel = M("Equipment");
		$equip['id'] = $id;
		$equip['grade'] = $avg;
		if ($emodel->create($equip)) {
			$emodel->save();
		} else {
			return false;
		}
	}



	/**
	 * [getDynamics11 获取动态 类型11 评论了装备]
	 * @param  [Integer] $id [评论ID]
	 * @return [array] 
	 */
 	public function getDynamics11($id){
 		$result = $this->relation('equipment')->where(array('delete_tag'=>(bool)0))->find($id);
		switch ($result['recommend']) {
			case '2': $result['recommendinfo'] = "很差"; break;
			case '4': $result['recommendinfo'] = "较差"; break;
			case '6': $result['recommendinfo'] = "还行"; break;
			case '8': $result['recommendinfo'] = "推荐"; break;
			case '10': $result['recommendinfo'] = "力荐"; break;
			default:break;
		}
		return $result;
		
 	}
	
}