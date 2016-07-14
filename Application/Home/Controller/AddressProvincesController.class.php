<?php
namespace Home\Controller;
use Think\Controller;
class AddressProvincesController extends Controller{

	public function change(){
		$DB_PREFIX = C('DB_PREFIX');
		$province = I('get.text');
		$Model = M('');
		$List = $Model->query("select c.city from {$DB_PREFIX}address_cities c,{$DB_PREFIX}address_provinces p where c.provinceid = p.provinceid and p.province = '$province'");
		$this->ajaxReturn($List,'json');
	}
}
