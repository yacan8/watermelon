<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class EquipmentModel extends RelationModel{
	//关联属性
	protected $_link = array(
	    'type' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'EquipmentType',
	        'foreign_key'=>'type_id',
	        'mapping_fields'=>'type',
	        'as_fields'=>'type'
	    ),
	    'brand' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'EquipmentBrand',
	        'foreign_key'=>'brand_id',
	        'mapping_fields'=>'brand',
	        'as_fields'=>'brand'
	    ),
	);


	/**
	 * [getList 获取列表]
	 * @param  integer $type_id  [装备类型id]
	 * @param  integer $brand_id [装备品牌id]
	 * @param  integer $page     [分页数]
	 * @param  integer &$count    [每页显示个数,引用，执行后为符合条件的总个数]
	 * @param  string  $order    [排序字段]
	 * @return [List]
	 */
	public function getList($type_id=0,$brand_id=0,$page=1,&$count=30,$order=''){
		// select e.id id,e.name name,eb.id brand_id,eb.brand brand,e.price price,e.grade grade,e.type_id type_id,et.type type,(select count(*) from wt_equipment_grade where equipment_id = e.id) comment_count from wt_equipment e,wt_equipment_type et,wt_equipment_brand eb where e.type_id = et.id and e.brand_id = eb.id
		$DB_PREFIX = $this->tablePrefix;
		if($type_id != 0){
			$condition['e.type_id'] = $type_id;
		}
		if($brand_id != 0){
			$condition['e.brand_id'] = $brand_id;
		}
		$condition['_string'] = 'e.type_id = et.id and e.brand_id = eb.id';
		$condition['_logic'] = 'and';
		if($order!=''){
			$order_str = ','.$order_str.' desc';
		}else
			$order_str = '';
		$List = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et,'.$DB_PREFIX.'equipment_brand eb')
					 ->field('e.id id,e.name name,eb.id brand_id,eb.brand brand,e.image image,e.price price,e.grade grade,e.type_id type_id,et.type type,e.delete_tag,(select count(*) from '.$DB_PREFIX.'equipment_grade where equipment_id = e.id) comment_count')
					 ->page("$page,$count")
					 ->where($condition)
					 ->order('e.delete_tag asc '.$order_str)
					 ->select();
		$count = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et,'.$DB_PREFIX.'equipment_brand eb')->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}

	/**
	 * [search 搜索装备]
	 * @param  [string] $key    [关键字]
	 * @param  [Integer] $page   [页数]
	 * @param  [Integer] &$count [引用，每页显示数量，引用后为总数]
	 * @return [List] 
	 */
	public function search($key,$page,&$count){
		$DB_PREFIX = $this->tablePrefix;
		$condition['e.name']  = array('like','%'.$key.'%');
		$condition['_string'] = 'e.type_id = et.id and e.brand_id = eb.id';
		$condition['_logic'] = 'and';
		if($order!=''){
			$order_str = ','.$order_str.' desc';
		}else
			$order_str = '';
		$List = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et,'.$DB_PREFIX.'equipment_brand eb')
					 ->field('e.id id,e.name name,eb.id brand_id,eb.brand brand,e.image image,e.price price,e.grade grade,e.type_id type_id,et.type type,e.delete_tag,(select count(*) from '.$DB_PREFIX.'equipment_grade where equipment_id = e.id) comment_count')
					 ->page("$page,$count")
					 ->where($condition)
					 ->order('e.delete_tag asc '.$order_str)
					 ->select();
		$count = $this->table($DB_PREFIX.'equipment e,'.$DB_PREFIX.'equipment_type et,'.$DB_PREFIX.'equipment_brand eb')->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 
			$List[$i]['name'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['name']);//关键字高亮
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}
}