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
    }


    public function scenic_img_upload(){

        if(session('?login')){
            $img_str = I('post.img_str');
            if(strlen($img_str)>2800000){
                $json['Code'] = '199';
                $json['Message'] = '图片超出限制大小2M';
            }else{
                $result = $this->scenic_base64($img_str);
                if($result == 'service error'){
                    $json['Code'] = '201';
                    $json['Message'] = '上传错误';
                }else if($result == 'file error'){
                    $json['Code'] = '202';
                    $json['Message'] = '请选择图片';
                }else{
                    $json['Code'] = '200';
                    $json['name'] = $result;
                }
            }
        }else{
            $json['Code'] = '199';
            $json['Message'] = '请先登录';
        }
        echo json_encode($json);

    }
    /**
     * [scenic_base64 景点模块图片上传base64转码保存]
     * @param  [string] $base64 [base64编码]
     * @return [string]         [结果提示]
     */
    private function scenic_base64($base64) {
        if(session('?login')){
            $base64_image = str_replace(' ', '+', $base64);
            //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
                //匹配成功
                $image_name = uniqid().'.'.$result[2];
                $date = date('Y-m-d',time());
                $user_id = session('login'); 
                mkFolder("./Data/Scenic/image/$user_id/$date");
                $image_path = "Scenic/image/$user_id/$date/$image_name";
                $image_file = "./Data/$image_path";//服务器文件存储路径
                // mkFolder("./Data/test//$date");
                // $image_path = "test/$date/$image_name";
                // $image_file = "./Data/$image_path";//服务器文件存储路径
                if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
                    return $image_path;
                }else{
                    return 'service error';//上传错误
                }
            }else{
                return 'file error';//base64文件编码不为图片
            }
        }else{
            return 'not login';
        }
        
    }



    public function upload_save(){
        if(session('?login')){
            $scenic_id = I('post.scenic_id',0);
            $city_id = I('post.city_id',0);
            $album_id = I('post.album_id',0);
            $img_name_str = I('post.img_name_str',0);

            $time = date('Y-m-d H:i:s',time());
            $user_id = session('login');
            $model = M('');
            $model->startTrans();
            if($scenic_id == 0)//如果为在城市或者个人中心上传
                $Data['type'] = 19;
            else//在景点上传 归属该景点
                $Data['type'] = 5;
            $Data['user_id'] = $user_id;
            $Data['content_id'] = 0;
            $Data['time'] = $time;
            $DynamicsModel = M('Dynamics');
            $dynamicsResult = $DynamicsModel->add($Data);//添加结果


            $dynamics_id = $DynamicsModel->getLastInsID();
            

            $ImgArray = explode(',',$img_name_str);
            $ImgData = array();
            for ($i=0; $i < count($ImgArray); $i++) { //形成数据
                $ImgData[] = array(
                    'scenic_id'=>$scenic_id,
                    'city_id'=>$city_id,
                    'album_id'=> $album_id,
                    'dynamics_id'=> $dynamics_id,
                    'time'=> $time,
                    'user_id'=> $user_id,
                    'delete_tag'=> (bool)0,
                    'image'=>$ImgArray[$i]
                    );
            }
            $ImageModel = M('Image');

            $imageResult = $ImageModel->addAll($ImgData);

            if($dynamicsResult!==false&&$imageResult!==false){
                $json['Code'] = '200';
                $json['Message'] = '保存成功';
                $model->commit();
            }else{
                $json['Code'] = '201';
                $json['Message'] = '操作失败';
                $model->rollback();
            }

        }else{

            $json['Code'] = '199';
            $json['Message'] = '你还没有登录';

        }
        
        echo json_encode($json);

    }



    /**
     * [cancel 取消上传 删除刚上传图片]
     */
    public function cancel(){
        $name = I('post.name');
        $path = "./Data/$name";
        unlink($path);
    }
}