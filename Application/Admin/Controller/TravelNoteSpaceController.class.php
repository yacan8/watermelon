<?php
namespace Admin\Controller;
use Think\Controller;
class TravelNoteSpaceController extends Controller{

	//删除游记地点
	public function delete(){
		if(session('?login')){
			$user_id = session('login');
			$power = M('Login')->where(array('id'=>$user_id))->getField('power');
			if($power!=0){
				$id = I('get.id');
				if($id!=''){
					$TravelNoteSpaceModel = M('TravelNoteSpace');
					$result = $TravelNoteSpaceModel->where(array('id'=>$id))->delete();
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

	
}