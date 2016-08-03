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
	);


	/**
	 * [getCountByCityId 通过城市ID获取该城市照片数量]
	 * @param  [Integer] $city_id [城市ID]
	 * @return [Integer]
	 */
	public function getCountByCityId($city_id){
		$DB_PREFIX =$this->tablePrefix;
		$Model = M('');
		$count = $Model ->table($DB_PREFIX.'image')
						->where('delete_tag = 0 and scenic_id in(select id from '.$DB_PREFIX.'scenic where city_id = '.$city_id.')')
						->count();
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
		$List = $this	->field('id,scenic_id,time,user_id,image')
						->relation($relationStr)
						->where('delete_tag = 0 and scenic_id in('.$subQuery.')')
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
	 * * @param  [bool] $relation   [是否关联用户数据]
	 * @return [List]
	 */
	public function getListByScenicId($scenic_id,$page,$count,$relation = false){
		$condition['delete_tag'] = (bool)0;
		$condition['_logic'] = 'and';
		$condition['scenic_id'] = $scenic_id;
		if($relation!==false)
			$relationStr = true;
		$List = $this	->field('id,scenic_id,time,user_id,image')
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
	 * @param  integer $type [类型 1为景点图片加载 2为城市图片加载]
	 * @return [obj]
	 */
	public function getImage($id,$type){

	

		if($type == 2){
			$scenic_id = $this->where(array('id'=>$id))->getField('scenic_id');
			$condition['delete_tag'] = (bool)0;
			$condition['_logic'] = 'and';
			$condition['scenic_id'] = $scenic_id;
			$array = $this	->field('id,scenic_id,time,user_id,image')
							->relation(true)
							->where($condition)
							->find($id);
			
			$next_condition = $pre_condition = $condition;

			
			$next_condition['id']  = array('gt',$id);
			$pre_condition['id']  = array('lt',$id);
			$array['next'] = $this->where($next_condition)->limit('1')->getField('id');//上一个ID
			$array['pre']  = $this->where($pre_condition)->order('id desc')->limit('1')->getField('id');//下一个ID
			$array['count'] = $this->where($next_condition)->count()+1;
		}
		else if($type == 1){
			$ScenicModel = M('Scenic');
			$scenicSubQuery = $this->field('scenic_id')->where(array('id'=>$id))->select(false);
			$city_id = $ScenicModel->where('id = ('.$scenicSubQuery.')')->getField('city_id');
			$subQuery  =$ScenicModel->field('id')->where(array('city_id'=>$city_id))->select(false);//生成子查询语句
			$condition['_string'] = 'delete_tag = 0 and scenic_id in('.$subQuery.')';
			$array = $this	->field('id,scenic_id,time,user_id,image')
							->relation(true)
							->where($condition)
							->find($id);
			$next_condition = $pre_condition = $condition;
			$next_condition['id']  = array('gt',$id);
			$pre_condition['id']  = array('lt',$id);
			$array['next'] = $this->where($next_condition)->limit('1')->getField('id');//上一个ID
			$array['pre'] = $this->where($pre_condition)->limit('1')->order('id desc')->getField('id');//下一个ID
			$array['count'] = $this->where($next_condition)->count()+1;
		}
		return $array;
		
	}




	


}