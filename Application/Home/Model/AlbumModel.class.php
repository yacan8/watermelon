<?php
namespace Home\Model;
use Think\Model;
class AlbumModel extends Model{

	/**
	 * [getList] 获取相册列表
	 * @param $condition 条件
 	 */
	public function getList($condition=null){
		$result = $this->where($condition)->select();
		$ImageModel = M('Image');
		for ($i=0; $i < count($result); $i++) { 
			$result[$i]['image'] = $ImageModel->where(array('album_id'=>$result[$i]['id'],'delete_tag'=>(bool)0))->getField('image');
			$result[$i]['img_count'] = $ImageModel->where(array('album_id'=>$result[$i]['id'],'delete_tag'=>(bool)0))->count();
			if($result[$i]['image']=='')
				$result[$i]['image'] = 'default.jpg';
		}
		return $result;
	}

	/**
	 * [getCount] 获取相册总数
	 */
	public function getCount($condition=null){
		$result = $this->where($condition)->count();
		if($result){
			return $result;
		}else{
			return 0;
		}
	}
}