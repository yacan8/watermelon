<?php
namespace Home\Widget;
use Think\Controller;
class InfomationSidelistWidget extends Controller{
    public function side($count){
    	$Model = D('Infomation');
    	$List = $Model->getHot($count);
    	$this->assign('List',$List);
    	$this->display("Widget:InfomationSidelist");
    }
}