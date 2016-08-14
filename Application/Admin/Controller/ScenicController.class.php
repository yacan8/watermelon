<?php
namespace Admin\Controller;
use Think\Controller;
class ScenicController extends Controller{

	
	public function scenic(){
		$province_id = I('get.province_id','');
		$city_id = I('get.city_id','');
		$CityModel = D('City');
		if($city_id!=''&&$province_id==''){
			$province_id = $CityModel->where(array('id'=>$city_id))->getField('province');
		}
		$ProvinceModel = D('Province');
		$province_count = $ProvinceModel->count();
		$provinceList = $ProvinceModel->getList();//获取省份
		$this->assign('province_count',$province_count);
		$this->assign('provinceList',$provinceList);
		

		
		$cityList = $CityModel->getCityByProinceId($province_id);//城市信息列表
		$city_count = $CityModel->where(array('province'=>$province_id))->count();//城市数量

		$this->assign('city_count',$city_count);
		$this->assign('cityList',$cityList);
		$this->assign('province_id',$province_id);
		$this->assign('city_id',$city_id);
		for ($i=0; $i <count($provinceList); $i++) { //查找省份名
			if($provinceList[$i]['id']==$province_id)
				$province = $provinceList[$i]['province'];
		}
		for ($i=0; $i <count($cityList); $i++) { //查找城市名
			if($cityList[$i]['id']==$city_id)
				$city = $cityList[$i]['city'];
		}
		$all_count = 0; 
		for($i=0;$i<count($cityList);$i++){
			$all_count = $all_count+$cityList[$i]['scenic_count'];
		} 
		$this->assign('all_count',$all_count);
		$this->assign('province',$province);
		$this->assign('city',$city);
		$ScenicModel = D('Scenic');
		$show_count = $scenic_count = 30;
		$p = I('get.p',1);
		$scenicList = $ScenicModel->getScenicByProvinceIdOrCityId($p,$scenic_count,$province_id,$city_id);

		$Page       = new \Think\Page($scenic_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出

		
		$this->assign('page',$show);
		$this->assign('scenicList',$scenicList);
		$this->assign('scenic_count',$scenic_count);
		$this->display('Scenic/scenic');
	}


	/**
	 * [city_img_change 修改景点图片]
	 */
	public function scenic_img_change(){
		$scenic_id = I('post.id');
		$ScenicModel = M('Scenic');
		$scenic_arr = $ScenicModel->where(array('id'=>$scenic_id))->field('city_id,image')->find();
		$upload_result = $this->scenic_image_upload('img',$scenic_arr['city_id']);
		if($upload_result['result']!==false){
			$data['image'] = $upload_result['message'];
			$result = $ScenicModel->where(array('id'=>$scenic_id))->save($data);
			if($result!==false){
				$json['Code'] = '200';
				$json['Message'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($upload_result['message']).'!feature'),false,false);;
				unlink('./Data/'.$scenic_arr['image']);
			}else{
				$json['Code'] = '201';
				$json['Message'] = '修改失败';
			}
		}else{
			$json['Code'] = '199';
			$json['Message'] = $upload_result['message'];
		}
		$this->ajaxReturn($json);
	}
	/**
	 * [scenic_image_upload 景点图片封面]
	 * @param  [string] $name    [上传 input=file的name]
	 * @param  [integer] $city_id [城市归属ID]
	 * @return [array]          [键值result代表上传是否成功,message带面上传成功后的图片路径或失败后的错误信息]
	 */
	private function scenic_image_upload($name,$city_id){
		$config = array(    
			'maxSize'    =>    3145728,
			'rootPath'=> './Data/',
			'savePath'   =>    'Scenic/scenic/', 
			'saveName'   =>    array('uniqid',''),    
			'exts'       =>    array('jpg', 'png', 'jpeg'),    
			'autoSub'    =>    true,
			'subName'    =>    $city_id,
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


	//修改或发布景点view
	public function scenicForm(){
		$scenic_id = I('get.id','');
		$ProvinceModel = D('Province');
		$CityModel = D('City');
		$ScenicTypeModel = D('ScenicType');
		$typeList = $ScenicTypeModel->select();
		if($scenic_id!=''){
			$ScenicModel = D('Scenic');
			$city_id = $ScenicModel->where(array('id'=>$scenic_id))->getField('city_id');
			$province_id = $CityModel->where(array('id'=>$city_id))->getField('province');
			$scenic = $ScenicModel->field('id,type_id,name,desciption,image,address,longitude,latitude')->relation('type')->find($scenic_id);
			$this->assign('scenic',$scenic);
		}else{
			$city_id = I('get.city_id','');
			$province_id = I('get.province_id','');
		}
		if($province_id!=''){
			$cityList = $CityModel->where(array('province'=>$province_id))->field('id,city')->select();
		}
		$provinceList = $ProvinceModel->field('id,province')->select();
		$this->assign('imageUploadUrl',U('Scenic/desciption_img_upload'));
		$this->assign('placeholderText','输入景点介绍');//简介的placeholder内容
		$this->assign('scenic_id',$scenic_id);
		$this->assign('city_id',$city_id);
		$this->assign('province_id',$province_id);
		$this->assign('typeList',$typeList);
		$this->assign('cityList',$cityList);
		$this->assign('provinceList',$provinceList);
		$this->display();
	}

	//简介编辑图片上传URL
	public function desciption_img_upload(){
		layout(false);
		C('SHOW_PAGE_TRACE',false);
		$config = array(
				'maxSize' => 3145728,// 设置附件上传大小
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'savePath'=>'Scenic/desciption/',// 设置附件上传目录
				'rootPath'=> './Data/',
				'autoSub'    =>    true,
				'subName'    =>    array('date','Y-m-d')
			);
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->uploadOne($_FILES['file']);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
			$link['link'] = __ROOT__."/Data/".$info['savepath'].$info['savename'];
			echo stripslashes(json_encode($link));
	    }
	}


	//修改或发布景点action
	public function opScenic(){
		$id = I('post.scenic_id');
		$data['name'] = trim(I('post.name'));
		$data['desciption'] = htmlspecialchars_decode(trim(I('post.desciption')));
		$data['city_id'] = I('post.city');
		$data['type_id'] = I('post.type');
		$data['address'] = I('post.address');
		$lng_lat = I('post.lng_lat');
		$lng_lat_arr = explode(',',$lng_lat);
		
		if(abslength($data['name'])>20){
			$this->error('景点名长度不得大于20');
		}else if(abslength($data['desciption'])>4000){
			$this->error('简介长度不得大于4000');
		}else if(count($lng_lat_arr)!=2||!is_double((double)$lng_lat_arr[0])||!is_double((double)$lng_lat_arr[1])){
			$this->error('请输入正确的经纬度格式');
		}else if(abslength($data['address'])>50){
			$this->error('地址长度不能大于50');
		}else if(!is_int((int)$data['city_id'])||!is_int((int)$data['type_id'])){
			exit('数据错误');
		}else{
			if($_FILES['fm-img-file']['name']!=null){//判断是否上传了封面
				$bool = true;
				$upload_result = $this->scenic_image_upload('fm-img-file',$data['city_id']);
				if($upload_result['result']!==false){
					$data['image'] = $upload_result['message'];
					$bool = true;
				}else{
					$bool = false;
					$this->error($upload_result['message']);
				}
			}
			$data['longitude'] = $lng_lat_arr[0];
			$data['latitude']  = $lng_lat_arr[1];
			$ScenicModel = M('Scenic');
			if($id!=''&&$data['image']!=''){
				$scenic_image = $ScenicModel->where(array('id'=>$id))->getField('image');
				unlink('./Data/'.$scenic_image);
			}
			if($id!=''){
				$result = $ScenicModel->where(array('id'=>$id))->save($data);
			}else{
				$result = $ScenicModel->where(array('id'=>$id))->add($data);
			}
			if($result!==false){
				$this->success('操作成功', U('Scenic/scenic',array('city_id'=>$data['city_id'])));
			}
		}
	}
	/**
	 * [image 图片管理]
	 * @param [Integer] $province_id 省份ID get参数
	 * @param [Integer] $city_id 城市ID get参数
	 * @param [Integer] $scenic_id 景点ID get参数
	 * @param [Integer] $user_id 用户ID get参数
	 */
	public function image(){
		$province_id = I('get.province_id','');
		$city_id = I('get.city_id','');
		$user_id = I('get.user_id',0);
		$scenic_id = I('get.scenic_id',0);
		$CityModel = D('City');
		if($scenic_id!=0){//如果选中了景点
			$scenic_name = M('Scenic')->where(array('id'=>$scenic_id))->getField('name');
			$this->assign('scenic_name',$scenic_name);
			if($city_id==''){
				$city_id = M('Scenic')->where(array('id'=>$scenic_id))->getField('city_id');
				if($province_id==''){
					$province_id = M('City')->where(array('id'=>$city_id))->getField('province');
				}
			}
		}
		if($user_id!=0){//如果选中了用户
			$userinfo = D("Login")->getInfoByid($user_id);
			$this->assign('userinfo',$userinfo);
		}


		$ProvinceModel = D('Province');
		$ImageModel = D('Image');
		$province_count = $ProvinceModel->count();
		$provinceList = $ImageModel->getProvinceCountList($user_id);//获取省份列表
		$this->assign('province_count',$province_count);
		$this->assign('provinceList',$provinceList);
		$all_province_image_count = 0;
		for ($i=0; $i <count($provinceList); $i++) { //查找省份名
			if($provinceList[$i]['id']==$province_id){
				$province = $provinceList[$i]['province'];
				$all_count = $provinceList[$i]['count'];//设置实际要分页的数据总数
			}
			$all_province_image_count = $all_province_image_count + $provinceList[$i]['count'];//省份图片的总数
		}
		if($province_id==''){
			$all_count = $all_province_image_count; //省份图片的总数
		}
		$this->assign('province',$province);//省份名称
		$this->assign('all_province_image_count',$all_province_image_count);
		if($province_id!=''){//如果为选择省份
			$cityList = $ImageModel->getCityCountListByProvinceId($province_id,$user_id);//城市信息列表
			$city_count = $CityModel->where(array('province'=>$province_id))->count();//城市数量
			$this->assign('city_count',$city_count);
			$this->assign('cityList',$cityList);
			$all_city_image_count = 0;
			for ($i=0; $i <count($cityList); $i++) { //查找城市名
				if($cityList[$i]['id']==$city_id){
					$city = $cityList[$i]['city'];
					$all_count = $cityList[$i]['count'];
				}
				$all_city_image_count = $all_city_image_count+$cityList[$i]['count'];
			}
			if($city_id==''){
				$all_count = $all_city_image_count;
			}
			$this->assign('all_city_image_count',$all_city_image_count);
			$this->assign('city',$city);//城市名
		}
		$p = I('get.p',1);
		$count = 30;
		$imageList = $ImageModel->getList($province_id,$city_id,$scenic_id,$user_id,$p,$count);
		
		if($scenic_id!=0){//如果选择景点、总的图片数量直接获取
			$all_count = $ImageModel->getCountByScenicIdAndUserId($scenic_id,$user_id);
		}
		
		$this->assign('imageList',$imageList);
		$this->assign('scenic_id',$scenic_id);
		$this->assign('user_id',$user_id);
		$this->assign('province_id',$province_id);
		$this->assign('city_id',$city_id);
		$this->assign('all_count',$all_count);//分页数量
		

		$Page       = new \Think\Page($all_count,$count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);
		$this->display('image');
	}




	//百度坐标拾取器
	public function getPoint(){
		layout(false);
		$word = I('get.word');
		$city = I('get.city');
		$this->assign('word',$word);
		$this->assign('city',$city);
		$this->display('ScenicContent/getPoint');
	}


}