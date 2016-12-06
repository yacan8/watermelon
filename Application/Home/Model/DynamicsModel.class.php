<?php
namespace Home\Model;
use Think\Model\RelationModel;
class DynamicsModel extends RelationModel{

	//关联属性
	protected $_link = array(
	    'userinfo'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'user_id',
	        'mapping_fields'=>'id,nickname,icon'
	    )
	);

	/**
	 * [getList 获取动态列表]
	 * @param  [Integer] $page    [页数]
	 * @param  [Integer] $count   [每页显示个数]
	 * @param  [Integer] $user_id [用户ID]
	 * @return [List]
	 */
	public function getList($page=1,$count=10,$user_id=0){
		if($user_id==0){
			$id = session('login');
			$AttentionModel = D('Attention');
			$attentionList = $AttentionModel->getAttentioner(array('user_id'=>$id));//获取关注的人的ID
			$attentionArray = array();//in查询的数据
			for ($i=0; $i <count($attentionList); $i++) { 
				array_push($attentionArray, $attentionList[$i]['Attention_id']);//in查询数组
			}
			$condition['user_id'] = array('in',$attentionArray);
		}
		else
			$condition['user_id'] = $user_id;
		$condition['delete_tag'] = (bool)0;
		$result = $this->where($condition)
					   ->relation('userinfo')
					   ->order('time desc')
					   ->page($page.','.$count)
					   ->select();
		$CommentModel = D('Comment');
		$ScenicGradeModel = D('ScenicGrade');
		$ImageModel = D('Image');
		$ZanModel = D('Zan');
		$EquipmentGradeModel = D('EquipmentGrade');
		$TravelNote = D('TravelNote');
		$TopicModel = D('Topic');
		$TopicCommentModel = D('TopicComment');
		$TopicZanModel = D('TopicZan');
		for ($i=0; $i <count($result); $i++) { 
			$dynamicsType = $result[$i]['type'];//保存动态类型
			switch ($dynamicsType) {
				
				case 1: //评论了资讯
				case 2: //在资讯在回复
				case 13://在游记中回复
				case 20://在游记中评论
					$ContentModel = $CommentModel;
				break;
				
				case 3://评论了景点
					$ContentModel = $ScenicGradeModel;
				break;

				case 4://在景点中上传照片
				case 5://在城市中上传照片
				case 19://上传了图片
					$ContentModel = $ImageModel;
				break;

				case 6://城市添加想去标记
					$ContentModel = D('CityWant');
				break;

				case 7://城市添加去过标记
					$ContentModel = D('CityBeen');
				break;

				case 8://景点添加想去标记
					$ContentModel = D('ScenicWant');
				break;

				case 9://景点添加去过标记
					$ContentModel = D('ScenicBeen');
				break;


				case 10://点赞了景点
					$ContentModel = $ZanModel;
				break;

				case 11://评论了装备
					$ContentModel = $EquipmentGradeModel;
				break;

				case 12://发表了游记
					$ContentModel = $TravelNote;
				break;

				case 14://发表了话题
					$ContentModel = $TopicModel;
				break;

				case 15://在话题中发表评论
				case 16://在话题评论中回复
					$ContentModel = $TopicCommentModel;
				break;

				case 17://点赞了话题
				case 18://点赞了话题中的评论
					$ContentModel = $TopicZanModel;
				break;

				
				default:
				break;
			}//end switch
			//获取动态信息
			if($ContentModel==$ImageModel)
				$result[$i]['content'] = call_user_func(array($ContentModel,'getDynamics'.$dynamicsType),$result[$i]['id']);
			else
				$result[$i]['content'] = call_user_func(array($ContentModel,'getDynamics'.$dynamicsType),$result[$i]['content_id']);
		}

		// dump($this->getLastSql());
		return $result;
	}

	/**
	 * [getCount] 获取数目
	 * @param  [Integer] $user_id [用户ID]
	 */
	public function getCount($user_id=0){
		if($user_id==0){
			$id = session('login');
			$AttentionModel = D('Attention');
			$attentionList = $AttentionModel->getAttentioner(array('user_id'=>$id));//获取关注的人的ID
			$attentionArray = array();//in查询的数据
			for ($i=0; $i <count($attentionList); $i++) { 
				array_push($attentionArray, $attentionList[$i]['Attention_id']);//in查询数组
			}
			$condition['user_id'] = array('in',$attentionArray);
		}
		else
			$condition['user_id'] = $user_id;
		return $this->where($condition)->count();
	}
}