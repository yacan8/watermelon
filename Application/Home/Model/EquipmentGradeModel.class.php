<?php
namespace Home\Model;
use Think\Model;
/**
* 		
*/
class EquipmentGradeModel extends Model{

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
		$avg = $this->where('equipment_id='.$id)->avg("recommend");
		$emodel = D("Equipment");
		$equip['id'] = $id;
		$equip['grade'] = $avg;
		if ($emodel->create($equip)) {
			$emodel->save();
		} else {
			return false;
		}
		
		
	}
	
}