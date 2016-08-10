<?php
namespace Admin\Controller;
use Think\Controller;
class TravelNoteController extends Controller{

	public function index(){
		$user_id = I('get.user_id','');
		if($user_id!=''){
			$nickname = M('Login')->where(array('id'=>$user_id))->getField('nickname');
		}
		$p = I('get.p',1);
		$show_count = $count = 10;
		$TravelNoteModel = D('TravelNote');
		$List = $TravelNoteModel -> getList($p,$count,$user_id);
		$Page       = new \Think\Page($count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('user_id',$user_id);
		$this->assign('nickname',$nickname);
		$this->assign('page',$show);
		$this->assign('List',$List);
		$this->display();
	}


	//游记地点管理view
	public function space(){
		$SpaceMoedl = M('TravelNoteSpace');
		$count = $SpaceMoedl->count();
		$List = $SpaceMoedl->field('id,city')->order('create_time desc')->select();
		$this->assign('count',$count);
		$this->assign('List',$List);
		$this->display();
	}


	//删除游记地点
	public function delete(){
		if(session('?login')){
			$user_id = session('login');
			$power = M('Login')->where(array('id'=>$user_id))->getField('power');
			if($power!=0){
				$id = I('get.id');
				if($id!=''){
					$TravelNoteModel = M('TravelNote');
					$result = $TravelNoteModel->where(array('id'=>$id))->delete();
					if($result!==false)
						$this->success('删除成功');
					else
						$this->error('操作失败');
				}else exit('参数错误');
			}else{
				$this->error('你没有权限');
			}
		}else{
			$this->error('你还没有登录');
		}
	}

	
	public function change(){
		$model = M('TravelNote');
		$List = $model->field('id,content')->select();
		for ($i=0; $i < count($List); $i++) { 

			$List[$i]['content'] =  preg_replace('/<img.*data-original=\"(.+)\".*>/', '<img src="${1}">', $List[$i]['content']);//特定字符替换为表情
			// $r = $model->where('id='.$List[$i]['id'])->save($List[$i]);
			dump($r);
		}
		
	}

}