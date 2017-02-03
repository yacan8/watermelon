<?php
namespace Home\Model;
use Think\Model\RelationModel;
/**
* 
*/
class TravelNoteSpaceBelongModel extends RelationModel{


	//关联属性
	protected $_link = array(
	    'space'  =>  array(
	    	'mapping_type' =>self::HAS_MANY,
	        'class_name' => 'TravelNoteSpace',
	        'foreign_key'=>'space_id'
	    )
	);

	public function getSpaceByTravelNoteId($travel_note_id){
		return $this->relation(true)->where(array('travel_note_id'=>$travel_note_id))->find();
		
	}


}