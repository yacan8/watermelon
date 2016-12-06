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
		$zmodel = D('Zan');
		$result = $this->join('left join wt_travel_note_space_belong on wt_travel_note.id = wt_travel_note_space_belong.travel_note_id')
					   ->join('left join wt_travel_note_space on wt_travel_note_space.id = wt_travel_note_space_belong.space_id')
					   ->field('wt_travel_note.id,title,time,user_id,content,image,browse,wt_travel_note_space.city')
					   ->limit(5)
					   ->where($condition)
					   ->select();
		foreach ($result as &$value) {
			preg_match_all('/(?<=src=").+?(?=">)/',$value['content'],$value['pic']);
			$value['content'] = str_sub(preg_replace('/<img.+?>/'," ", $value['content']),200);
			$value['user'] = $lmodel->getById($value['user_id']);
			$value['zan'] = $zmodel->getCountById(2,$value['id']);
		}
		return $result;
	}

	/**
	 * [getInfoByUserId 获取单条信息]
	 *	@param [Array] $condition 查询条件
	 *	@return 单条游记信息
	 */
	public function getInfoById($condition){
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
		return $this->where($condition)->count();
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


	public function getReletive($id){
		$base = $this->where('id='.$id)->find();
		
		$condition_one['user_id'] = $base['user_id'];
		$result_one = $this->where($condition_one)->field('time,id,title,browse,image')->select();
		$id = array();
		foreach ($result_one as $key => $value) {
			$id[$key] = $value['id'];
		}

		$viewdown = $base['browse'] - 20;
		$viewtop = $base['browse'] + 20;
		$condition_two['browse'] = array('between',$viewdown.','.$viewtop);
		$condition_two['id'] = array('not in',$id);
		$result_two = $this->where($condition_two)->field('time,id,title,browse,image')->select();
		$result = array_merge($result_one,$result_two);
		unset($id);
		if(count($result)>5){

			rsort($result);
			array_splice($result,5);
		}else{
			$limit = 5 - count($result);
			foreach ($result as $key => $value) {
				$id[$key] = $value['id'];
			}
			$con['id'] = array('not in',$id);
			$result_three = $this->where($con)->limit($limit)->order('time desc')->field('time,id,title,browse,image')->select();
			$result = array_merge($result,$result_three);
		}
		
		return $result;

	}


	public function addNew($data){
		if ($this->create($data)) {
			$this->add();
		} else {
			return false;
		}
	}


	/**
	 * [getDynamics12 获取动态 类型12 发表了游记]
	 * @param  [Integer] $id [游记ID]
	 * @return [array] 
	 */
 	public function getDynamics12($id){
 		return $this->find($id);
 	}

}