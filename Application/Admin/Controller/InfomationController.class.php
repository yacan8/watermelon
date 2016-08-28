<?php
namespace Admin\Controller;
use Think\Controller;
class InfomationController extends Controller {
	public function _initialize(){
        if (!isset($_SESSION['Adminlogin'])) {
            $this->redirect('Login/index');
        }
 	}
	//管理列表
    public function index(){
    	$contributor = I('get.contributor',0);
    	
		$p = I('get.p',1);
		$InfomationModel = D('Infomation');
		$UpList = $InfomationModel->getList(true,$p,$contributor,$count);
		$type = I('get.type',0);
		$List = $InfomationModel->getList(false,$p,$contributor,$count);
		// dump($List);
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出

		$this->assign('page',$show);
		$this->assign('UpList',$UpList);
		$this->assign('infomationList',$List);
		$this->assign('p',$p);
		$this->assign('title','资讯管理');
		$this->display();

    }
    


    //上下线切换
	public function uplinetoggle(){
		$id = I('get.id');
		$InfomationModel = D('Infomation');
		$UpCount = $InfomationModel->where("state = 1")->count();
		$state = $InfomationModel->where(array('id'=>$id))->getField('state');
		if($state =='0'){
			if($UpCount>=3)
				$this->error('上线类型数量已达到最大数量3');
			else{
				$data['state'] = '1';
			}
		}else{
			$data['state'] = '0';
		}
		$result = $InfomationModel->where(array('id'=>$id))->save($data);
		if($result!=0)
			$this->redirect('Infomation/index');
		else
			$this->error('修改失败');
	}
	//删除新闻
	public function delete(){
		$id = I('get.id');
		$InfomationModel = M('Infomation');
		$result = $InfomationModel->where(array('id'=>$id))->delete();
		if($result) $this->redirect('Infomation/index');
		else $this->error('删除成功');
	}
	//查看
	public function view(){
		$id = I('get.id');
		$this->redirect('Home/Infomation/detail',array('id'=>$id));
	}
	//修改|添加 view
	public function infomation(){
		$id = I('get.id',0);
		if($id!=0){
			$InfomationModel = M('Infomation');

			$detail = $InfomationModel->where(array('id'=>$id))->find();

			if($detail['image']==''){
				$detail['image'] = C('__DATA__').'/infomation/default.jpg';
			}else{
				$detail['image'] = C('__DATA__').'/'.$detail['image'];
			}
			$this->assign('change',1);
			$this->assign('detail',$detail);
		}else{

			$this->assign('change',0);
		}

		$this->assign('imageUploadUrl',U('Upload/upload'));
		$this->assign('placeholderText','输入资讯内容');

		$this->display('infomation');
	}
    //修改|保存 action
	public function save(){
		session('Adminlogin',2);
		$id = I('get.id',0);
		$InfomationModel = D("Infomation");
		$result = $InfomationModel->create();
		if(!$result){
			$this->error($InfomationModel->getError());
		}else{
			if($_FILES['file']['name']!=null){
				$data = $InfomationModel->upload();
				if($data=='上传失败'){
					$this->error('上传失败');
				}else{
					$InfomationModel->image = $data['image'];
					$InfomationModel->image_thumb = $data['image_thumb'];
					if($id!=0){
						$detail = M('Infomation')->find($id);
						unlink('./Data/'.$detail['image']);
						unlink('./Data/'.$detail['image_thumb']);
					}
				}
			}
			if($id!=0){
				$InfomationModel->where(array('id'=>$id))->save();
			}else{
				$InfomationModel->publish_time = date('Y-m-d H:i:s',time());
				$InfomationModel->browse = 0;
				$InfomationModel->comment_count = 0;
				$InfomationModel->contributor = session('Adminlogin');
				$InfomationModel->state = 0;
				$InfomationModel->add();
			}
			$this->redirect('Infomation/index');
		}
	}

}