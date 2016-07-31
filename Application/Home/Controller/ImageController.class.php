<?php
namespace Home\Controller;
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

    public function ScenicImg(){
        $img = I('get.image');
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
        $type = I('get.type');
        $image_id = I('get.photoId');
        $ImageModel = D('Image');
        $info = $ImageModel->getImage($image_id,$type);
        $info['time']= substr($info['time'],0,10);
        if($info['scenic_id']!='0')
            $info['describe'] = "<a href='".U('/u/'.$info['user_id'],'',false,false)."'>".$info['user']['nickname']."</a> 上传于 <a href='".U('Scenic/scenic',array('id'=>$info['scenic_id']))."'>".$info['scenic']['name']."</a>";
        else
            $info['describe'] = "<a href='".U('/u/'.$info['user_id'],'',false,false)."'>".$info['user']['nickname']."</a> 上传于 ".$info['time'];
        $info['image'] = C('__DATA__').'/'.$info['image'];
        unset($info['user']);
        unset($info['scenic']);
        unset($info['user_id']);
        unset($info['scenic_id']);
        unset($info['id']);
        echo json_encode($info);
        // http://localhost:9096/watermelon/index.php/Image/imgLoad/type/2/photoId/1500.html
        // dump($info);
    }
}