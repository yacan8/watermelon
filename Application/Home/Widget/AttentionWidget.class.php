<?php
namespace Home\Widget;
use Think\Controller;
class AttentionWidget extends Controller{
    public function follow($follow_id){
    	if(session('?login')){
    		$user_id = session('login');
    		$FollowModel = D('Attention');
    		$list = $FollowModel->checkFollow($user_id,$follow_id);
            if(count($list)==0||$list[0]['delete_tag']=='1')
                $bool = false;
            else
                $bool = true;
    	}else{
    		$bool = false;
    	}
        $this->assign('follow_id',$follow_id);
        $this->assign('bool',$bool);
        $this->display('Widget:follow');
    }
}