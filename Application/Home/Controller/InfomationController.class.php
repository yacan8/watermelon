<?php
namespace Home\Controller;
use Think\Controller;

class InfomationController extends Controller {

	public function index(){
		$InfomationModel = D('Infomation');
		$HeadLines = $InfomationModel->Headlines();
		$list = $InfomationModel-> getList(1,10);
		$HeadLineLength = count($HeadLines);
		// 数据追加
		for ($i=0; $i < $HeadLineLength+count($list); $i++) { 
			if($i >= $HeadLineLength)
				$List[] = $list[$i-$HeadLineLength];
			else
				$List[] = $HeadLines[$i];
		}

		$this->assign('List',$List);
		$this->display();
	}

	/**
	 * [loading ajax加载资讯]
	 * @param [Integer] get.page [get参数，加载页数]
	 * @return [json] [description]
	 */
	public function loading(){
		$page = I('get.page');
		$InfomationModel = D('Infomation');
		$List = $InfomationModel-> getList($page,10);
		$this->ajaxReturn($List,'json');
	}

	/**
	 * [detail 资讯详情页]
	 * @param [Integer] get.id [get参数，资讯Id]
	 */
	public function detail(){

		$id = I('get.id');
		$InfomationModel = D('Infomation');
		if($InfomationModel->where(array('id'=>$id))->count()!=0){
			$InfomationModel->where(array('id'=>$id))->setInc('browse',1);
			$infomation = $InfomationModel ->getById($id);
			$CommentModel = D('Comment');
			$CommentList = $CommentModel->getCommentByOtherId($id,2,1,4);
			$this->assign('CommentList',$CommentList);
			$this->assign('infomation',$infomation);
			$this->display();
		}else{
			$this->error('资讯不存在');
		}
	}
}
