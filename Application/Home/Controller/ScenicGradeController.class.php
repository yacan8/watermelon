<?php
namespace Home\Controller;
use Think\Controller;

class ScenicGradeController extends Controller {

	public function comment(){
		if(session('?login')){
			$user_id = session('login');
			$time = date('Y-m-d H:i:s',time());
			$ScenicGradeModel = D('ScenicGrade');
			$result = $ScenicGradeModel->create();
			$ScenicGradeModel->user_id = $user_id;
			$ScenicGradeModel->time = $time;
			$ScenicGradeModel->delete_tag = (bool)0;
			$ScenicGradeModel->recommend_level = (int)$ScenicGradeModel->recommend_level*2;

			if($result){
				$scenic_id = I('post.scenic_id');
				$recommend_level = (int)I('post.recommend_level')*2;
				if(abslength($ScenicGradeModel->description)<30){
					$this->error('评论长度必须大于30');
				}else{
					$model = M('');
					$model->startTrans();//开启事务

					$gradeResult = $ScenicGradeModel->add();//添加评分

					if($gradeResult!==false){
						$content_id = $ScenicGradeModel->getLastInsID();
						$Data['type'] = 3;
						$Data['user_id'] = $user_id;
						$Data['content_id'] = $content_id;
						$Data['time'] = $time;
						$DynamicsModel = M('Dynamics');
						$dynamicsResult = $DynamicsModel->add($Data);//添加动态
						$comment_count = $ScenicGradeModel->getCount($scenic_id);
						$ScenicModel = M('Scenic');
						$grade =$ScenicModel->where(array('id'=>$scenic_id))->getField('grade');
						$dataGrade = ((int)$comment_count*(float)$grade+(float)$recommend_level)/((int)$comment_count+1);//冗余字段评分修改
						$data['grade'] = sprintf("%.1f",$dataGrade);
						$scenicResult = $ScenicModel -> where(array('id'=>$scenic_id))->save($data);//修改景点评分


						if($dynamicsResult!==false&&$scenicResult!==false){
							$model->commit();
							$this->redirect('Scenic/scenic',array('id'=>$scenic_id));
						}else{
							$model->rollback();
							$this->error('操作失败');
						}
					}else{
						$model->rollback();
						$this->error('操作失败');
					}
					
				}
			}else
				$this->error($ScenicGradeModel->getError());
		}else{
			$this->error('你还没有登录');
		}
		




	}

}