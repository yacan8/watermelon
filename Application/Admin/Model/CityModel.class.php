<?php
namespace Admin\Model;
use Think\Model;
class CityModel extends Model{
	/**
	 * [getInfoByProvinceId 获取城市信息通过省份ID]
	 * @param  [Integer] $province_id [城市ID]
	 * @return [List]
	 */
	public function getInfoByProvinceId($province_id){
		$DB_FREFIX = $this->tablePrefix;
		$condition['province'] = $province_id;
		$List = $this->table($DB_FREFIX.'city c')
					 ->field('c.id,c.city,c.image,(select count(*) from '.$DB_FREFIX.'scenic where city_id  = c.id) scenic_count,(select count(*) from wt_image where scenic_id in(select id from '.$DB_FREFIX.'scenic where city_id =c.id)) image_count')
					 ->where($condition)
					 ->select();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image']!=''){
				$List[$i]['image'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($List[$i]['image']).'!feature'),false,false);
			}
		}
		return $List;
	}

	/**
	 * [getCityByProinceId 获取城市名和景点数量通过省份ID]
	 * @param  [Integer] $province_id [城市ID]
	 * @return [List]
	 */
	public function getCityByProinceId($province_id){
		$DB_FREFIX = $this->tablePrefix;
		$condition['province'] = $province_id;
		$List = $this->table($DB_FREFIX.'city c')
					 ->field('c.id,c.city,(select count(*) from '.$DB_FREFIX.'scenic where city_id  = c.id) scenic_count')
					 ->where($condition)
					 ->select();
		return $List;
	}

}
