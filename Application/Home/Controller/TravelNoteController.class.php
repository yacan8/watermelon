<?php
namespace Home\Controller;
use Think\Controller;

class TravelNoteController extends Controller {
    public function index(){
        $model = D('TravelNote');
        $space_id = I('get.citynow',0);
        $p = I('get.p',1);
        $count = 0;
        $Page = new \Think\Page($model->getCount(0,$space_id),6);
        $result = $model->getList($p,6,0,$space_id,$count);
        
        $tsmodel = M('TravelNoteSpace');
        $this->assign('city',$tsmodel->select());

        $this->assign('travelnote',$result);
        $this->assign('page',$Page->show());
    	$this->display('index');
    }



    public function detail(){
    	$id = I('get.id');
        $model = D('TravelNote');
        $condition['id'] = $id;
        $travelnote = $model->getInfoById($condition);
        $model->where(array('id'=>$id)) ->setInc('browse',1);
    	$CommentModel = D('Comment');
		$CommentList = $CommentModel->getCommentByOtherId($id,3,1,4);
		$this->assign('id',$id);
        $this->assign('travelnote',$travelnote);
		$this->assign('CommentList',$CommentList);
		$this->display();
    }

    public function publish(){
        $this->display('publish');
    }

    public function Dopublish(){
        if(session('?login')){
            $Model = M('');
            $SpaceModel = M('TravelNoteSpace');
            $Model->startTrans();
            $user_id = session('login');
            $data = I('post.');
            $spaceId = explode(',',$data['space']);
            $data['content'] = htmlspecialchars_decode($data['content']);
            $time = date('Y-m-d H:i:s',time());
            

            $data['user_id'] = $user_id;
            $data['time'] = $time;
            $data['browse'] = 0;
            $travelNoteResult = $content_id = M('TravelNote')->add($data);

            $dynamicsData['user_id'] = $user_id;
            $dynamicsData['time'] = $time;
            $dynamicsData['type'] = 12;
            $dynamicsData['content_id'] = $content_id;

            $dynamicsResult = M('Dynamics')->add($dynamicsData);
            $bool = true;
            $spaceArr = array();
            $spaceBelong = array();
            for($i=0;$i<count($spaceId);$i++){
                if($SpaceModel->where(array('id'=>$spaceId[$i]))->count()==0){
                    if($SpaceModel->add(array('city'=>$spaceId[$i],'create_time'=>$time))===false)
                        $bool = false;
                    else{
                        $spaceBelong[$i]['space_id'] = $SpaceModel ->getLastInsID();
                        $spaceBelong[$i]['travel_note_id'] = $content_id;
                    }
                }else{
                    $spaceBelong[$i]['space_id'] = $spaceId[$i];
                    $spaceBelong[$i]['travel_note_id'] = $content_id;
                }
            }
            $belongResult = M('TravelNoteSpaceBelong')->addAll($spaceBelong);


            if($travelNoteResult!==false&&$dynamicsResult!==false&&$bool!==false&&$belongResult!==false){
                $Model->commit();
                $this->success('发布成功','Index');
            }else{
                $Model->rollback();
                $this->error('发布失败');
            }

        }else{
            $this->error('你还没登录');
        }
        


        // $model = D('TravelNote');
        // $result = $this->addNew($data);
    }


    public function getCityList(){
        $cmodel = D('TravelNoteSpace');
        $result = $cmodel->select();
        $this->ajaxReturn(json_encode($result));
    }
}