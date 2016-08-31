<?php
namespace Home\Model;
use Think\Model;
/**
* 		
*/
class EquipmentBrandModel extends Model
{
	public function getList(){
		return $this->limit(10)->select();
	}
	
	public function getById($id){
		$result = $this->where('id='.$id)->find();
		return $result['brand'];
	}
}