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
	 * @param  [Integer] $page  [页数]
	 * @param  [Integer] $count [每页个数]
	 * @return [List] 
	 */
	public function getList($page,$count){
		$DB_PREFIX = $this->tablePrefix;
		// select c.city,(select count(*) from wt_city_want where city_id = c.id) want from wt_city c order by want desc
		$List = M('')->table($DB_PREFIX."city c")->where($condition)->field("id,c.city,image,(select count(*) from ".$DB_PREFIX."city_want where city_id = c.id) want,(select count(*) from ".$DB_PREFIX."city_been where city_id = c.id) been")->page("$page,$count")->order('want desc')->select();
		return $List;
	}
}