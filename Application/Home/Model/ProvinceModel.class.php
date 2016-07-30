<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ProvinceModel extends RelationModel{


	protected $_link = array(
		
	    'city'  =>  array(
	    	'mapping_type' =>self::HAS_MANY,
	        'class_name' => 'City',
	        'foreign_key'=>'province',
	        'mapping_fields'=>'id,city'
	    ),
	);



}