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
}