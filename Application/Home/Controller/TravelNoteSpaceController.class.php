<?php
namespace Home\Controller;
use Think\Controller;

class TravelNoteSpaceController extends Controller {

    public function loading(){
        $word = I('get.word');
        $data = ['成都','桂林','九寨沟','西藏','拉萨','香格里拉','北京'];
        $arr = array();
        for ($i=0; $i <7-strlen($word); $i++) { 
            $arr[$i]['id'] = $i+1;
            $arr[$i]['name'] = $data[$i];
        }

        echo json_encode($arr);
    }
}