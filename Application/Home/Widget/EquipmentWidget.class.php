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

}