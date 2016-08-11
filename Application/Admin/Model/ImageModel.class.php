<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ImageModel extends RelationModel{

	//关联属性
	protected $_link = array(
		'city'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'City',
	        'foreign_key'=>'city_id',
	        'mapping_fields'=>'id,city'
	    ),

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
	 * [getCount 获取图片给数量]
	 * @param  integer $province_id [省份ID，如果为0，返回所有图片数量]
	 * @return [integer]
	 */
	public function getCount($province_id=0){
		$DB_PREFIX = $this->tablePrefix;
		if($province_id!=0){
			$subQuery = M('City')->field('id')->where(array('province'=>$province_id))->select(false);
			$condition['city_id'] = array('exp','in ('.$subQuery.')');
		}
		$condition['delete_tag'] = (bool)0;
		$count = $this->where($condition)->count();
		return $count;
	}
	/**
	 * [getProvinceCountList 获取城市图片数量列表]
	 * @return [List]
	 */
	public function getProvinceCountList($user_id = 0){
		$DB_PREFIX = $this->tablePrefix;
		$condition['i.city_id'] = array('exp','in (select id from wt_city where province = p.id)');
		$condition['_logic'] = 'and';
		if($user_id !=0){
			$condition['i.user_id'] = $user_id;
		}
		$condition['i.delete_tag'] = (bool)0;
		// $SQL = "select p.id,p.province,count(*) count from wt_image i,wt_province p where i.city_id in (select id from wt_city where province = p.id) group by p.id";
		$List = $this->table($DB_PREFIX.'image i,'.$DB_PREFIX.'province p')->field('p.id,p.province,count(*) count')->where($condition)->group('p.id')->select();
		return $List;
	}


	/**
	 * [getCityCountListByProvinceId 获取城市图片数量列表通过省份编号]
	 * @param  [Integer] $province_id [省份编号]
	 * @return [List]
	 */
	public function getCityCountListByProvinceId($province_id,$user_id=0){
		// select c.id,c.city,count(*) count from wt_image i,wt_city c where c.province = 3 and i.city_id = c.id group by c.id 
		$DB_PREFIX = $this->tablePrefix;
		$condition['_string'] = 'i.city_id = c.id';
		$condition['_logic'] = 'and';
		$condition['c.province'] = $province_id;
		$condition['i.delete_tag'] = (bool)0;
		if($user_id !=0){
			$condition['i.user_id'] = $user_id;
		}
		$List = $this->table($DB_PREFIX.'image i,'.$DB_PREFIX.'city c')->field('c.id,c.city,count(*) count')->where($condition)->group('c.id')->select();
		return $List;
	}



	/**
	 * [getCountByCityId 获取图片数量通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @return [Integer]
	 */
	public function getCountByCityId($city_id){
		$condition['city_id'] = $city_id;
		$condition['delete_tag'] = (bool)0;
		$count = $this->where($condition)->count();
		return $count;
	}

	/**
	 * [getCountByScenicIdAndUserId 获取图片数量通过景点ID和用户ID]
	 * @param  integer $scenic_id [景点ID]
	 * @param  integer $user_id   [用户ID]
	 * @return [integer]
	 */
	public function getCountByScenicIdAndUserId($scenic_id=0,$user_id=0){
		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}
		if($user_id!=0){
			$condition['user_id'] = $user_id;
		}
		$condition['delete_tag'] = (bool)0;
		$count = $this->where($condition)->count();
		return $count;
	}



	public function getList($province_id='',$city_id='',$scenic_id=0,$user_id=0,$page,$count){
		if($province_id!=''&&$city_id==''){
			$subQuery = M('City')->field('id')->where(array('province'=>$province_id))->select(false);
			$condition['city_id'] = array('exp','in ('.$subQuery.')');
		}else if($city_id!=''){
			$condition['city_id'] = $city_id;
		}
		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}
		if($user_id!=0){
			$condition['user_id'] = $user_id;
		}
		$condition['delete_tag'] = (bool)0;
		$List = $this->relation(true)->page("$page,$count")->where($condition)->order('id desc')->select();
		return $List;
	}




	/**
	 * [getImage 获取图片信息]
	 * @param  [Integer]  $id   [图片ID]
	 * @param  integer $type [类型 1为城市图片加载 2为景点图片加载]
	 * @return [obj]
	 */
	public function getImage($id,$province_id,$city_id,$scenic_id,$user_id){
		$condition['_logic'] = 'and';

		if($scenic_id!=0){
			$condition['scenic_id'] = $scenic_id;
		}else{
			if($city_id!=''){
				$condition['city_id'] = $city_id;
			}else{
				if($province_id!=''){
					$subQuery = M('City')->field('id')->where(array('province'=>$province_id))->select(false);
					$condition['city_id'] = array('exp','in ('.$subQuery.')');
				}
			}
		}
		
		if($user_id!=0){
			$condition['user_id'] = $user_id;
		}
		$condition['delete_tag'] = (bool)0;
		$array = $this	->field('id,scenic_id,time,user_id,image,city_id')
							->relation(true)
							->where($condition)
							->find($id);
		$next_condition = $pre_condition = $condition;
		$next_condition['id']  = array('gt',$id);
		$pre_condition['id']  = array('lt',$id);
		$array['next'] = $this->where($next_condition)->limit('1')->getField('id');//上一个ID
		$array['pre'] = $this->where($pre_condition)->limit('1')->order('id desc')->getField('id');//下一个ID
		$array['count'] = $this->where($next_condition)->count()+1;
		return $array;
		
	}



}