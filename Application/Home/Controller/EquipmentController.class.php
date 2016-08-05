<?php
namespace Home\Controller;
use Think\Controller;

class EquipmentController extends Controller {
	
	//装备列表
	public function index(){


		//获取装备品牌
		$brand = M('EquipmentBrand');
		$bresult = $brand->select();
		//获取装备类型
		$type = M('EquipmentType');
		$tresult = $type->select();
		//获取装备列表
		$equipment = M('Equipment');
		$condition = null;
		$count = $equipment->count();
		$Page = new \Think\Page($count,9);
		$eresult = $equipment->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->display();
		
	}

	//装备详情
	public function detail(){
		
	}
	
}
