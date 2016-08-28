<?php
namespace Admin\Controller;
use Think\Controller;
class EquipmentGradeController extends Controller {
	public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}
	/**
	 * [grade 评分管理]
	 */
	public function grade(){
		$equipment_id = I('get.equipment_id',0);
		$user_id = I('get.user_id',0);
		$r = I('get.r',0);
		$p = I('get.p',1);
		$equipmentGradeModel = D('EquipmentGrade');
		$rCountList = $equipmentGradeModel->getCountGroupRecommend($equipment_id,$user_id);//评论分组数量
		if($equipment_id!=0){//如果选中了装备
			$equipment_name = M('Equipment')->where(array('id'=>$equipment_id))->getField('name');
			$this->assign('equipment_name',$equipment_name);
		}
		if($user_id!=0){//如果选中了用户
			$userinfo = D("Login")->getInfoByid($user_id);
			$this->assign('userinfo',$userinfo);
		}
		$count = 15;//每页显示个数
		$all_count = $equipmentGradeModel->getCount($equipment_id,$user_id);//获取全部的数量
		$gradeList = $equipmentGradeModel->getList($equipment_id,$user_id,$r,$p,$count);
		$Page       = new \Think\Page($all_count,$count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		$this->assign('gradeList',$gradeList);
		$this->assign('all_count',$all_count);
		$this->assign('equipment_name',$equipment_name);
		$this->assign('r',$r);
		$this->assign('equipment_id',$equipment_id);
		$this->assign('user_id',$user_id);
		$this->assign('rCountList',$rCountList);
		$this->display('Equipment:grade');
	}


	//评论删除active
	public function delete(){
		$id = I('get.id');
		if($id!=0){
			$EquipmentGradeModel = M('EquipmentGrade');
			$data['delete_tag'] = (bool)1;
			$result = $EquipmentGradeModel->where(array('id'=>$id))->save($data);
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