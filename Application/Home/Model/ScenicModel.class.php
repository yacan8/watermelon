<?php
// 景点模型
namespace Home\Model;
use Think\Model\RelationModel;
class ScenicModel extends RelationModel{





	//关联属性
	protected $_link = array(
	    'type'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'ScenicType',
	        'foreign_key'=>'type_id',
	        'mapping_fields'=>'type',
	        'as_fields'=>'type'
	    )
	);
	/**
	 * [getById 通过ID获取景点]
	 * @param  [Integer] $id [景点编号]
	 * @return [array]
	 */
	public function getById($id){
		$result = $this->relation('type')->find($id);
		return $result;
	}


	/**
	 * [getHotScenicByCityId 根据城市编号获取做多人想去的景点]
	 * @param  [Integer] $city_id [城市编号]
	 * @param  [Integer] $page    [页数]
	 * @param  [Integer] $count   [每页个数]
	 * @param  [Integer] $type   [类型]
	 * @return [List]
	 */
	public function getHotScenicByCityId($city_id,$page,$count,$type=''){
		$DB_PREFIX = $this->tablePrefix;//数据库表前缀
		$Model = M('');
		if($type!=''){
			$condition['s.type_id'] = M('ScenicType')->where(array('type'=>$type))->getField('id');
		}
		$condition['s.city_id'] = $city_id;
		$List = $Model->table($DB_PREFIX.'scenic s')
					   ->field('s.id,s.image,s.name,s.grade,(select count(*) from '.$DB_PREFIX.'scenic_want where scenic_id = s.id) want_count')
					   ->order('want_count desc,grade desc')
					   ->where($condition)
					   ->page("$page,$count")
					   ->select();
		return $List;
	}




	/**
	 * [getList 获取景点列表]
	 * @param  [Integer]  $city_id [城市编号]
	 * @param  integer $type_id [景点类型编号]
	 * @param  integer $page    [页数]
	 * @param  [Integer]  &$count  [每页显示页数，引用后为总个数]
	 * @return [List] 
	 */
	public function getList($city_id,$type_id=0,$page=1,&$count){
		$DB_PREFIX = $this->tablePrefix;//数据库表前缀
		$condition['s.city_id'] = $city_id;
		$condition['_string'] = 's.type_id=st.id';
		$condition['_logic'] = 'and';
		if($type_id!=0){
			$condition['s.type_id'] = $type_id;
		}
		$Model = M('');
		$List = $Model->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')
					   ->field('s.id,s.name,s.desciption,s.grade,s.image,st.type,(select count(*) from '.$DB_PREFIX.'scenic_grade where scenic_id = s.id) comment_count')
					   ->order('grade desc')
					   ->where($condition)
					   ->page($page.','.$count)
					   ->select();
		$count = $Model->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')
					   ->where($condition)
					   ->count();

		return $List;
		// select s.id,s.name,s.desciption,s.grade,st.type,(select count(*) from wt_scenic_grade where scenic_id = s.id) comment_count from wt_scenic s,wt_scenic_type st where s.type_id=st.id order by grade desc
	}


	/**
	 * [getNearestScenic 获取最近的景点]
	 * @param  [Integer] $scenic_id [景点ID]
	 * @param  [Integer] $lat       [数量]
	 * @return [List]
	 */
	public function getNearestScenic($scenic_id,$count=3){
		$DB_PREFIX = $this->tablePrefix;
		$info = $this->field('city_id,longitude,latitude')->find($scenic_id);
		$lng = $info['longitude'];
		$lat = $info['latitude'];
		$city_id = $info['city_id'];
		$sql = "SELECT id,name,grade,image,ROUND(6378.138*2*ASIN(SQRT(POW(SIN(($lat*PI()/180-latitude*PI()/180)/2),2)+COS($lat*PI()/180)*COS(latitude*PI()/180)*POW(SIN(($lng*PI()/180-longitude*PI()/180)/2),2)))*1000) distance FROM wt_scenic where city_id = $city_id and latitude <> '' and id <> $scenic_id ORDER BY distance asc limit $count";
		$List = M('')->query($sql);
		return $List;
	}
}

