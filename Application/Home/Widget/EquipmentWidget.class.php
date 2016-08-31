<?php
namespace Home\Widget;
use Think\Controller;
class EquipmentWidget extends Controller{
	/**
	 * [hotComment 热评装备widget]
	 * @param  [integer] $brand_id [品牌编号]
	 * @param  [integer] $type_id  [类型编号]
	 * @param  [integer] $limit    [个数]
	 */
	public function hotComment($brand_id,$type_id,$limit){

		$EquipmentModel = D('Equipment');
		$List = $EquipmentModel->getHotCommentEquipment($brand_id,$type_id,$limit);
		$this->assign('List',$List);
		$this->display("EquipmentContent:sideEquipment");

	}

	public function side($type_id,$brand_id){
		$emodel = D('Equipment');
		$condition_one['type_id'] = $type_id;
		$condition_one['order'] = "grade desc";
		$sametype = $emodel->getList(0,5,$condition_one);
		$condition_two['brand_id'] = $brand_id;
		$condition_two['order'] = "grade desc";
		$samebrand = $emodel->getList(0,5,$condition_two);
		$hotequip = $emodel->getHotCommentEquipment($brand_id,$type_id);
		$this->assign('sametype',$sametype);
		$this->assign('samebrand',$samebrand);
		$this->assign('hotequip',$hotequip);
		$this->display("EquipmentContent:side");
	}

}