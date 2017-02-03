<?php
namespace Home\Widget;
use Think\Controller;
class TravelNoteWidget extends Controller{
	/**
	 * [Hot 浏览最多]
	 * @param [Integer] $city_id [城市编号]
	 * @param [Integer] $count   [数目]
	 */
	public function Hot($city_id,$count){
		$TravelNoteModel = D('TravelNote');
		$List = $TravelNoteModel->getHotByCityId($city_id,$count);
		$this->assign('TravelNoteList',$List);
		$this->display('TravelNoteContent/Hot');
	}

	public function relevant($id){
		$model = D('TravelNote');
        $result = $model->getReletive($id);
        $this->assign('travelnote',$result);
       	$this->display('TravelNoteContent/relevantTravelNote');
	}

}