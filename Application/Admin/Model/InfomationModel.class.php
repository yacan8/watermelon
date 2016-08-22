<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class InfomationModel extends RelationModel{
	protected $_auto = array(
	    array('content', 'htmlspecialchars_decode', self::MODEL_BOTH, 'function'),
	);
	/**
	 * [$_link 关联属性]
	 * @var array
	 */
	protected $_link = array(

	    'user'  =>  array(
	    	'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'Login',
	        'foreign_key'=>'contributor',
	        'mapping_fields'=>'id,nickname'
	    ),

	);
	/**
	 * [getList 获取列表]
	 * @param  [bool] $upline   [是否为头条]
	 * @param [Integer] $page [传入的页数]
	 * @return [list]           [查询到的列表]
	 */
	public function getList($upline,$page,$contributor=0,&$count){
		if($contributor!=0){
			$data['contributor'] = $contributor;
		}
		if($upline){
			$data['state'] = '1';
			$List = $this->where($data)->field('id,title,browse,comment_count,image,image_thumb,publish_time,contributor,state')->order('publish_time desc')->relation(true)->select();
		}else if(!$upline){
			$page = ($page-1)*10;
			$List = $this->where($data)->limit("$page,10")->field('id,title,browse,comment_count,image,image_thumb,publish_time,contributor,state')->order('publish_time desc')->relation(true)->select();
			$count = $this->where($data)->count();
		}
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
	 * [search 搜索资讯]
	 * @param  [string] $key    [关键字]
	 * @param  [Integer] $page   [页数]
	 * @param  [Integer] &$count [引用，每页显示数量，引用后为总数]
	 * @return [List] 
	 */
	public function search($key,$page,&$count){
		$condition['title']  = array('like','%'.$key.'%');
		$page = ($page-1)*10;
		$List = $this->where($condition)->page("$page,$count")->field('id,title,browse,comment_count,image,image_thumb,publish_time,contributor,state')->order('publish_time desc')->relation(true)->select();
		$count = $this->where($condition)->count();
		
		for ($i=0; $i < count($List); $i++) { 
			$List[$i]['title'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['title']);//关键字高亮
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
	 * [upload 图片上传 设置图片名字]
	 */
	public function upload(){
		$config = array(
				'maxSize' => 3145728,// 设置附件上传大小
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'savePath'=>'infomation/',// 设置附件上传目录
				'subName' => null,
				'rootPath'=> './Data/'
			);
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->uploadOne($_FILES['file']);
		if(!$info){
			return '上传错误';
		}else{
			$Savename = $info['savename'];
			$thumbname = "thumb_".$Savename;
			$Image = new \Think\Image(\Think\Image::IMAGE_GD);
			$Image->open('./Data/'.$info['savepath'].$info['savename']);
			$Image->thumb(600,600)->save('./Data/'.$info['savepath'].$info['savename']);
			$Image->thumb(300,300)->save('./Data/'.$info['savepath'].$thumbname);
			$data['image'] = $info['savepath'].$info['savename'];
			$data['image_thumb'] = $info['savepath'].$thumbname;
			return $data;
		}

	}


	



}