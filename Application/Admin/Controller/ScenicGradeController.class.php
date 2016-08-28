<?php
namespace Admin\Controller;
use Think\Controller;
class ScenicGradeController extends Controller{
	public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}

	public function grade(){
		$scenic_id = I('get.scenic_id',0);
		$user_id = I('get.user_id',0);
		$r = I('get.r',0);
		$p = I('get.p',1);
		$ScenicGradeModel = D('ScenicGrade');
		$rCountList = $ScenicGradeModel->getCountGroupRecommendLevel($scenic_id,$user_id);//评论分组数量
		if($scenic_id!=0){//如果选中了景点
			$scenic_name = M('Scenic')->where(array('id'=>$scenic_id))->getField('name');
			$this->assign('scenic_name',$scenic_name);
		}
		if($user_id!=0){//如果选中了用户
			$userinfo = D("Login")->getInfoByid($user_id);
			$this->assign('userinfo',$userinfo);
		}
		$count = 20;//每页显示个数
		$all_count = $ScenicGradeModel->getCount($scenic_id,$user_id);//获取全部的数量
		$gradeList = $ScenicGradeModel->getList($scenic_id,$user_id,$r,$p,$count);
		$Page       = new \Think\Page($all_count,$count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出

		$this->assign('page',$show);
		$this->assign('gradeList',$gradeList);
		$this->assign('all_count',$all_count);
		$this->assign('scenic_name',$scenic_name);
		$this->assign('r',$r);
		$this->assign('scenic_id',$scenic_id);
		$this->assign('user_id',$user_id);
		$this->assign('rCountList',$rCountList);
		$this->display('Scenic:grade');
	}

	//评论删除active
	public function delete(){
		$id = I('get.id');
		if($id!=0){
			$ScenicGradeModel = M('ScenicGrade');
			$data['delete_tag'] = (bool)1;
			$result = $ScenicGradeModel->where(array('id'=>$id))->save($data);
			if($result !== false){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}else{
			$this->error('参数错误');
		}
	}
}