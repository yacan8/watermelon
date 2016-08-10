<?php
namespace Admin\Model;
use Think\Model;
class ProvinceModel extends Model{


	public function getList(){
		$DB_FREFIX = C('DB_PREFIX');
		$List = $this->table($DB_FREFIX.'province p')->field('id,province,(select count(*) from '.$DB_FREFIX.'city where province = p.id) count')->order('convert(province using gbk) ASC')->select();
		return $List;
	}
	
}