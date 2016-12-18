<?php
namespace Home\Model;
use Think\Model\RelationModel;
class TopicCommentModel extends RelationModel{
	//create字段处理
	protected $_auto = array(
	    array('content', 'htmlspecialchars_decode', self::MODEL_BOTH, 'function'),
	);

	//关联字段
	protected $_link = array(
		'topic'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Topic',
	        'foreign_key'=>'topic_id',
	        'mapping_fields'=>'title',
	        'as_fields'=>'title'
	    ),
	);
	/**
	 * [getByTopicId 通过话题ID获取评论内容]
	 * @param  [Integer] $topic_id [话题ID]
	 * @param  [Integer] $comment_id [回复的评论ID，若为0，则为评论内容]
	 * @param  [Integer] $page     [传入的页数]
	 * @param  [Integer] $count    [每页显示页数]
	 * @param  [String]  $sort_type [排序类型 'hot'为点赞降序 ,'time_up'为时间升序,'time_down'为时间降序]
	 * @return [List]           [查询到的列表]
	 */
	public function getByTopicId($topic_id,$comment_id=0,$page=1,$count=10,$sort_type='time_up'){
		$firstrow = ($page-1)*$count;
		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
		$condition['_string'] = "tc.sender = l.id and tc.comment_id = $comment_id and tc.delete_tag = 0";
		$condition['tc.topic_id'] = $topic_id;
		$M = M('');
		if($sort_type == 'hot')//最热排序
			$order = 'zan desc,time asc';
		else if($sort_type == 'time_up')//时间升序
			$order = 'time asc';
		else if($sort_type =='time_down')//时间降序
			$order = 'time desc';
		else
			exit('参数错误');
		if($page != 0)
			$List = $M->table($DB_PREFIX.'topic_comment tc,'.$DB_PREFIX.'login l')
					  ->field('tc.id c_id,tc.content content,tc.time time,zan_count zan,l.id sender_id,l.nickname sender_nickname,l.icon sender_icon,(select count(*) from '.$DB_PREFIX.'topic_picture tp where tp.type=2 and tp.other_id = tc.id) picture_count')
					  ->where($condition)
					  ->limit("$firstrow,$count")
					  ->order($order)
					  ->select();
		else
			$List = $M->table($DB_PREFIX.'topic_comment tc,'.$DB_PREFIX.'login l')
					  ->field('tc.id c_id,tc.content content,tc.time time,l.id sender_id,l.nickname sender_nickname,l.icon sender_icon')
					  ->where($condition)
					  ->order($order)
					  ->select();
		$Date = new \Org\Util\Date();
		foreach ($List as $key => $value) {
			$List[$key]['sender_url'] = U('/u/'.$value['sender_id'],'',false,false);
			if($value['sender_icon']=='')
				$value['sender_icon'] = 'default.jpg';
			$List[$key]['sender_icon'] = C('__DATA__').'/login_thumb/'.$value['sender_icon'];
			$List[$key]['time'] = timeDiff($Date,$value['time']);
			$List[$key]['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $value['content']);//特定字符替换为表情
			$List[$key]['content'] = $this->replaceUserText($List[$key]['content']);//@回复替换
		}
		return $List;
	}

	/**
	 * [getReplyByTopicIdAndCommentList 将回复内容插入到评论列表中]
	 * @param  [Integer] $topic_id     [话题ID]
	 * @param  [List] &$CommentList [评论列表]
	 */
	public function getReplyByTopicIdAndCommentList($topic_id,&$CommentList){
		for ($i=0; $i < count($CommentList); $i++) { 
			$CommentList[$i]['reply'] = $this->getByTopicId($topic_id,$CommentList[$i]['c_id'],0);
		}
	}

	/**
	 * [getAllCount 获取总页数]
	 * @param  [Integer] $topic_id   [话题ID]
	 * @param  [Integer] $comment_id [评论回复ID 0为直接评论]
	 * @param  [Integer] $showCount  [每页显示个数]
	 * @return [Integer]             [返回页数]
	 */
	public function getAllCount($topic_id,$comment_id){
		$condition['topic_id']   = $topic_id;
		$condition['comment_id'] = $comment_id; 
		$condition['_logic']     = 'AND';
		$count = $this->where($condition)->count();
		return $count;
 	}


 	/**
 	 * [checkAndSendMessage 检查是否符合@回复格式内容并获取信息]
 	 * @param  [String] $content [传入的评论内容]
 	 * @return [array]          [返回带content和用户Id的数组]
 	 */
 	public function checkAndSendMessage($content){
 		$content_first_two = substr($content,0,2);
		if($content_first_two == '@['){
			$pattern = '/@\[(\d*?)\](\S*?):/';
			preg_match($pattern , $content ,$matches);
			$user_id = $matches[1];
			$username = $matches[2];
			$LoginModel = M('Login');
			$count = $LoginModel->where(array('id'=>$user_id,'nickname'=>$username))->count();
			if($count!=0){//该用不存在
				$replace_content= preg_replace('/@\[(\d*?)\](\S*?):/', '@[${1}][username]:', $content);//特定字符替换为表情
				$data['user_id'] = $user_id;
				// $data['content'] = $replace_content;
				$this->content = $replace_content;
				return $data;
			}else
				return false;
		}else
			return false;
 	}

 	/**
 	 * [replaceUserText 替换内容中的@[user_id][username]正则表达式内容]
 	 * @param  [String] $content [内容]
 	 * @return [String]          [替换后内容]
 	 */
 	public function replaceUserText($content){
 		$content_first_two = substr($content,0,2);
	 	if($content_first_two == '@['){
			$pattern = '/@\[(\d*?)\]\[username\]:/';
			preg_match($pattern , $content ,$matches);
			$user_id = $matches[1];
			$LoginModel = M('Login');
			$nickname = $LoginModel->where(array('id'=>$user_id))->getField('nickname');
			$url = U('/u/'.$user_id,'',false,false);
			$replace_content= preg_replace('/@\[(\d*?)\]\[username\]:/', '<a class="a_user" href="'.$url.'">@'.$nickname.':</a>', $content);
			return $replace_content;
		}else
			return $content;
 	}




 	/**
	 * [getDynamics15 获取动态 类型15 在话题中评论]
	 * @param  [Integer] $id [话题ID]
	 * @return [array] 
	 */
 	public function getDynamics15($id){
 		$result = $this->relation('topic')->find($id);
 		$result['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $result['content']);//特定字符替换为表情
 		$result['content'] = $this->replaceUserText($result['content']);
 		return $result;
 	}


 	/**
	 * [getDynamics16 获取动态 类型16 在话题中评论中回复]
	 * @param  [Integer] $id [话题评论ID]
	 * @return [array] 
	 */
 	public function getDynamics16($id){
 		$result = $this->relation('topic')->find($id);
 		if($result['comment_id']!=0){
	 		$result['receiver_id'] = $this->where(array('id'=>$result['comment_id']))->getField('sender');
	 		$result['receiver_nickname'] = M('Login')->where(array('id'=>$result['receiver_id']))->getField('nickname');
 		}
 		$result['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $result['content']);//特定字符替换为表情
 		$result['content'] = $this->replaceUserText($result['content']);
 		return $result;
 	}



	/**
	 * [getMessage1 获取消息 类型1 话题被评论了]
	 * @param  [Integer] $id [话题评论ID]
	 * @return [array] 
	 */
 	public function getMessage1($id){
 		$result = $this->relation('topic')->find($id);
 		$result['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $result['content']);//特定字符替换为表情
 		$result['content'] = $this->replaceUserText($result['content']);
 		return $result;
 	}


 	/**
	 * [getMessage2 获取消息 类型2 在话题中评论中回复]
	 * @param  [Integer] $id [话题评论ID]
	 * @return [array] 
	 */
 	public function getMessage2($id){
 		$result = $this->relation('topic')->find($id);
 		if($result['comment_id']!=0){
	 		$result['receiver_id'] = $this->where(array('id'=>$result['comment_id']))->getField('sender');
	 		$result['receiver_nickname'] = M('Login')->where(array('id'=>$result['receiver_id']))->getField('nickname');
 		}
 		$result['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $result['content']);//特定字符替换为表情
 		$result['content'] = $this->replaceUserText($result['content']);
 		return $result;
 	}


 	/**
	 * [getMessage6 获取消息 类型3 在话题评论中@]
	 * @param  [Integer] $id [话题评论ID]
	 * @return [array] 
	 */
 	public function getMessage6($id){
 		$result = $this->relation('topic')->find($id);
 		if($result['comment_id']!=0){
	 		$result['receiver_id'] = $this->where(array('id'=>$result['comment_id']))->getField('sender');
	 		$result['receiver_nickname'] = M('Login')->where(array('id'=>$result['receiver_id']))->getField('nickname');
 		}
 		$result['content'] =  preg_replace('/\[\:(\S{5})\:\]/', '<span class="fr-emoticon fr-emoticon-img" style="background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/${1}.svg)">&nbsp;</span>', $result['content']);//特定字符替换为表情
 		$result['content'] = $this->replaceUserText($result['content']);
 		return $result;
 	}
}