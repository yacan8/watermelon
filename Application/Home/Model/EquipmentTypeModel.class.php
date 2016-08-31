<?php
namespace Home\Model;
use Think\Model;
/**
* 		
*/
class EquipmentTypeModel extends Model
{
	public function getList(){
		return $this->select();
	}

	public function getById($id){
		$condition['id'] = $id;
		$result = $this->where($condition)->find();
		return $result['type'];
	}
	
}