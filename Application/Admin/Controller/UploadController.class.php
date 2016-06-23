<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends Controller{

	public function upload() {
		C('SHOW_PAGE_TRACE',false);
		$config = array(
				'maxSize' => 8145728,// 设置附件上传大小
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'savePath'=>'Upload/infomation/',// 设置附件上传目录
				'rootPath'=> './Data/'
			);
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->uploadOne($_FILES['file']);
		// dump($info['file']);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
			$link['link'] = "http://".$_SERVER['HTTP_HOST'].__ROOT__."/Data/".$info['savepath'].$info['savename'];
			echo stripslashes(json_encode($link));
	    }
 	}
 	 
}