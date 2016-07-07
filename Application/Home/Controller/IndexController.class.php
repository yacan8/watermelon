<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $this->display();
    	

    }
    public function verify(){
        $Verify =  new \Think\Verify();
        $Verify->fontSize = 200;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry();
    }


    public function ajax_load(){
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/6.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/5.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/4.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/3.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/2.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/1.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/7.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/8.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/9.jpg';
        $rand = rand(0,8);
        $json['describe'] = "这是一个描述".$rand;
        $json['count']  = $rand;
        $json['src']    = $img[$rand];
        echo json_encode($json);
    }
}