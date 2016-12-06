<?php
namespace Home\Controller;
use Think\Controller;

class TravelNoteController extends Controller {
    public function index(){
        $model = D('TravelNote');
        $condition = null;
        if(I('get.citynow')){
            $condition['city'] = I('get.citynow');
        }
        
        $Page = new \Think\Page($model->getCount($condition),6);
        $result = $model->getList($Page->firstRow,$Page->listRows,$condition);
        $tsmodel = M('TravelNoteSpace');
        $this->assign('city',$tsmodel->select());
        $this->assign('citynow',$condition['city']);
        $this->assign('travelnote',$result);
        $this->assign('page',$Page->show());
    	$this->display('index');
    }



    public function detail(){
    	$id = I('get.id');
        $model = D('TravelNote');
        $condition['id'] = $id;
        $travelnote = $model->getInfoById($condition);
    	$CommentModel = D('Comment');
		$CommentList = $CommentModel->getCommentByOtherId($id,3,1,4);
		$this->assign('id',$id);
        $this->assign('travelnote',$travelnote);
		$this->assign('CommentList',$CommentList);
		$this->display();
    }

    public function publish(){
        $this->display('publish');
    }

    public function Dopublish(){
        $data = I('post.');
        dump($data);
        // $model = D('TravelNote');
        // $result = $this->addNew($data);
    }


    public function getCityList(){
        $cmodel = D('TravelNoteSpace');
        $result = $cmodel->select();
        $this->ajaxReturn(json_encode($result));
    }
}