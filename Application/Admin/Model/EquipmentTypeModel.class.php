<?php
namespace Admin\Model;
use Think\Model;
class EquipmentTypeModel extends Model{

	/**
	 * [getList 获取列表]
	 */
	public function getList(){
		$DB_PREFIX = $this->tablePrefix;
		$List = $this->table($DB_PREFIX.'equipment_type et')->field('id,type,(select count(*) from '.$DB_PREFIX.'equipment where type_id = et.id) count')->order('count desc')->select();
		return $List;
	}


	/**
	 * [getTypeList 获取数量列表]
	 * @param  integer $brand_id [品牌ID]
	 * @return [List]
	 */
	public function getTypeList($brand_id=0){
		// select et.id,et.type,count(*) count from wt_equipment e,wt_equipment_type et where e.type_id = et.id group by et.id
		if($brand_id!=0){
			$condition['e.brand_id'] = $brand_id;
		}
		$DB_PREFIX = $this->tablePrefix;
		$condition['_string'] = 'e.type_id = et.id';
		$condition['_logic'] = 'and';
		$List = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et')->field('et.id,et.type,count(*) count')->group('et.id')->where($condition)->select();
		return $List;
	}


	public function getCount($brand_id=0){
		if($type_id!=0){
			$condition['e.brand_id'] = $brand_id;
		}
		$DB_PREFIX = $this->tablePrefix;
		$condition['_string'] = 'e.type_id = et.id';
		$condition['_logic'] = 'and';
		$count = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et')->where($condition)->count();
		return $count;

	}
}