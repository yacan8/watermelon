<?php
namespace Home\Controller;
use Think\Controller;

class ScenicController extends Controller {
    public function index(){
    	$this->display('city_d');
    }


    public function foodhotel(){
    	$this->display();
    }
}