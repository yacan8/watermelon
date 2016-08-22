<?php
namespace Home\Model;
use Think\Model;
class TravelNoteModel extends Model{

	/**
	 * [getList 获取游记列表]
	 *  @param [Integer] $first 分页参数
	 *	@param [Interger] $list 分页参数
	 */
	public function getList($first,$list){
		$model = M('TravelNote');
		$cmodle = D('City');
		$lmodel = D('Login');
		$condition['user_id'] = session('userid'); 
		// $result = $model->limit($first.','.$list)->where($condition)->select();
		$result = $model->limit($first.','.$list)->select();
		foreach ($variable as &$value) {
			preg_match_all('/(?<=original=").+?(?=")/', $value['content'],$value['pic']);
			$value['content'] = substr(preg_replace('/<img.+?>/', " ", $value['content']),0,1000)."。。。。";
			$city = $cmodle->getById($value['city_id']);
			$value['city'] = $city['city'];
			$value['nickname'] = $lmodel->getNickByUserId($value['user_id']);
		}
		return $result;
	}

	/**
	 * [getInfoByUserId 获取单条信息]
	 *	@param [Integer] $userid 用户编号
	 *	@return 单条游记信息
	 */
	public function getInfoByUserId($userid){
		$condition['user_id'] = $userid; 
		$result = $this->where($condition)->find();
		preg_match_all('/(?<=original=").+?(?=")/', $result['content'],$result['pic']);
		$result['content'] = preg_replace('/<img.+?>/', " ", $result['content']);
		// $city = $cmodle->getById($result['city_id']);
		// $result['city'] = $city['city'];
		$lmodel = D('Login');
		$result['nickname'] = $lmodel->getNickByUserId($result['user_id']);
		return $result;
	}

	/**
	 * [getCount 获取记录总条数]
	 * @return 记录总条数
	 */
	public function getCount(){
		$condition['user_id'] =	session('userid'); 
		return $this->count();
	}



	/**
	 * [search 搜索]
	 * @param  [String]  $key         [关键字]
	 * @param  boolean $is_subQuery [是否为子查询]
	 * @param  max $page [页数，如果为空，只返回全部]
	 * @param  max $count [每页显示页数]
	 * @return max 如果is_subQuery为true，则为自查询，返回查询SQL，如果为false，则返回搜索到的列表List
	 */
	public function search($key,$is_subQuery=true,$page='',&$count=''){
		$firstrow = ($page-1)*$count;
		$DB_FREFIX = $this->tablePrefix;
		if($page!='')
			$limit_str = "$firstrow,$count";
		else
			$limit_str = '';
		if($is_subQuery){
			$result = $this ->table($DB_FREFIX.'travel_note w')
						->field('id,title,content,time,user_id,null image,(select nickname from '.$DB_FREFIX.'login where id = w.user_id) nickname,2 type')
						->where(array('w.title'=>array('like','%'.$key.'%')))
						->limit($limit_str)
						->select(false);
		}else{
			$result = $this ->table($DB_FREFIX.'travel_note w')
						->field('id,title,content,time,user_id,null image,(select nickname from '.$DB_FREFIX.'login where id = w.user_id) nickname,2 type')
						->where(array('w.title'=>array('like','%'.$key.'%')))
						->limit($limit_str)
						->select();
		}
		
		
		$count = $this ->table($DB_FREFIX.'travel_note w')->where(array('w.title'=>array('like','%'.$key.'%')))->count();
		return $result;
	}
}