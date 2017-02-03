<?php
namespace Home\Model;
use Think\Model;
/**
* 		
*/
class EquipmentBrandModel extends Model{
	public function getList(){
		return $this->select();
	}
	
	public function getById($id){
		$result = $this->where('id='.$id)->find();
		return $result['brand'];
	}
}