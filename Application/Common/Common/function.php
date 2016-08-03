<?php


/*
*功能：php完美实现下载远程图片保存到本地 
*参数：文件url,保存文件目录,保存文件名称，使用的下载方式 
*当保存文件名称为空时则使用远程文件原来的名称 
*/
function getImage($url,$save_dir='',$filename='',$type=0){ 
    if(trim($url)==''){ 
        return array('file_name'=>'','save_path'=>'','error'=>1); 
    } 
    if(trim($save_dir)==''){ 
        $save_dir='./'; 
    } 
    if(trim($filename)==''){//保存文件名 
        $ext=strrchr($url,'.'); 
        if($ext!='.gif'&&$ext!='.jpg'){ 
            return array('file_name'=>'','save_path'=>'','error'=>3); 
        } 
        $filename=uniqid().$ext;
    } 
    if(0!==strrpos($save_dir,'/')){ 
        $save_dir.='/';
    }
    //创建保存目录 
    if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){ 
        return array('file_name'=>'','save_path'=>'','error'=>5); 
    } 
    //获取远程文件所采用的方法  
    if($type){ 
        $ch=curl_init(); 
        $timeout=30; 
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
        $img=curl_exec($ch); 
        curl_close($ch); 
    }else{ 
        ob_start();  
        readfile($url); 
        $img=ob_get_contents();  
        ob_end_clean();  
    } 
    //$size=strlen($img);
    //文件大小
    $fp2=@fopen($save_dir.$filename,'a'); 
    fwrite($fp2,$img); 
    fclose($fp2); 
    unset($img,$url); 
    return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0); 
} 

/**
 * [check_url 判断是否为URL]
 * @param  [STRING] $url [$url地址]
 * @return [bool] 
 */
function check_url($url){
    if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
        return false;
    }
    return true;
}



/**
 * [str_sub 景点描述字符串截取]
 * @param  [STRING] $text   [截取字符串]
 * @param  [integer] $length [截取长度]
 * @return [string]
 */
function str_sub($text,$length){
    $strip_tags_text = strip_tags($text);
    $result = mb_substr($strip_tags_text,0,$length,"utf-8");
    if($result == $strip_tags_text)//如果没有截取，字符串长度小于截取长度
        return $strip_tags_text;
    else//否则返回截取后+省略号 
        return $result.'...';
}

/**
 * [kilometre 距离 米转化为公里]
 * @param  [Integer] $distance [距离 单位米]
 * @return [String]           [公里字符串]
 */
function kilometre($distance){
    $kil = (float)$distance/1000;
    return sprintf("%.2f",$kil).'公里';
}

/**
* 可以统计中文字符串长度的函数
* @param $str 要计算长度的字符串
* @param $type 计算长度类型，0(默认)表示一个中文算一个字符，1表示一个中文算两个字符
*
*/
function abslength($str){
    if(empty($str)){
        return 0;
    }
    if(function_exists('mb_strlen')){
        return mb_strlen($str,'utf-8');
    }
    else {
        preg_match_all("/./u", $str, $ar);
        return count($ar[0]);
    }
}

