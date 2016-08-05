<?php
namespace Home\Controller;
use Think\Controller;

class TravelNoteController extends Controller {
    public function index(){
    	$this->display();
    }



    public function detail(){
    	$id = I('get.id',15);
    	$CommentModel = D('Comment');
		$CommentList = $CommentModel->getCommentByOtherId($id,3,1,4);
		$this->assign('id',$id);
		$this->assign('CommentList',$CommentList);
		$this->display();
    }
}