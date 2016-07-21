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
}