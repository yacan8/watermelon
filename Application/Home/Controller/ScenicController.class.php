<?php
namespace Home\Controller;
use Think\Controller;

class ScenicController extends Controller {
    public function index(){
    	$this->display('city_list');
    }


    

    //城市详情页view
    public function city(){
    	$city_id = I('get.id');
    	if($city_id!=''){
            $type_id = I('get.type_id',0);
            $p = I('get.p',1);
            $CityModel = M('City');
            $city_name = $CityModel->where(array('id'=>$city_id))->getField('city');//获取城市名
            $want_count = D('CityWant')->getCountByCityId($city_id);//想去该城市的人数量
            $been_count = D('CityBeen')->getCountByCityId($city_id);//去过该城市的人数量

            $ScenicTypeModel = D('ScenicType');
            $TypeList = $ScenicTypeModel->getTypeByCityId($city_id);
            


            $ScenicModel = D('Scenic');
            $HotScenicList = $ScenicModel->getHotScenicByCityId($city_id,1,3);//获取该城市热门景点推荐
            $One_page_count = $count = 10; //引用参数，每页显示个数，引用后为总个数
            $ScenicList = $ScenicModel->getList($city_id,$type_id,$p,$count);//获取景点列表
            $Page  = new  \Think\Page($count,$One_page_count);
            $show  = $Page->show();// 分页显示输出
            



            $this->assign('TypeList',$TypeList);
            $this->assign('type_id',$type_id);
            $this->assign('page',$show);
            $this->assign('ScenicList',$ScenicList);
            $this->assign('HotScenicList',$HotScenicList);
            $this->assign('want_count',$want_count);
            $this->assign('been_count',$been_count);
            $this->assign('city_name',$city_name);
            $this->assign('city_id',$city_id);
    		$this->display('city_d');
    	}else{
    		$this->error('页面错误');
    	}
    }

    public function foodhotel(){
    	$this->display();
    }
}
