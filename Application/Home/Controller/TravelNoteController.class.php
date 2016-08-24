<?php
namespace Home\Controller;
use Think\Controller;

class TravelNoteController extends Controller {
    public function index(){
        $model = D('TravelNote');
        $condition = null;
        $Page = new \Think\Page($model->getCount($condition),6);
        $result = $model->getList($Page->firstRow,$Page->listRows,$condition);
        // dump($result);
        $this->assign('travelnote',$result);
        $this->assign('page',$Page->show());
    	$this->display('index');
    }



    public function detail(){
    	$id = I('get.id');
        $model = D('TravelNote');
        $condition['id'] = $id;
        $travelnote = $model->getInfoByUserId($condition);
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
         $model = D('Zan');
         $result = $model->getZanSortByType(1);
         dump($result);
    }
}