<?php
namespace Admin\Controller;
use Think\Controller;
class CityController extends Controller {
	public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}

	public function city_load(){
		$province_id = I('get.p');
		$cityList = M('City')->where(array('province'=>$province_id))->field('id,city')->select();
		$this->ajaxReturn($cityList);
	}
}