<?php
// 景点模型
namespace Home\Model;
use Think\Model\RelationModel;
class ScenicModel extends RelationModel{


	/**
	 * [getHotScenicByCityId 根据城市编号获取做多人想去的景点]
	 * @param  [Integer] $city_id [城市编号]
	 * @param  [Integer] $page    [页数]
	 * @param  [Integer] $count   [每页个数]
	 * @return [List]
	 */
	public function getHotScenicByCityId($city_id,$page,$count){
		$DB_PREFIX = C('DB_PREFIX');//数据库表前缀
		$Model = M('');
		$firstRow = ($page-1)*$count;
		$List = $Model->table($DB_PREFIX.'scenic s')
					   ->field('s.id,s.image,s.name,s.grade,(select count(*) from '.$DB_PREFIX.'scenic_want where scenic_id = s.id) want_count')
					   ->order('want_count desc,grade desc')
					   ->where(array('s.city_id'=>$city_id))
					   ->limit("$firstRow,$count")
					   ->select();
		return $List;
	}
}

