<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ScenicModel extends RelationModel{

	protected $_link = array(
	    'type' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'ScenicType',
	        'foreign_key'=>'type_id',
	        'mapping_fields'=>'type',
	        'as_fields'=>'type'
	    )
	);

	public function getScenicByProvinceIdOrCityId($page,&$count,$province_id='',$city_id=''){
		$DB_PREFIX = $this->tablePrefix;
		if($province_id!=''&&$city_id == ''){
			$condition['s.city_id'] = array('exp','in (select id from '.$DB_PREFIX.'city where province ='.$province_id.')');
		}else if($city_id != ''){
			$condition['s.city_id'] = $city_id;
		}
		$condition['_string'] = 's.type_id = st.id ';
		$condition['_logic'] = 'and';
		$List = $this->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')
					 ->field('s.id id,s.name name,s.image,st.type type,s.grade grade,s.delete_tag,(select count(*) from '.$DB_PREFIX.'scenic_grade where scenic_id  = s.id) comment_count,(select count(*) from '.$DB_PREFIX.'image where scenic_id = s.id) image_count')
					 ->where($condition)
					 ->page("$page,$count")
					 ->order('s.delete_tag asc , s.id desc')
					 ->select();
		// dump($List);

		$count = $this->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}

	/**
	 * [search 搜索景点]
	 * @param  [string] $key    [关键字]
	 * @param  [Integer] $page   [页数]
	 * @param  [Integer] &$count [引用，每页显示数量，引用后为总数]
	 * @return [List] 
	 */
	public function search($key,$page,&$count){
		$DB_PREFIX = $this->tablePrefix;
		$condition['s.name']  = array('like','%'.$key.'%');
		$condition['_string'] = 's.type_id = st.id ';
		$condition['_logic'] = 'and';
		$List = $this->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')
					 ->field('s.id id,s.name name,s.image,st.type type,s.grade grade,s.delete_tag,(select count(*) from '.$DB_PREFIX.'scenic_grade where scenic_id  = s.id) comment_count,(select count(*) from '.$DB_PREFIX.'image where scenic_id = s.id) image_count')
					 ->where($condition)
					 ->page("$page,$count")
					 ->order('s.delete_tag asc , s.id desc')
					 ->select();
		$count = $this->table($DB_PREFIX.'scenic s,'.$DB_PREFIX.'scenic_type st')->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 
			$List[$i]['name'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['name']);//关键字高亮
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}
}