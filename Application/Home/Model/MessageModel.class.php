<?php
namespace Home\Model;
use Think\Model\RelationModel;
/**
* 
*/
class MessageModel extends RelationModel{
	//关联属性
	protected $_link = array(
	    'userinfo'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'user_id',
	        'mapping_fields'=>'id,nickname,icon'
	    )
	);


	public function getCount($user_id){
		$LoginModel = M('Login');
		$last_message_time = $LoginModel->where(array('id'=>$user_id))->getField('last_read_message_time');
		$condition['time'] = array('gt',$last_message_time);
		$condition['delete_tag'] = (bool)0;
		$condition['user_id'] = $user_id;
		$result = $this->where($condition)->count();
		return $result;
	}
	public function getList($page=1,$count=10,$user_id=0){
		$LoginModel = M('Login');
		// $last_message_time = $LoginModel->where(array('id'=>$user_id))->getField('last_read_message_time');
		$condition['user_id'] = $user_id;
		$condition['delete_tag'] = (bool)0;
		// $condition['time'] = array('gt',$last_message_time);
		$result = $this->where($condition)
					   ->order('time desc')
					   ->page($page.','.$count)
					   ->select();
		$CommentModel = D('Comment');
		$AttentionModel = D('Attention');
		$ZanModel = D('Zan');
		$BoardModel = D('Board');
		$BoardReplyModel = D('BoardReply');
		$TopicCommentModel = D('TopicComment');
		$TopicZanModel = D('TopicZan');
		for ($i=0; $i <count($result); $i++) { 
			$messageType = $result[$i]['type'];//保存动态类型
			switch ($messageType) {
				
				case 1: //话题被评论了
				case 2: //话题评论被回复了
				case 6://话题中@了我
					$ContentModel = $TopicCommentModel;
				break;

				case 4://话题评论被点赞了
				case 3://话题被点赞了
					$ContentModel = $TopicZanModel;
				break;

				
				case 5://被关注了
					$ContentModel = $AttentionModel;
				break;

				case 7://游记被评论了
				case 8://游记评论被回复了
				case 10://资讯评论被回复了
					$ContentModel = $CommentModel;
				break;

				case 9://游记被点赞了
					$ContentModel = $ZanModel;
				break;


				case 11://个人中心被留言了
					$ContentModel = $BoardModel;
				break;

				case 12://个人中心留言被回复了
					$ContentModel = $BoardReplyModel;
				break;
				
				default:
				break;
			}//end switch
			$result[$i]['content'] = call_user_func(array($ContentModel,'getMessage'.$messageType),$result[$i]['content_id']);

			
		}

		return $result;
	}
}