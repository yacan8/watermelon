<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CityModel extends RelationModel{



	//关联属性
	protected $_link = array(
	    'province'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Province',
	        'foreign_key'=>'province',
	        'mapping_fields'=>'id,province'
	    )
	);

	/**
	 * [getById 通过ID获取信息]
	 * @param  [Integer] $city_id [城市ID]
	 * @return [array]
	 */
	public function getById($city_id){
		$info = $this->relation('province')->find($city_id);
		return $info;
	}


	/**
	 * [getCityAndProvice 根据城市ID获取城市名和省份名]
	 * @param  [Integer] $city_id [城市编号]
	 * @return [array] 
	 */
	public function getCityAndProvice($city_id){
		// select c.city,p.province from wt_city c,wt_province p where c.province = p.id and c.id=2
		$DB_PREFIX = $this->tablePrefix;
		$Model = M('');
		$condition['_string'] = ' c.province = p.id';
		$condition['_logic'] = 'and';
		$condition['c.id'] = $city_id;
		$result = $Model->table($DB_PREFIX.'city c,'.$DB_PREFIX.'province p')->where($condition)->find();
		return $result;

	}


	/**
	 * [getList 获取列表根据想去数量排序]
	 * @param  [max] $province_id  [省份ID]
	 * @param  [Integer] $page  [页数]
	 * @param  [max] $count [每页个数]
	 * @return [List] 
	 */
	public function getList($province_id='',$page=0,$count){
		$DB_PREFIX = $this->tablePrefix;
		if($province_id!=''){
			$condition['c.province'] = $province_id;
		}
		if($page!=0){
			$page_str = "$page,$count";
		}else{
			$page_str = '';
		}
		// select c.city,(select count(*) from wt_city_want where city_id = c.id) want from wt_city c order by want desc
		$List = M('')->table($DB_PREFIX."city c")->where($condition)->field("id,c.city,image,(select count(*) from ".$DB_PREFIX."city_want where city_id = c.id) want,(select count(*) from ".$DB_PREFIX."city_been where city_id = c.id) been")->page($page_str)->order('want desc')->select();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/ScenicImg',array('w'=>228,'h'=>150,'image'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}

	/**
	 * [getAllWantTo 获取相同想去的城市]
	 * @param  [Integer] $city_id [城市ID]
	 * @return List
	 */
	public function getAllWantTo($city_id){
		// SELECT cw.city_id,c.city,c.image,count(*) count from wt_city_want cw,wt_city c where user_id in (select user_id from wt_city_want where city_id = 2 and delete_tag = 0) and c.id = cw.city_id group by city_id order by count desc
		$DB_PREFIX = $this->tablePrefix;
		$List = $this->query("SELECT cw.city_id,c.city,c.image,count(*) count from {$DB_PREFIX}city_want cw,{$DB_PREFIX}city c where user_id in (select user_id from {$DB_PREFIX}city_want where city_id = $city_id and delete_tag = 0) and c.id = cw.city_id and cw.city_id != $city_id group by city_id order by count desc limit 4");
		return $List;
	}
}