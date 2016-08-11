<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends Controller {

    public function img(){
        $image = I('get.image');
        if($image!=''){
            $h = I('get.h',150);
            $w = I('get.w',150);
            $t = I('get.t',0);
            $imgNameArray = explode('!',$image);
            $image = new \Think\Image(\Think\Image::IMAGE_GD); 
            if($t == 0)
                $image->open('Data/news/'.$imgNameArray[0]);
            else
                $image->open('Data/news_thumb/'.$imgNameArray[0]);
            $img = $image->thumb($w, $h,\Think\Image::IMAGE_THUMB_CENTER)->getImg();
            $i = $img->getImg();
            header ('Content-Type:'.$img->mime());
            imagejpeg ( $i );
        }
    }

    public function TImg(){
        $img = I('get.image');
        if($img!=''){
            $img = urldecode($img);
            $imgNameArray = explode('!',$img);
            $image = new \Think\Image(\Think\Image::IMAGE_GD); 
            $image->open('Data/'.$imgNameArray[0]);
            $img1 = $image->thumb(100, 100,\Think\Image::IMAGE_THUMB_CENTER)->getImg();
            $i = $img1->getImg();
            header ('Content-Type:'.$img1->mime());
            imagejpeg ( $i );
        }
    }


    public function i(){
        $img = I('get.i');
        if($img !=''){
            $img = urldecode($img);
            $h = I('get.h',120);
            $w = I('get.w',200);
            $imgNameArray = explode('!',$img);
            $image = new \Think\Image(\Think\Image::IMAGE_GD); 
            $image->open('Data/'.$imgNameArray[0]);
            $img = $image->thumb($w, $h,\Think\Image::IMAGE_THUMB_CENTER)->getImg();
            $i = $img->getImg();
            header ('Content-Type:'.$img->mime());
            imagejpeg ( $i );
        }
    }


    public function imgLoad(){
        $province_id = I('get.province_id');
        $city_id = I('get.city_id');
        $user_id = I('get.user_id');
        $scenic_id = I('get.scenic_id');
        $image_id = I('get.photoId');
        $ImageModel = D('Image');
        $info = $ImageModel->getImage($image_id,$province_id,$city_id,$scenic_id,$user_id);
        
        $info['describe'] = $info['describe']."<a href='".U('/u/'.$info['user_id'],'',false,false)."'>".$info['user']['nickname']."</a>";
        $info['describe'] = $info['describe']." ".$info['time']." 上传于";
        $info['describe'] = $info['describe']." <a href='".U('Scenic/image',array('province_id'=>$province_id,'city_id'=>$info['city']['id'],'user_id'=>$user_id))."'>".$info['city']['city']."</a>";
        if($info['scenic_id']!='0'){
            $info['describe'] = $info['describe']." / <a href='".U('Scenic/image',array('province_id'=>$province_id,'city_id'=>$city_id,'scenic_id'=>$info['scenic_id'],'user_id'=>$user_id))."'>".$info['scenic']['name']."</a>";  
        }
        
        $info['image'] = C('__DATA__').'/'.$info['image'];
        unset($info['user']);
        unset($info['scenic']);
        unset($info['user_id']);
        unset($info['scenic_id']);
        unset($info['city']);
        echo json_encode($info);
    }

    public function img_delete(){
        $id = I('post.id');
        if($id!=''){
            $data['delete_tag'] = (bool)1;
            $ImageModel = M('Image');
            $result = $ImageModel->where(array('id'=>$id))->save($data);
            if($result!==false){
                $json['Code'] = '200';
                $json['Message'] = '删除成功';
            }else{
                $json['Code'] = '201';
                $json['Message'] = '删除失败';
            }
            $this->ajaxReturn($json);
        }
    }


}