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
		}else if($type=2){//如果为景点页
			$ScenicModel = M('Scenic');
			$ScenicInfo = $ScenicModel->field('city_id,name')->find($id);
			$Data = $CityModel->getById($ScenicInfo['city_id']);
			$Data['scenic'] = $ScenicInfo['name'];
		}
		$this->assign('Data',$Data);
		$this->display('ScenicContent:breadcrumb');
	}


	/**
	 * [score 评分星星]
	 * @param  [float] $score [评分系数]
	 */
	public function score($score){
		$score_int = round($score);//四舍五入
		$xing_num = floor($score_int/2);//星星数
		if($score_int%2==0){//如果为整的星星
			for ($i=0; $i < $xing_num; $i++) { 
				echo '<i class="iconfont icon-xing tc-main"></i>';
			}
			for ($i=0; $i < 5-$xing_num; $i++) { 
				echo '<i class="iconfont icon-xing tc-grayc"></i>';
			}
		}else{//如果存在
			if($xing_num==0){
				echo '<span class="m-l-xs"></span> <span class="over-h half" ><i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i><i class="iconfont icon-1 tc-main" style="position:absolute;"></i></span>';
				echo '<i class="iconfont icon-xing tc-grayc m-l-14"></i>';
				for ($i=0; $i < 3; $i++) { 
					echo '<i class="iconfont icon-xing tc-grayc"></i>';
				}
			}else{
				for ($i=0; $i < $xing_num; $i++) { 
					echo '<i class="iconfont icon-xing tc-main"></i>';
				}
				echo ' <span class="over-h half" ><i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i><i class="iconfont icon-1 tc-main" style="position:absolute;"></i></span>';
				if($xing_num<=3){
					echo '<i class="iconfont icon-xing tc-grayc m-l-14"></i>';
					for ($j=0; $j < 3-$xing_num; $j++) { 
						echo '<i class="iconfont icon-xing tc-grayc"></i>';
					}
				}else{
					for ($i=0; $i < 4-$xing_num; $i++) { 
						echo '<i class="iconfont icon-xing tc-grayc"></i>';
					}
				}
			}
			
		}
		echo '<span class="tc-main m-l-md">'.$score.'</span>';
	}


}