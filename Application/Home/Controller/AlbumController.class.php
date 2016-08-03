<?php
namespace Home\Controller;
use Think\Controller;
class AlbumController extends Controller{


	public function load(){
		if(session("?login")){
			$user_id = session('login');
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


	public function add(){
		if(session("?login")){
			$name = I('post.name','');
			$user_id = session('login');
			if(abslength($name)<=15||$name==''){
				$AlbumModel = M('Album');
				$count = $AlbumModel->where(array('name'=>$name))->count();
				if($count==0){
					$data['name'] = $name;
					$data['create_time'] = date('Y-m-d H:i:s',time());
					$data['user_id'] = $user_id;
					$data['browse'] = 0;
					
					$result = $AlbumModel->add($data);
					if($result!==false){
						$json['Code'] = '200';
						$json['Message'] = $AlbumModel->getLastInsID();
					}else{
						$json['Code'] = '201';
						$json['Message'] = '新建失败';
					}
				}else{
					$json['Code'] = '202';
					$json['Message'] = '相册名已存在';
				}
				
			}else{
				$json['Code'] = '203';
				$json['Message'] = '相册名长度非法';
			}
			
		}else{
			$json['Code'] = '199';
			$json['Message'] = '你还没有登录';
		}
		echo json_encode($json);

	}
}