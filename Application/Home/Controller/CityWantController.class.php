<?php
namespace Home\Controller;
use Think\Controller;

class CityWantController extends Controller {
	
	public function want(){
		if(IS_AJAX){
			if(session('?login')){
				$model = M('');
				$city_id = I('post.city_id');
				$user_id = session('login');
				$CityWantModel = D('CityWant');
				$list = $CityWantModel->checkByCityIdAndUserId($city_id,$user_id);
				$model->startTrans();//开启事务
				if(count($list)==0){//如果为第一次点赞
					$time = date('Y-m-d H:i:s',time());
					$data['city_id']  	= $city_id;
					$data['user_id'] 	= $user_id;
					$data['delete_tag'] = (bool)0;
					$data['time'] = $time;
					$result = $CityWantModel->add($data);

					// 动态类型、
					// 1-评论了资讯* 、
					// 2-在资讯*中回复了*、
					// 3-评论了景点*、
					// 4-点赞了游记、
					// 5-在景点*中上传了*张照片、
					// 6-在城市*中添加了想去标记、
					// 7-在城市*中添加了去过标记、
					// 8-在景点*中添加想去标记、
					// 9-在景点*中添加去过标记、
					// 10-点赞了景点*、
					// 11-评论了装备*、
					// 12-发表了游记*、
					// 13-在游记*中回复了*、
					// 14-发表了话题*、
					// 15-在帖子*中发表了评论、
					// 16-在帖子*中回复了*、
					// 17-点赞了话题*、
					// 18-点赞了话题*中的评论

					// 动态content_id内容ID
					// 1-资讯评论ID、
					// 2-资讯评论ID、
					// 3-景点ID、4-点赞ID、
					// 5-为0、
					// 6-城市想去ID、
					// 7-城市去过ID、
					// 8-景点想去ID、
					// 9-景点去过ID、
					// 10-点赞ID、
					// 11-装备ID、
					// 12-游记ID、
					// 13-评论ID、
					// 14-话题ID、
					// 15话题评论ID、
					// 16-话题评论ID、
					// 17-话题点赞ID、
					// 18-话题点赞ID
					//添加动态
					$id = $CityWantModel->getLastInsID();
					$Data['type'] = 6;
					$Data['user_id'] = $user_id;
					$Data['content_id'] = $id;
					$Data['time'] = $time;
					$DynamicsModel = M('Dynamics');
					$dynamicsResult = $DynamicsModel->add($Data);
					
					
						



				}else{//曾经点赞过
					if($list[0]['delete_tag'] == '1')
						$data['delete_tag'] = (bool)0;//解决sql语句自动把bit转化为string问题
					else if($list[0]['delete_tag'] == '0')
						$data['delete_tag'] = (bool)1;
					$result = $CityWantModel->where("id=".$list[0]['id'])->save($data);
					$dynamicsResult = 1;
				}

				if($result!=0&&$dynamicsResult!=0){//成功 提交
					$json['Code'] = '200';
					$json['Message'] = '操作成功';
					$model->commit();
				}else{//失败 回滚
					$json['Code'] = '201';
					$json['Message'] = '操作失败';
					$model->rollback();
				}
			}else{
				$json['Code'] = '199';
				$json['Message'] = '您还未登录';
			}
			echo json_encode($json);
		}
	}
}
