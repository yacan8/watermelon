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
		if(session('?login')){
			$model = M('');
			$model->startTrans();//开启事务
			$user_id = session("login");
			$time = date("Y-m-d H:i:s",time());
			$egmodel = D('EquipmentGrade');
			if ($egmodel->create()) {
				$egmodel->user_id = $user_id;
				$egmodel->time = $time;
				$addResult = $egmodel->add();
				if($addResult!==false){
					$refreshResult = $egmodel->refreshGrade( $egmodel->equipment_id);//刷新冗余字段评分
					if($refreshResult!==false){
						$dynamicsData['type'] = 11;
						$dynamicsData['content_id'] = $egmodel->getLastInsID();
						$dynamicsData['user_id'] = $user_id;
						$dynamicsData['time'] = $time;
						$dynamicsResult = M('Dynamics')->add($dynamicsData);//添加动态
						if($dynamicsResult!==false){
							$model->commit();
							$this->redirect("Equipment/detail",array("id"=>$egmodel->equipment_id));
						}else{
							$model->rollback();
						}
					}else{
						$model->rollback();
						$this->error('添加失败');
					}
				}else{
					$model->rollback();
					$this->error('添加失败');
				}

			} else {
				$this->error('数据错误');
			}
		}else{
			$this->error('你还没有登录');
		}

	}

}
