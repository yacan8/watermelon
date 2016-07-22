<?php
// 景点模型
namespace Home\Model;
use Think\Model;
class ScenicTypeModel extends Model{


	/**
	 * [getTypeByCityId 通过城市编号获取景点类型]
	 * @param  integer $city_id [城市ID]
	 * @return [List]
	 */
	public function getTypeByCityId($city_id=0){
		$DB_PREFIX = $this->tablePrefix;
		if($city_id!=0){//如果没有城市ID 那就返回所有有景点的景点类型
			$condition['s.city_id'] = $city_id;
		}
		$condition['_string'] = 's.type_id = st.id';
		$condition['_logic'] = 'and';
		$Model = M('');
		$List = $Model ->table($DB_PREFIX.'scenic_type st,'.$DB_PREFIX.'scenic s')
					   ->field('st.id,st.type')
					   ->where($condition)
					   ->group('s.type_id')
					   ->select();
		return $List;
		//select st.id,st.type from wt_scenic_type st,wt_scenic s where s.type_id = st.id and s.city_id = 10 group by s.type_id
	}
}