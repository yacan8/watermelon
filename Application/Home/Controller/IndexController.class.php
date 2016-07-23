<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    /**
     * 主页view
     */
    public function index(){
        $this->display();
    }

    public function getImg(){

        $url = 'http://pic2.qyer.com/album/1ad/04/1839217/index/300_200';
        $result = getImage($url,'./Data/',uniqid().'.png');
        dump($result);
    }




    public function imgUrlChange(){
        $ScenicModel = M('Scenic');
        $List = $ScenicModel->field('id,image')->select(); 
        $date = date("Y-m-d",time());
        for ($i=0; $i < count($List); $i++) {
            $bool  = check_url($List[$i]['image']);
            if($bool){
                $filename=uniqid().'.jpg';
                $result = getImage($List[$i]['image'],'./Data/Scenic/scenic/'.$date.'/',$filename);
                if($result['file_name']!=''){
                    $data['image'] = 'Scenic/scenic/'.$date.'/'.$result['file_name'];
                    $re = $ScenicModel->where('id ='.$List[$i]['id'])->save($data);
                    dump($re);
                }else{
                    dump($result);
                }
            }
        }

    }


    public function changeScenicType(){
        $ScenicModel = D('Scenic');
        $str = '郭碗瓢盆-<span style="color:#f00;">PHP</span>';
        $str1 = strip_tags($str);          // 删除所有HTML标签
        $str2 = strip_tags($str,'<span>'); // 保留 <span>标签
        echo $str1; // 输出 郭碗瓢盆-PHP
        echo $str2; // 样式不一样喔
        for ($i=1; $i < 450; $i++) { 
            $data['type_id'] = rand(1,8);
            dump($ScenicModel->where('id = '.$i)->save($data));
        }
        

    }

    
    public function ajax_load(){
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/6.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/5.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/4.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/3.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/2.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/1.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/7.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/8.jpg';
        $img[] = 'http://img2.3lian.com/2014/f2/132/d/9.jpg';
        $rand = rand(0,8);
        $json['describe'] = "这是一个描述".$rand;
        $json['count']  = $rand;
        $json['src']    = $img[$rand];
        echo json_encode($json);
    }
}