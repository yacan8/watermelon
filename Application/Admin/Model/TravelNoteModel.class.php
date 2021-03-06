<?php
namespace Admin\Model;
use Think\Model;
class TravelNoteModel extends Model{


	/**
	 * [getList 获取列表]
	 * @param  [integer]  $page    [页数]
	 * @param  [integer]  $count   [每页显示个数 引用后变成总共的个数，分页显示用]
	 * @param  integer $user_id [用户ID]
	 * @return [List]           [用户ID]
	 */
	public function getList($page,&$count,$user_id = 0){
		$DB_FREFIX = $this->tablePrefix;
		if($user_id!=0){
			$condition['user_id'] = $user_id;
		}
		$List = $this->table($DB_FREFIX.'travel_note tn')
					 ->field('id,title,content,time,browse,user_id,(select nickname from '.$DB_FREFIX.'login l where l.id = tn.user_id) nickname,(select count(*) from '.$DB_FREFIX.'zan where type=2 and other_id = tn.id) zan,(select count(*) from '.$DB_FREFIX.'comment where type=3 and other_id = tn.id) comment')
					 ->where($condition)
					 ->page("$page,$count")
					 ->select();
		$count = $this ->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 
			preg_match_all('/<img.*?src="(.*?)".*?>/',$List[$i]['content'],$result);
			$List[$i]['pic'] = $result[1];
			unset($List[$i]['content']);
		}
		return $List;
	}

	/**
	 * [search 搜索游记]
	 * @param  [string] $key    [关键字]
	 * @param  [Integer] $page   [页数]
	 * @param  [Integer] &$count [引用，每页显示数量，引用后为总数]
	 * @return [List] 
	 */
	public function search($key,$page,&$count){
		$DB_FREFIX = $this->tablePrefix;
		$condition['tn.title']  = array('like','%'.$key.'%');
		$List = $this->table($DB_FREFIX.'travel_note tn')
					 ->field('id,title,content,time,browse,user_id,(select nickname from '.$DB_FREFIX.'login l where l.id = tn.user_id) nickname,(select count(*) from '.$DB_FREFIX.'zan where type=2 and other_id = tn.id) zan,(select count(*) from '.$DB_FREFIX.'comment where type=3 and other_id = tn.id) comment')
					 ->where($condition)
					 ->page("$page,$count")
					 ->select();
		$count = $this->table($DB_FREFIX.'travel_note tn')->where($condition)->count();
		for ($i=0; $i < count($List); $i++) { 			
			$List[$i]['title'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['title']);//关键字高亮
			preg_match_all('/<img.*?src="(.*?)".*?>/',$List[$i]['content'],$result);
			$List[$i]['pic'] = $result[1];
			unset($List[$i]['content']);
		}
		return $List;
	}
}
	
