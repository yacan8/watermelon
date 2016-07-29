<?php
namespace Home\Model;
use Think\Model;
class TravelNoteModel extends Model{

	public function getList($first,$list){

	}

	public function test(){
		$model = M('TravelNote');
		$result = $model->limit(1)->select();
		// dump($result);
		
		dump($s);
	}
}