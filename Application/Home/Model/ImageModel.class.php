<?php

namespace Home\Model;
use Think\Model;
class ImageModel extends Model{


	/**
	 * [getCountByCityId 通过城市ID获取该城市照片数量]
	 * @param  [Integer] $city_id [城市ID]
	 * @param  [Integer] $type [图片类型 1为景点]
	 * @return [Integer]
	 */
	public function getCountByCityId($city_id){
		$DB_PREFIX =$this->tablePrefix;
		$Model = M('');
		$count = $Model ->table($DB_PREFIX.'image')
						->where('delete_tag = 0 and scenic_id in(select id from '.$DB_PREFIX.'scenic where city_id = '.$city_id.')')
						->count();
		return $count;
	}

	/**
	 * [getListByCityId 获取图片列表通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @param  [Integer] $type    [类型]
	 * @param  [Integer] $page    [description]
	 * @param  [Integer] $count   [description]
	 * @return [List]          [description]
	 */
	public function getListByCityId($city_id,$page,$count){
		$DB_PREFIX =$this->tablePrefix;
		$Model = M('');
		$List = $Model  ->table($DB_PREFIX.'image')
						->field('id,other_id,time,user_id')
						->where('delete_tag = 0 and scenic_id in(select id from '.$DB_PREFIX.'scenic where city_id = '.$city_id.')')
						->page("$page,$count")
						->select();
		return $List;
	}
}