<?php
namespace Admin\Model;
use Think\Model;
class EquipmentBrandModel extends Model{

	/**
	 * [getList 获取列表]
	 */
	public function getList($limit=0){
		$DB_PREFIX = $this->tablePrefix;
		$List = $this->table($DB_PREFIX.'equipment_brand eb')->order('count desc')->field('id,brand,(select count(*) from '.$DB_PREFIX.'equipment where brand_id = eb.id) count')->select();
		return $List;

	}



	/**
	 * [getBrandList 获取数量列表]
	 * @param  integer $type_id [装备类型ID]
	 * @return [List]
	 */
	public function getBrandList($type_id=0,$limit=15){
		// select et.id,et.type,count(*) count from wt_equipment e,wt_equipment_type et where e.type_id = et.id group by et.id
		if($type_id!=0){
			$condition['e.type_id'] = $type_id;
		}
		$DB_PREFIX = $this->tablePrefix;
		$condition['_string'] = 'e.brand_id = eb.id';
		$condition['_logic'] = 'and';
		$List = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_brand eb')->field('eb.id,eb.brand,count(*) count')->order('count desc')->group('eb.id')->where($condition)->limit($limit)->select();
		return $List;
	}

	public function getCount($type_id=0){
		// SELECT count(*) count FROM wt_equipment e,wt_equipment_brand eb WHERE ( e.brand_id = eb.id ) 
		if($type_id!=0){
			$condition['e.type_id'] = $type_id;
		}
		$DB_PREFIX = $this->tablePrefix;
		$condition['_string'] = 'e.brand_id = eb.id';
		$condition['_logic'] = 'and';
		$count = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_brand eb')->where($condition)->count();
		return $count;

	}
}