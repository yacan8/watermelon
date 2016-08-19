<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CollectionModel extends RelationModel{
	//关联属性
	protected $_link = array(
	    'News'  =>  array(
	    	'mapping_type' =>self::HAS_ONE,
	        'class_name' => 'News',
	        'foreign_key'=>'collected',
	        'mapping_fields'=>'id,type,title,intro,publish_time'
	    )
	);

	/**
	 * [DeleteById 取消收藏]
	 * @param  [Integer] $collected  [NEWS ID]
	 * @param  [String] $collecting [用户手机号码ID]
	 * @return [bool]             [返回是否删除成功]
	 */
	public function DeleteById($collected,$collecting){
		$result = $this->where(array('collected'=>$collected,'collecting' =>$collecting))->delete();
		if($result!=0)
			return true;
		else
			return false;
	}
	/**
	 * [CheckIsCollected 检测是否已被收藏]
	 * @param [Integer]  $other_id [被收藏ID]
	 * @param [Integer]  $user     [用户ID]
	 * @param [integer] $type     [收藏类型 1为新闻收藏 2为话题收藏]
	 * @return [List] [返回查询列表 如果存在长度且删除标识delete_tag为0 为已被收藏 否则为未收藏]
	 */
	public function CheckIsCollected($other_id,$user,$type=1){
		$data['other_id'] = $other_id;
		$data['user_id'] = $user;
		$data['type'] = $type;
		$condition['_logic'] = 'AND';
		$list = $this->where($data)->field('id,delete_tag')->select();
		return $list;
	}

	public function getList($first,$list,$condition=null){
		$result = $this->where($condition)
					   ->limit($first.','.$list)
					   ->select();
		foreach ($result as &$value) {
			switch ($value['type']) {
				case '1': $model = D('TravelNote'); 
						  $info = $model->getInfoByUserId($value['other_id']);
						  $value['title'] = $info['title'];
						  break;
				case '2': $model = D('Topic'); 
						  $info = $model->getById($value['other_id']);
						  $value['title'] = $info['title'];
						  break;
				case '3': $model = D('Equipment'); 
						  $info = $model->getById($value['other_id']);
						  $value['title'] = $info['name'];
						  break;
				default: break;
			}
		}
		return $result;
	}

	public function getCount($condition){
		$result = $this->where($condition)->count();
		if ($result) {
			return $result;
		} else {
			return 0;
		}
		
	}
}