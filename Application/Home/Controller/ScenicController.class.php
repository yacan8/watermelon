<?php
namespace Home\Controller;
use Think\Controller;

class ScenicController extends Controller {
    //城市首页
    public function index(){
        $province = I('get.province',0);
        $CityModel = D('City');
        $CityList = $CityModel->getList(1,8);
        $ProvinceModel = D('Province');
        if($province!=0)
            $condition['id'] = $province;
        $ProvinceList = $ProvinceModel->where($condition)->relation('city')->select();
        $this->assign('ProvinceList',$ProvinceList);
        $this->assign('CityList',$CityList);
    	$this->display('city_list');
    }


    

    //城市详情页view
    public function city(){
    	$city_id = I('get.id');
    	if($city_id!=''){
            $type_id = I('get.type_id',0);
            $p = I('get.p',1);
            $CityModel = D('City');
            $city_info = $CityModel->getCityAndProvice($city_id);//获取城市名
            if($city_info['province']=='台湾省'){//老版百度地图的台湾地图无法定位
                $lnglatstr = '121.044242,23.782898';
                $this->assign('lnglatstr',$lnglatstr);
            }
            $want_count = D('CityWant')->getCountByCityId($city_id);//想去该城市的人数量
            $been_count = D('CityBeen')->getCountByCityId($city_id);//去过该城市的人数量

            $ScenicTypeModel = D('ScenicType');
            $TypeList = $ScenicTypeModel->getTypeByCityId($city_id);//获取景点类型
            


            $ScenicModel = D('Scenic');
            $HotScenicList = $ScenicModel->getHotScenicByCityId($city_id,1,3);//获取该城市热门景点推荐
            $One_page_count = $count = 10; //引用参数，每页显示个数，引用后为总个数
            $ScenicList = $ScenicModel->getList($city_id,$type_id,$p,$count);//获取景点列表
            $Page  = new  \Think\Page($count,$One_page_count);
            $show  = $Page->show();// 分页显示输出
            
            $ImageModel = D('Image');
            $imgCount = $ImageModel->getCountByCityId($city_id);//图片数量
            $imgList = $ImageModel->getListByCityId($city_id,1,5);//图片列表


            for ($i=0; $i < count($TypeList); $i++) { 
                if($TypeList[$i]['type']=='美食')
                    $food_id = $TypeList[$i]['id'];
            }

            
            $this->assign('food_id',$food_id);
            $this->assign('lnglatstr',$lnglatstr);
            $this->assign('imgList',$imgList);
            $this->assign('imgCount',$imgCount);
            $this->assign('TypeList',$TypeList);
            $this->assign('type_id',$type_id);
            $this->assign('page',$show);
            $this->assign('ScenicList',$ScenicList);
            $this->assign('HotScenicList',$HotScenicList);
            $this->assign('want_count',$want_count);
            $this->assign('been_count',$been_count);
            $this->assign('city_info',$city_info);
            $this->assign('city_id',$city_id);
    		$this->display('city_d');
    	}else{
    		$this->error('页面错误');
    	}
    }
    //景点详情view
    public function scenic(){
        $scenic_id = I('get.id');
        if($scenic_id!=''){
            $p = I('get.p',1);
            $recommend_level = I('get.r',0);//评论星级
            $ScenicModel = D('Scenic');
            $city_id = $ScenicModel->where(array('id'=>$scenic_id))->getField('city_id');
            $want_count = D('ScenicWant')->getCountByScenicId($scenic_id);//想去该景点的人数量
            $been_count = D('ScenicBeen')->getCountByScenicId($scenic_id);//去过该景点的人数量
            $img_count = D('Image')->getCountByScenicId($scenic_id);//该景点图片数量
            $ScenicInfo = $ScenicModel->getById($scenic_id);//获取景点信息
            $NearestScenicList = $ScenicModel->getNearestScenic($scenic_id);//距离最近的景点
            $food_id = M('ScenicType')->where('type = "美食"')->getField('id');//侧栏美食的ID

            $ScenicGradeModel = D('ScenicGrade');
            $GradeList = $ScenicGradeModel->getList($scenic_id,0,$recommend_level,$p,10);//列表评论
            $comment_count = $ScenicGradeModel->getCount($scenic_id);//总的评论数量

            $count = $ScenicGradeModel->getCount($scenic_id,0,$recommend_level);//评论数量
            $Page  = new  \Think\Page($count,10);
            $show  = $Page->show();// 分页显示输出

            $this->assign('city_id',$city_id);
            $this->assign('food_id',$food_id);
            $this->assign('page',$show);
            $this->assign('comment_count',$comment_count);
            $this->assign('recommend_level',$recommend_level);
            $this->assign('GradeList',$GradeList);
            $this->assign('NearestScenicList',$NearestScenicList);
            $this->assign('img_count',$img_count);
            $this->assign('want_count',$want_count);
            $this->assign('been_count',$been_count);
            $this->assign('ScenicInfo',$ScenicInfo);
            $this->assign('scenic_id',$scenic_id);
            $this->display();
        }else $this->error('页面错误');
    }



    public function photo(){
        $type = I('get.type',1);//1为城市、2为景点
        $id = I('get.id');
        $p = I('get.p',1);
        $count = 20;//每页显示照片个数
        if(($id != '')&&($type!=1||$type!=2)){
            $ImageModel = D('Image');
            if($type==1){
                $name = M('City')->where(array('id'=>$id))->getField('city');//城市名
                $img_count = $ImageModel->getCountByCityId($id);
                $imgList = $ImageModel->getListByCityId($id,$p,30,true);
            }else{
                $name = M('Scenic')->where(array('id'=>$id))->getField('name');//景点名
                $img_count = $ImageModel->getCountByScenicId($id);
                $imgList = $ImageModel->getListByScenicId($id,$p,30,true);
            }
            
            $Page  = new  \Think\Page($img_count,$count);
            $show  = $Page->show();// 分页显示输出
            if($type == 2){
                $city_id = M('Scenic')->where(array('id'=>$id))->getField('city_id');
                $this->assign('scenic_id',$id);
                $this->assign('city_id',$city_id);
            }else{
                $this->assign('scenic_id',0);
                $this->assign('city_id',$id);
            }

            
            
            $this->assign('page',$show);
            $this->assign('name',$name);
            $this->assign('type',$type);
            $this->assign('id',$id);
            $this->assign('img_count',$img_count);
            $this->assign('imgList',$imgList);
            $this->display('photo');
        }else{
            exit('参数错误');
        }

    }
}

