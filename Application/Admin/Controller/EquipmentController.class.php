<?php
namespace Admin\Controller;
use Think\Controller;
class EquipmentController extends Controller {


	



	//装备管理view
	public function equipment(){
		$type_id = I('get.type_id',0);
		$brand_id = I('get.brand_id',0);
		$p = I('get.p',1);
		$TypeModel = D('EquipmentType');

		$typeList = $TypeModel->getTypeList($brand_id);
		$type_count = count($typeList);
		if($type_id!=0){//如果选择了装备类型，获取装备类型名称
			for ($i=0; $i < count($typeList); $i++) {
				if($typeList[$i]['id']==$type_id){
					$type = $typeList[$i]['type'];
					$this->assign('type',$type);
				}
			}
		}

		$BrandModel = D('EquipmentBrand');
		$brandList = $BrandModel->getBrandList($type_id,15);
		$brand_count = $BrandModel->count();
		if($brand_id!=0){
			$brand = $BrandModel->where(array('id'=>$brand_id))->getField('brand');
			$this->assign('brand',$brand);
		}
		$brand_all_count = $BrandModel->getCount($type_id);
		$type_all_count = $TypeModel ->getCount($brand_id);
		$EquipmentModel = D('Equipment');
		$all_count = $show_count = 30;
		$equipmentList = $EquipmentModel->getList($type_id,$brand_id,$p,$all_count);

		$Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);

		$this->assign('all_count',$all_count);
		$this->assign('brand_all_count',$brand_all_count);
		$this->assign('type_all_count',$type_all_count);
		$this->assign('equipmentList',$equipmentList);
		$this->assign('brand_count',$brand_count);
		$this->assign('brandList',$brandList);
		$this->assign('type_id',$type_id);
		$this->assign('brand_id',$brand_id);
		$this->assign('typeList',$typeList);
		$this->assign('type_count',$type_count);
		$this->display();

	}

	//装备删除active
	public function delete(){
		$id = I('get.id');
		if($id!=0){
			$EquipmentModel = M('Equipment');
			$data['delete_tag'] = (bool)1;
			$result = $EquipmentModel->where(array('id'=>$id))->save($data);
			if($result !== false){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}else{
			$this->error('参数错误');
		}
	}


	/**
	 * [equipment_img_change 修改装备图片]
	 */
	public function equipment_img_change(){
		$equipment_id = I('post.id');
		$EquipmentModel = M('Equipment');
		$equipment_arr = $EquipmentModel->where(array('id'=>$equipment_id))->field('brand_id,image')->find();
		$upload_result = $this->equipment_image_upload('img',$equipment_arr['brand_id']);
		if($upload_result['result']!==false){
			$data['image'] = $upload_result['message'];
			$result = $EquipmentModel->where(array('id'=>$equipment_id))->save($data);
			if($result!==false){
				$json['Code'] = '200';
				$json['Message'] = U('Image/i',array('w'=>163,'h'=>100,'i'=>urlencode($upload_result['message']).'!feature'),false,false);;
				unlink('./Data/'.$equipment_arr['image']);
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
	 * [equipment_image_upload 装备图片封面]
	 * @param  [string] $name    [上传 input=file的name]
	 * @param  [integer] $city_id [城市归属ID]
	 * @return [array]          [键值result代表上传是否成功,message带面上传成功后的图片路径或失败后的错误信息]
	 */
	private function equipment_image_upload($name,$brand_id){
		$config = array(    
			'maxSize'    =>    3145728,
			'rootPath'=> './Data/',
			'savePath'   =>    'Equipment/', 
			'saveName'   =>    array('uniqid',''),    
			'exts'       =>    array('jpg', 'png', 'jpeg'),    
			'autoSub'    =>    true,
			'subName'    =>    $brand_id,
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


	//品牌view
	public function brand(){
		$BrandMoedl = D('EquipmentBrand');
		$count = $BrandMoedl->count();
		$List = $BrandMoedl->getList();
		$this->assign('count',$count);
		$this->assign('List',$List);
		$this->display();
	}
	//删除在装备品牌
	public function brand_delete(){
		$id = I('get.id');
		$EquipmentBrandModel = M('EquipmentBrand');
		$delete_name = $EquipmentBrandModel->where(array('id'=>$id))->getField('brand');
		if($delete_name!='其他'){
			$model = M('');
			$model->startTrans();
			$other_id = $EquipmentBrandModel->where(array('brand'=>'其他'))->getField('id');
			$data['brand_id'] = $other_id;
			$equipmentResult = M('Equipment')->where(array('brand_id'=>$id))->save($data);
			$brandResult = $EquipmentBrandModel->where(array('id'=>$id))->delete();
			if($equipmentResult!==false&&$brandResult!==false){
				$model->commit();
				$this->success('删除成功');
			}else{
				$model->rollback();
				$this->error('删除失败');
			}
		}else{//如果删除为名为其他的品牌
			$this->error('不能删除该品牌');
		}
	}

	//添加品牌action
	public function addBrand(){
		$brand = trim(I('post.brand'));
		if(abslength($brand)<=30){
			$EquipmentBrandModel = M('EquipmentBrand');
			$data['brand'] =$brand;
			$count = $EquipmentBrandModel->where($data)->count();
			if($count == 0){
				$result = $EquipmentBrandModel->add($data);
				if($result!==false){
					$this->success('添加成功');
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error('该品牌已存在');
			}
		}else{
			$this->error('品牌名不得大于30个字符');
		}
	}

	//装备类型管理view
	public function type(){
		$TypeMoedl = D('EquipmentType');
		$count = $TypeMoedl->count();
		$List = $TypeMoedl->getList();
		$this->assign('count',$count);
		$this->assign('List',$List);
		$this->display();
	}



	//删除在装备类型
	public function type_delete(){
		$id = I('get.id');
		$EquipmentTypeModel = M('EquipmentType');
		$delete_name = $EquipmentTypeModel->where(array('id'=>$id))->getField('type');
		if($delete_name!='其他'){
			$model = M('');
			$model->startTrans();
			$other_id = $EquipmentTypeModel->where(array('type'=>'其他'))->getField('id');
			$data['type_id'] = $other_id;
			$equipmentResult = M('Equipment')->where(array('type_id'=>$id))->save($data);
			$typeResult = $EquipmentTypeModel->where(array('id'=>$id))->delete();
			if($equipmentResult!==false&&$typeResult!==false){
				$model->commit();
				$this->success('删除成功');
			}else{
				$model->rollback();
				$this->error('删除失败');
			}
		}else{//如果删除为名为其他的类型
			$this->error('不能删除该类型');
		}
	}


	//添加装备action
	public function addType(){
		$type = trim(I('post.type'));
		if(abslength($brand)<=10){
			$EquipmentTypeModel = M('EquipmentType');
			$data['type'] =$type;
			$count = $EquipmentTypeModel->where($data)->count();
			if($count == 0){
				$result = $EquipmentTypeModel->add($data);
				if($result!==false){
					$this->success('添加成功');
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error('该品牌已存在');
			}
		}else{
			$this->error('类型名不得大于10个字符');
		}
	}


	//发布装备时品牌加载
	public function brand_load(){
		$key = I('get.word');
		$condition['brand']  = array('like', '%'.$key.'%');
		$List = M('EquipmentBrand')->where($condition)->field('id,brand name')->select();
		// $this->ajaxReturn($List);
		echo json_encode($List);
	}



	//修改或发布装备view
	public function equipmentForm(){
		$equipment_id = I('get.id','');
		$CityModel = D('City');
		$EquipmentTypeModel = D('EquipmentType');
		$typeList = $EquipmentTypeModel->select();
		if($equipment_id!=''){
			$EquipmentModel = D('Equipment');
			$equipment = $EquipmentModel->field('id,name,type_id,brand_id,description,image,price')->relation('brand')->find($equipment_id);
			$this->assign('equipment',$equipment);
		}
		$this->assign('imageUploadUrl',U('Equipment/desciption_img_upload'));
		$this->assign('placeholderText','输入装备介绍');//简介的placeholder内容
		$this->assign('equipment_id',$equipment_id);
		$this->assign('typeList',$typeList);
		$this->display();
	}

	//简介编辑图片上传URL
	public function desciption_img_upload(){
		layout(false);
		C('SHOW_PAGE_TRACE',false);
		$config = array(
				'maxSize' => 3145728,// 设置附件上传大小
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'savePath'=>'Equipment/desciption/',// 设置附件上传目录
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
	public function opEquipment(){
		$id = I('post.equipment_id');
		$data['name'] = trim(I('post.name'));
		$data['description'] = htmlspecialchars_decode(trim(I('post.description')));
		$data['type_id'] = I('post.type');
		$data['brand_id'] = I('post.brand');
		$data['price'] = I('post.price');
		if(abslength($data['name'])>40){
			$this->error('装备名长度不得大于40');
		}else if(abslength($data['description'])>4000){
			$this->error('装备简介长度不得大于4000');
		}else if(!is_double((double)$data['price'])){
			$this->error('请输入正确的价格格式');
		}else if(!is_int((int)$data['type_id'])||!is_int((int)$data['brand_id'])){
			exit('数据错误');
		}else{
			$model = M('');
			$model->startTrans();
			if($data["brand_id"]=='0'){//如果品牌未存在，添加品牌
				$brandData['brand'] = trim(I('post.brand_name'));
				$EquipmentBrandModel= M('EquipmentBrand');
				$brandResult = $EquipmentBrandModel->add($brandData);
				$brand_id = $EquipmentBrandModel->getLastInsID();
				$data['brand_id'] = $brand_id;
			}else{
				$brandResult = 1;
			}
			if($_FILES['fm-img-file']['name']!=null){//判断是否上传了封面
				$bool = true;
				$upload_result = $this->equipment_image_upload('fm-img-file',$data['brand_id']);
				if($upload_result['result']!==false){
					$data['image'] = $upload_result['message'];
					$bool = true;
				}else{
					$bool = false;
					$this->error($upload_result['message']);
				}
			}
			$EquipmentModel = M('Equipment');
			if($id!=''&&$data['image']!=''){
				$equipment_image = $EquipmentModel->where(array('id'=>$id))->getField('image');
				unlink('./Data/'.$equipment_image);
			}
			if($id!=''){
				$result = $EquipmentModel->where(array('id'=>$id))->save($data);
			}else{
				$result = $EquipmentModel->where(array('id'=>$id))->add($data);
			}
			if($result!==false&&$brandResult!==false){
				$model->commit();
				$this->success('操作成功', U('Equipment/equipment',array('city_id'=>$data['city_id'])));
			}else{
				$model->rollback();
				$this->error('操作失败');
			}
		}
	}


	public function imgChange(){
        
        $model = M('Equipment');
        $List = $model->field('id,image,brand_id')->where('id BETWEEN 1 and 200')->select();
        for ($i=0; $i < count($List); $i++) {
            $bool  = check_url($List[$i]['image']);
            if($bool){
                $filename=uniqid().'.jpg';
                $result = getImage($List[$i]['image'],'./Data/Equipment/'.$List[$i]['brand_id'].'/',$filename);
                if($result['file_name']!=''){
                    $data['image'] = 'Equipment/'.$List[$i]['brand_id'].'/'.$result['file_name'];
                    // $re = $model->where('id ='.$List[$i]['id'])->save($data);
                    dump($re);
                }else{
                    dump($result);
                }
            }
        }
    }
}