<?php
namespace Admin\Controller;
use Think\Controller;
class TravelNoteSpaceController extends Controller{
		public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}
	//删除游记地点
	public function delete(){
		if(session('?login')){
			$user_id = session('login');
			$power = M('Login')->where(array('id'=>$user_id))->getField('power');
			if($power!=0){
				$id = I('get.id');
				if($id!=''){
					$model = M('');
					$model->startTrans();
					$TravelNoteSpaceModel = M('TravelNoteSpace');
					$result = $TravelNoteSpaceModel->where(array('id'=>$id))->delete();
					$belongResult = M('TravelNoteSpaceBelong')->where(array('space_id'=>$id))->delete();
					if($result!==false&&$belongResult!==false){
						$model->->commit();
						$this->success('删除成功');
					}else{
						$model->rollback();
						$this->error('操作失败');
					}	
				}else exit('参数错误');
			}else{
				$this->error('你没有权限');
			}
		}else{
			$this->error('你还没有登录');
		}
	}

	
}