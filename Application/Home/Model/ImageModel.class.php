<?php

namespace Home\Model;
use Think\Model\RelationModel;
class ImageModel extends RelationModel{

	//关联属性
	protected $_link = array(
		'user'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'user_id',
	        'mapping_fields'=>'id,nickname'
	    ),
	    'scenic'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Scenic',
	        'foreign_key'=>'scenic_id',
	        'mapping_fields'=>'id,name'
	    ),
	    'city'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'City',
	        'foreign_key'=>'city_id',
	        'mapping_fields'=>'id,city'
	    ),
	    'album' => array(
	    	'mapping' =>self::BELONGS_TO,
	    	'class_name' => 'Album',
	    	'foreign_key' => 'album_id',
	    	'mapping_filed' => 'id'
	    ),
	);


	/**
	 * [getCountByCityId 通过城市ID获取该城市照片数量]
	 * @param  [Integer] $city_id [城市ID]
	 * @return [Integer]
	 */
	public function getCountByCityId($city_id){
		$condition['delete_tag'] = (bool)0;
		$condition['city_id'] = $city_id;
		$count = $this ->where($condition)->count();
		return $count;
	}

	/**
	 * [getCountByScenicId 通过景点ID获取该城市照片数量]
	 * @param  [Integer] $scenic_id [景点ID]
	 * @return [Integer]
	 */
	public function getCountByScenicId($scenic_id){
		$count = $this ->where(array('delete_tag'=>(bool)0,'scenic_id'=>$scenic_id))->count();
		return $count;
	}
	/**
	 * [getImgByDynamicsId 通过动态ID获取图片]
	 * @param  [Integer] $dynamics_id [动态ID]
	 * @return [List]       [查询到的图片列表]
	 */
	public function getImgByDynamicsId($dynamics_id){
		$condition['dynamics_id'] = $dynamics_id;
		$condition['delete_tag'] = (bool)0;
		return $this->where($condition)->field('image')->select();
	}

	/**
	 * [getListByCityId 获取图片列表通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @param  [Integer] $page    [页数]
	 * @param  [Integer] $count   [每页显示个数]
	 * @param  [bool] $relation   [是否关联用户数据]
	 * @return [List]
	 */
	public function getListByCityId($city_id,$page,$count,$relation = false){
		$ScenicModel = M('Scenic');
		$subQuery  =$ScenicModel->field('id')->where(array('city_id'=>$city_id))->select(false);//生成子查询语句
		if($relation!==false)
			$relationStr = true;
		$condition['delete_tag'] = (bool)0;
		$condition['city_id'] = $city_id;
		$List = $this	->field('id,scenic_id,time,user_id,image,city_id')
						->relation($relationStr)
						->where($condition)
						->page("$page,$count")
						->order('id desc')
						->select();
		return $List;
	}


	/**
	 * [getListByScenicId 获取图片列表通过城市编号]
	 * @param  [Integer] $scenic_id [景点编号]
	 * @param  [Integer] $page    [页数]
	 * @param  [Integer] $count   [每页显示个数]
	 * @param  [bool] $relation   [是否关联用户数据]
	 * @return [List]
	 */
	public function getListByScenicId($scenic_id,$page,$count,$relation = false){
		$condition['delete_tag'] = (bool)0;
		$condition['_logic'] = 'and';
		$condition['scenic_id'] = $scenic_id;
		if($relation!==false)
			$relationStr = true;
		$List = $this	->field('id,scenic_id,time,user_id,image,city_id')
						->relation($relationStr)
						->where($condition)
						->page("$page,$count")
						->order('id desc')
						->select();
		return $List;
	}


	/**
	 * [getImage 获取图片信息]
	 * @param  [Integer]  $id   [图片ID]
	 * @param  integer $type [类型 1为城市图片加载 2为景点图片加载]
	 * @return [obj]
	 */
	public function getImage($id,$type){
		if($type == 2){
			$scenic_id = $this->where(array('id'=>$id))->getField('scenic_id');
			$condition['delete_tag'] = (bool)0;
			$condition['_logic'] = 'and';
			$condition['scenic_id'] = $scenic_id;

		}
		else if($type == 1){
			$city_id = $this->where(array('id'=>$id))->getField('city_id');
			$condition['delete_tag'] = (bool)0;
			$condition['_logic'] = 'and';
			$condition['city_id'] = $city_id;
		}
		$array = $this->field('id,scenic_id,time,user_id,image,city_id')
					  ->relation(true)
					  ->where($condition)
					  ->find($id);
		$next_condition = $pre_condition = $condition;
		$next_condition['id']  = array('gt',$id);
		$pre_condition['id']  = array('lt',$id);
		$array['next']  = $this->where($next_condition)->limit('1')->getField('id');//上一个ID
		$array['pre']   = $this->where($pre_condition)->limit('1')->order('id desc')->getField('id');//下一个ID
		$array['count'] = $this->where($next_condition)->count()+1;
		return $array;
		
	}
	/**
	 * [getCountByUserId 过去相片数量通过用户ID]
	 * @param  [Integer] $userid [用户ID]
	 * @return [Integer] 相片总数
	 */
	public function getCountByUserId($userid){
		$count = $this ->where(array('delete_tag'=>(bool)0,'user_id'=>$userid))->count();
		return $count;
	}
	/**
	 * [getListByAlbumId 通过相册获取相片列表]
	 * @param  [Array] $condition [查询条件，其中键值包括album_id]
	 * @return [List]            [相片列表]
	 */
	public function getListByAlbumId($condition){
		$result = $this->relation(false)->where($condition)->select();
		return $result;
	}


	
	/**
	 * [getDynamics4 获取动态 类型4 在城市中上传了照片]
	 * @param  [Integer] $id [动态ID]
	 * @return [List] 
	 */
	public function getDynamics4($id){
		$condition['delete_tag'] = (bool)0;
		$condition['_logic'] = 'and';
		$condition['dynamics_id'] = $id;
		$List = $this	->field('id,scenic_id,time,user_id,image,city_id')
						->relation(true)
						->where($condition)
						->order('id desc')
						->select();
		return $List;
	}

	/**
	 * [getDynamics5 获取动态 类型5 在景点中上传了照片]
	 * @param  [Integer] $id [动态ID]
	 * @return [List] 
	 */
	public function getDynamics5($id){
		$condition['delete_tag'] = (bool)0;
		$condition['_logic'] = 'and';
		$condition['dynamics_id'] = $id;
		$List = $this	->field('id,scenic_id,time,user_id,image,city_id')
						->relation(true)
						->where($condition)
						->order('id desc')
						->select();
		return $List;
	}



	/**
	 * [getDynamics5 获取动态 类型5 在景点中上传了照片]
	 * @param  [Integer] $id [动态ID]
	 * @return [List] 
	 */
	public function getDynamics19($id){
		$condition['delete_tag'] = (bool)0;
		$condition['_logic'] = 'and';
		$condition['dynamics_id'] = $id;
		$List = $this	->field('id,scenic_id,time,user_id,image,city_id')
						->relation(true)
						->where($condition)
						->order('id desc')
						->select();
		return $List;
	}

}