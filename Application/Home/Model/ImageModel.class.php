<?php

namespace Home\Model;
use Think\Model;
class ImageModel extends Model{


	/**
	 * [getCountByCityId 通过城市ID获取该城市照片数量]
	 * @param  [Integer] $city_id [城市ID]
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
	 * [getCountByScenicId 通过景点ID获取该城市照片数量]
	 * @param  [Integer] $scenic_id [景点ID]
	 * @return [Integer]
	 */
	public function getCountByScenicId($scenic_id){
		$count = $this ->where(array('delete_tag'=>(bool)0,'scenic_id'=>$scenic_id))->count();
		return $count;
	}


	/**
	 * [getListByCityId 获取图片列表通过城市编号]
	 * @param  [Integer] $city_id [城市编号]
	 * @param  [Integer] $page    [description]
	 * @param  [Integer] $count   [description]
	 * @return [List]          [description]
	 */
	public function getListByCityId($city_id,$page,$count){
		$DB_PREFIX =$this->tablePrefix;
		$Model = M('');
		$List = $Model  ->table($DB_PREFIX.'image')
						->field('id,scenic_id,time,user_id,image')
						->where('delete_tag = 0 and scenic_id in(select id from '.$DB_PREFIX.'scenic where city_id = '.$city_id.')')
						->page("$page,$count")
						->order('time desc')
						->select();
		return $List;
	}
}