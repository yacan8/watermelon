<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class CommentModel extends RelationModel{
	//关联属性
	protected $_link = array(
	    'userinfo' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'sender',
	        'mapping_fields'=>'id,nickname,icon'
	    ),
	    'receiverinfo' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'receiver',
	        'mapping_fields'=>'id,nickname'
	    ),
	);
	
	
	/**
	 * [getCount 获取数量]
	 * @param  integer $other_id [被评ID]
	 * @param  integer $user_id  [用户id]
	 * @param  integer $type     [类型]
	 * @return integer
	 */
	public function getCount($other_id=0,$user_id=0,$type=0){
		if($other_id != 0){
			$condition['other_id'] = $other_id;
		}
		if($user_id != 0){
			$condition['sender'] = $user_id;
		}
		if($type!=0){
			$condition['type'] = $type;
		}
		$count = $this ->where($condition)->count();
		return $count;
	}

	/**
	 * [getList 获取列表]
	 * @param  integer $other_id [description]
	 * @param  integer $user_id  [description]
	 * @param  integer $type     [description]
	 * @param  integer $page     [description]
	 * @param  integer $count    [description]
	 * @return [type]            [description]
	 */
	public function getList($other_id=0,$user_id=0,$type=0,$page=1,$count=20){
		if($other_id != 0){
			$condition['other_id'] = $other_id;
		}
		if($user_id != 0){
			$condition['sender'] = $user_id;
		}
		if($type!=0){
			$condition['type'] = $type;
		}
		$List = $this->where($condition)->page("$page,$count")->relation(true)->select();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['type']=='2'){
				$Model = M('Infomation');
			}else{
				$Model = M('TravelNote');
			}
			$List[$i]['title']= $Model->where(array('id'=>$List[$i]['other_id']))->getField('title');
		}
		return $List;
	}
}