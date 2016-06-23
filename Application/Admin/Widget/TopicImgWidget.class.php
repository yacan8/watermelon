<?php
namespace Admin\Widget;
use Think\Controller;
class TopicImgWidget extends Controller{
    public function TopicImg($type,$id){
    	layout(false); // 或者 C('LAYOUT_ON',false);
        $TopicPictureModel = D('TopicPicture');
        $List = $TopicPictureModel->getImgByTypeAndId($type,$id);
        for ($i=0; $i < count($List); $i++) { 
        	$List[$i]['image_loading'] = urlencode($List[$i]['image']);
        }
        $this->assign('List',$List);
        $this->display('Widget:TopicImg');
    }
}