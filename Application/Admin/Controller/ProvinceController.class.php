<?php
namespace Admin\Controller;
use Think\Controller;
class ProvinceController extends Controller{

	//省份 城市管理view
	public function province(){
		$ProvinceModel = D('Province');
		$count = $ProvinceModel->count();
		$List = $ProvinceModel->getList();//获取省份
		$this->assign('count',$count);
		$this->assign('List',$List);
		$id = I('get.id','');
		if($id!=''){
			$CityModel = D('City');
			$cityList = $CityModel->getInfoByProvinceId($id);
			$city_count = $CityModel->where(array('province'=>$id))->count();
			$this->assign('city_count',$city_count);
			$this->assign('cityList',$cityList);
			$this->assign('province_id',$id);
			for ($i=0; $i <count($List); $i++) { 
				if($List[$i]['id']==$id)
					$province = $List[$i]['province'];
			}
			$this->assign('province',$province);
		}
		$this->display('Scenic/province');
	}
	/**
	 * [add 添加省份操作]
	 */
	public function add(){
			
		$province = trim(I('post.province'));
		if($province!=''){
			$ProvinceModel = M('Province');
			$data['province'] = $province;
			$result = $ProvinceModel->add($data);
			if($result!==false)
				$this->success('添加成功');
			else
				$this->error('添加失败');
		}else exit('参数错误');
			
		
	}


	public function cityAdd(){	
		$city = trim(I('post.city'));
		$province = I('post.province');
		if($city!=''&&$province!=''){
			$data['city'] = $city;
			$data['province'] = $province;
			$CityModel = M('City');
			$count = $CityModel->where($data)->count();
			if($count!=0){
				$city_id = $CityModel->getLastInsID();
				if($_FILES['city_img']['name']!=null){
					$upload_result = $this->city_image_upload('city_img',$province);
					if($upload_result['result']!==false){
						$data['image'] = $upload_result['message'];
					}
				}
				$result = $CityModel->add($data);
				if($result!==false)
					$this->success('添加成功');
				else
					$this->error('添加失败');
			}else{
				$this->error('已存在'.$city.'城市');
			}
		}else exit('参数错误');
			
		
	}
	/**
	 * [city_img_change 修改城市图片]
	 */
	public function city_img_change(){
		$city_id = I('post.id');
		$CityModel = M('City');
		$city_arr = $CityModel->where(array('id'=>$city_id))->field('province,image')->find();
		$upload_result = $this->city_image_upload('img',$city_arr['province']);
		if($upload_result['result']!==false){
			$data['image'] = $upload_result['message'];
			$result = $CityModel->where(array('id'=>$city_id))->save($data);
			if($result!==false){
				$json['Code'] = '200';
				$json['Message'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($upload_result['message']).'!feature'),false,false);;
				unlink('./Data/'.$city_arr['image']);
			}else{
				$json['Code'] = '201';
				$json['Message'] = '修改失败';
			}
		}else{
			$json['Code'] = '199';
			$json['Message'] = $upload_result['message'];
		}
		echo json_encode($json);
	}

	private function city_image_upload($name,$province_id){
		$config = array(    
			'maxSize'    =>    3145728,
			'rootPath'=> './Data/',
			'savePath'   =>    'Scenic/city/', 
			'saveName'   =>    array('uniqid',''),    
			'exts'       =>    array('jpg', 'png', 'jpeg'),    
			'autoSub'    =>    true,
			'subName'    =>    $province_id,
		);

		$upload = new \Think\Upload($config);// 实例化上传类       
		$info = $upload->uploadOne($_FILES[$name]);    
		if(!$info) {// 上传错误提示错误信息
			$result['result'] = false;
			$result['message'] = $upload->getError();
		}else{// 上传成功 获取上传文件信息
			$result['result'] = true;
			$result['message'] =  $info['savepath'].$info['savename'];
		}
		return $result;
	}
}