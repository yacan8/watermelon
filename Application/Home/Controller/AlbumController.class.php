<?php
namespace Home\Controller;
use Think\Controller;
class AlbumController extends Controller{


	public function load(){
		if(session("?login")){
			$user_id = session('?login');
			$AlbumModel = M('Album');
			$List = $AlbumModel->where(array('user_id'=>'2'))->field('id,name')->order('create_time asc')->select();
			// dump($List);
			// dump($AlbumModel->getLastSql());
			$json['Code'] = '200';
			$json['Message'] = 'ok';
			if(count($List)!=0)
				$json['List'] = $List;
			else
				$json['List'] = 'no';
		}else{
			$json['Code'] = '199';
			$json['Message'] = '你还没有登录';
		}
		echo json_encode($json);
	}
}