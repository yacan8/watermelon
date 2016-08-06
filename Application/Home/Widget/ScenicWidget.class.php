<?php
namespace Home\Widget;
use Think\Controller;
class ScenicWidget extends Controller{


	/**
	 * [breadcrumb 路径导航widget]
	 * @param  [Integer] $type [所在页面 1为城市 2为景点]
	 * @param  [Integer] $id   [编号 城市编号或者景点编号]
	 */
	public function breadcrumb($type,$id){
		$CityModel = D('City');

		if($type==1){//如果为城市页
			$Data = $CityModel->getById($id);
		}else if($type==2){//如果为景点页
			$ScenicModel = M('Scenic');
			$ScenicInfo = $ScenicModel->field('city_id,name')->find($id);
			$Data = $CityModel->getById($ScenicInfo['city_id']);
			$Data['scenic'] = $ScenicInfo['name'];
			$Data['scenic_id'] = $id;
		}
		$this->assign('type',$type);
		$this->assign('Data',$Data);
		$this->display('ScenicContent:breadcrumb');
	}


	/**
	 * [score 评分星星]
	 * @param  [float] $score [评分系数]
	 */
	public function score($score,$info=''){
		$score_int = round($score);//四舍五入
		$xing_num = floor($score_int/2);//星星数
		if($score_int%2==0){//如果为整的星星
			for ($i=0; $i < $xing_num; $i++) { 
				echo '<i class="iconfont icon-xing tc-main"></i>';
			}
			for ($i=0; $i < 5-$xing_num; $i++) { 
				echo '<i class="iconfont icon-xing tc-grayc"></i>';
			}
		}else{//如果存在半颗星
			if($xing_num==0){
				echo '<span class="m-l-xs"></span> <span class="over-h half" ><i class="iconfont icon-xing tc-grayc"></i><i class="iconfont icon-1 tc-main"></i></span>';
				for ($i=0; $i < 4; $i++) { 
					echo '<i class="iconfont icon-xing tc-grayc"></i>';
				}
			}else{
				for ($i=0; $i < $xing_num; $i++) { 
					echo '<i class="iconfont icon-xing tc-main"></i>';
				}
				echo ' <span class="over-h half" ><i class="iconfont icon-xing tc-grayc"></i><i class="iconfont icon-1 tc-main"></i></span>';
				for ($i=0; $i < 4-$xing_num; $i++) { 
					echo '<i class="iconfont icon-xing tc-grayc"></i>';
				}
				
			}
			
		}
		if($info=='')
			echo '<span class="tc-main m-l-sm">'.$score.'</span>';
		else
			echo '<span class="tc-gray9 m-l-sm font-12">'.$info.'</span>';
	}
	/**
	 * [cityWant 城市想去widget]
	 * @param  [integer] $city_id [城市Id]
	 */
	public function cityWant($city_id){
		if(session('?login')){
			$user_id = session('login');
			$count = M('CityWant')->where(array('user_id'=>$user_id,'city_id'=>$city_id,'delete_tag'=>(bool)0))->count();
			if($count == 0)
				$bool = false;
			else
				$bool = true;
		}else{
			$bool = false;
		}
		$this->assign('bool',$bool);
		$this->display('Widget:cityWant');
	}


	/**
	 * [cityBeen 城市去过widget]
	 * @param  [integer] $city_id [城市Id]
	 */
	public function cityBeen($city_id){
		if(session('?login')){
			$user_id = session('login');
			$count = M('CityBeen')->where(array('user_id'=>$user_id,'city_id'=>$city_id,'delete_tag'=>(bool)0))->count();
			if($count == 0)
				$bool = false;
			else
				$bool = true;
		}else{
			$bool = false;
		}
		$this->assign('bool',$bool);
		$this->display('Widget:cityBeen');
	}



	/**
	 * [cityZan 景点去过widget]
	 * @param  [integer] $scenic_id [景点Id]
	 */
	public function ScenicZan($scenic_id){
		if(session('?login')){
			$user_id = session('login');
			$count = M('Zan')->where(array('user_id'=>$user_id,'other_id'=>$scenic_id,'type'=>1,'delete_tag'=>(bool)0))->count();
			if($count == 0)
				$bool = false;
			else
				$bool = true;
		}else{
			$bool = false;
		}
		$this->assign('bool',$bool);
		$this->display('Widget:scenicZan');
	}


	/**
	 * [scenicWant 景点想去widget]
	 * @param  [integer] $city_id [景点Id]
	 */
	public function scenicWant($scenic_id){
		if(session('?login')){
			$user_id = session('login');
			$count = M('ScenicWant')->where(array('user_id'=>$user_id,'scenic_id'=>$scenic_id,'delete_tag'=>(bool)0))->count();
			if($count == 0)
				$bool = false;
			else
				$bool = true;
		}else{
			$bool = false;
		}
		$this->assign('bool',$bool);
		$this->display('Widget:scenicWant');
	}


	/**
	 * [scenicBeen 景点去过widget]
	 * @param  [integer] $scenic_id [景点Id]
	 */
	public function scenicBeen($scenic_id){
		if(session('?login')){
			$user_id = session('login');
			$count = M('ScenicBeen')->where(array('user_id'=>$user_id,'scenic_id'=>$scenic_id,'delete_tag'=>(bool)0))->count();
			if($count == 0)
				$bool = false;
			else
				$bool = true;
		}else{
			$bool = false;
		}
		$this->assign('bool',$bool);
		$this->display('Widget:scenicBeen');
	}


	/**
	 * [gradeEdit 评论widet]
	 */
	public function gradeEdit(){

		if(session('?login')){
			$user_id = session('login');
			$info = M('Login')->field('id,icon,nickname')->find($user_id);
			$this->assign('info',$info);
		}
		$this->display('ScenicContent/gradeEdit');
	}
	/**
	 * [HotFood 侧栏热门美食]
	 * @param [Integer] $city_id [城市编号]
	 * @param [Integer] $count [数量]
	 */
	public function HotFood($city_id,$count){
		$ScenicModel = D('Scenic');
		$List = $ScenicModel ->getHotScenicByCityId($city_id,1,$count,'美食');
		$this->assign('HotFoodList',$List);
		$this->display('ScenicContent/hotFood');
	}

}