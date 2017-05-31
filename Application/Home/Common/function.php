<?php
function base64_upload($base64) {
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
        //匹配成功
        $image_name = uniqid().'.'.$result[2];
        $date = date('Y-m-d',time());
        mkFolder("./Data/topic/$date");
        $image_path = "topic/$date/$image_name";
        $image_file = "./Data/$image_path";//服务器文件存储路径
        if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
            return $image_path;
        }else{
            return 'service error';//上传错误
        }
    }else{
        return 'file error';//base64文件编码不为图片
    }
}





/**
 * [mkFolder 判断文件夹是否存在，不存在则创建]
 * @param  [String] $path [文件夹路径]
 */
function mkFolder($path){
    if(!is_readable($path)){
        is_file($path) or mkdir($path,0700,true);  
    }
}

/**
 * [is_weixin 判断是否为微信浏览器]
 * @return boolean
 */
function is_weixin(){
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
    }
    return false;
}
function timeDiff($DateObj,$time){
    $str = $DateObj->timeDiff( $time );
    if(strstr($str,'年')||strstr($str,'月')||strstr($str,'周')||strstr($str,'天'))
        return date('Y-m-d',strtotime($time));
    else
        return $str;
}


/**
 * 邮件发送函数
 */
    function sendMail($to, $title, $content) {

        Vendor('PHPMailer.PHPMailerAutoload');
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }
