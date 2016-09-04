<?php
namespace Home\Controller;
use Think\Controller;

class EquipmentController extends Controller {
	
	//装备列表
	public function index(){
		$data = I('get.');
		$condition = array();
		if($data['type_id']){
			$condition['type_id'] = $data['type_id'];
			$type_id = $data['type_id'];
		}else{
			$type_id = 0;
		}
		if($data['price']){
			$con = explode("+", $data['price']);
			$condition['price'] = array($con[0],$con[1]);
			$price = $data['price'];
		}else{
			$price = 0;
		}
		if($data['brand_id']){
			$condition['brand_id'] = $data['brand_id'];
			$brand_id = $data['brand_id'];
		}else{
			$brand_id = 0;
		}
		if($data['order']){
			$or = explode("+", $data['order']);
			$condition['order'] = $or[0]." ".$or[1];
			$order = $data['order'];
		}else{
			$order = 0;
		}
		$emodel = D('Equipment');
		$ebmodel = D('EquipmentBrand');
		$etmodel = D('EquipmentType');
		$Page = new \Think\Page($emodel->getCount($condition),16);
		$this->assign('type',$etmodel->getList());
		$this->assign('brand',$ebmodel->getList());
		$this->assign('equipment',$emodel->getList($Page->firstRow,$Page->listRows,$condition));
		$this->assign('type_id',$type_id);
		$this->assign('brand_id',$brand_id);
		$this->assign('price',$price);	
		$this->assign('order',$order);
		$this->assign('page',$Page->show());
		$this->display();
		
	}

	//装备详情
	public function detail(){
		$id = I('get.id');
		if(I('get.recommend')){
			$condition['recommend'] = I('get.recommend');
		}
		$emodel = D('Equipment');
		$egmodel = D('EquipmentGrade');
		$condition['equipment_id'] = $id;
		$Page = new \Think\Page($egmodel->getNumById($id),4);
		$this->assign('commond',$egmodel->getList($Page->firseRow,$Page->listRows,$condition));
		$this->assign('equipment',$emodel->getById($id));
		$this->assign('page',$Page->show());
		$this->display();
	}

	public function dp(){
		$data = I('post.');
		$data['user_id'] = session("login");
		$data['time'] = date("Y-m-d H:i:s");
		$egmodel = D('EquipmentGrade');
		if ($egmodel->create($date)) {
			if($egmodel->add()>0){
				$egmodel->refreshGrade($data['equipment_id']);
				redirect(U("Equipment/detail",array("id"=>$data['equipment_id'])));
			}else{
				$this->error('添加失败');
			}
			
		} else {
			$this->error('数据错误');
		}
		
	}
	
}
