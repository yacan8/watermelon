<?php
namespace Home\Model;
use Think\Model\RelationModel;
class InfomationModel extends RelationModel{
	protected $_link = array(
		'user'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'contributor',
	        'mapping_fields'=>'id,icon,nickname'
	    ),
	    // 'comment'  =>  array(
	    // 	'mapping_limit'=>'0,4',
	    // 	'mapping_type' =>self::HAS_MANY,
	    //     'class_name' => 'Message',
	    //     'foreign_key'=>'other_id',
	    //     'mapping_order'=>'time desc'
	    // ),
	);


	/**
	 * [Headlines 获取头条资讯]
	 * @return [List] [头条列表]
	 */
	public function Headlines(){
		$List = $this->field('id,image,title')->order('publish_time desc')->where('state = 1')->select();
		for ($i=0; $i < count($List); $i++) { 
			if($List[$i]['image_thumb']== '')
				$List[$i]['image'] = $List[$i]['image_thumb']= C('__DATA__').'/infomation/default.jpg';
			else{
				$List[$i]['image'] = C('__DATA__')."/".$List[$i]['image'];
				$List[$i]['image_thumb'] = C('__DATA__')."/".$List[$i]['image_thumb'];
			}
		}
		return $List;
	}
	/**
	 * [lack 返回头条资讯的个数 最大为3]
	 * @return [Integer] [查询个数]
	 */
	public function lack(){
		$count = $this->where('state = 1')->count();
		if($count>3)
			return 3;
		else 
			return $count;
	}
	/**
	 * [getList 获取资讯列表]
	 * @param  [Integer] $page  [页数]
	 * @param  [Integer] $count [获取列表个数]
	 * @return [List] [头条列表]
	 */
	public function getList($page,$count){
		$firstrow = ($page-1)*$count;
		//当头条不足3个时 将开始查询的第一个数据往后退
		$lack = $this->lack();
		if($page==1)
			$count = $count + 3 - $lack;
		else
			$firstrow = $firstrow + 3 - $lack;
		$List = $this->relation('user')->where('state=0')->order('publish_time desc')->field('id,image,title,browse,comment_count,contributor,publish_time,image_thumb')->limit($firstrow.",".$count)->select();
		$Date = new \Org\Util\Date();/*发布时间人性化转换*/
		for ($i=0; $i < count($List); $i++) { 
			$List[$i]['publish_time'] = $Date ->timeDiff($List[$i]['publish_time']); 
			$List[$i]['url'] = U('Infomation/detail',array('id'=>$List[$i]['id']));
			if($List[$i]['image_thumb']== '')
				$List[$i]['image'] = $List[$i]['image_thumb']= C('__DATA__').'/infomation/default.jpg';
			else{
				$List[$i]['image'] = C('__DATA__')."/".$List[$i]['image'];
				$List[$i]['image_thumb'] = C('__DATA__')."/".$List[$i]['image_thumb'];
			}
		}
		return $List;
	}


	/**
	 * [getById 根据ID查询资讯]
	 * @param  [Integer] $id [ID编号]
	 * @return [array]     [查询到的数组]
	 */
	public function getById($id){
		$List = $this->relation('user')->find($id);
		if($List['image_thumb']== '')
			$List['image'] = $List['image_thumb']= C('__DATA__').'/infomation/default.jpg';
		else{
			$List['image'] = C('__DATA__')."/".$List['image'];
			$List['image_thumb'] = C('__DATA__')."/".$List['image_thumb'];
		}
		return $List;
	}

	/**
	 * [getHot 获取热门资讯]
	 * @param  [Integer] $count [获取个数]
	 * @return [List]        [获取的列表]
	 */
	public function getHot($count){
		$condition['time'] = date("Y-m-d H:i:s",strtotime("-2 month"));
		$List =  $this ->where($condition)->field('id,image_thumb,title')-> limit("0,$count")->order('browse desc')->select();
		return $List;
	}
}