<?php
namespace Home\Model;
use Think\Model;
class TravelNoteModel extends Model{

	/**
	 * [getList 获取游记列表]
	 *  @param [Integer] $first 分页参数
	 *	@param [Interger] $list 分页参数
	 */
	public function getList($first,$list,$condition){
		$lmodel = D('Login');
		$result = $this->limit($first.','.$list)->where($condition)->select();
		foreach ($result as &$value) {
			preg_match_all('/(?<=src=").+"/',$value['content'],$value['pic']);
			$value['content'] = str_sub(preg_replace('/<img.+?>/'," ", $value['content']),200);
			$value['user'] = $lmodel->getById($value['user_id']);
		}
		return $result;
	}

	/**
	 * [getInfoByUserId 获取单条信息]
	 *	@param [Array] $condition 查询条件
	 *	@return 单条游记信息
	 */
	public function getInfoByUserId($condition){
		$result = $this->where($condition)->find();
		$lmodel = D('Login');
		$result['user'] = $lmodel->getById($result['user_id']);
		return $result;
	}

	/**
	 * [getCount 获取记录总条数]
	 * @return 记录总条数
	 */
	public function getCount($condition){
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