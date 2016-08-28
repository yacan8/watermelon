<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	
	//登录view
	public function index(){
		//记录跳转登录页前的页面
		$url = I("get.url",'');
		if($url!='')
			session('url',$url);
		// C('TOKEN_ON',false);
		$this->display();
	}

	//验证码
    public function verify(){
        $Verify =  new \Think\Verify();
        $Verify->fontSize = 200;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry();
    }

	//ajax检查用户名为登录或注册
	public function check(){
		$LoginModel = D('Login');
		$username = I('post.tel');
		$bool = $LoginModel->check_username($username);
		if($bool){
			echo '1';
		}else{
			echo '2';
		}
	}

	//邮箱发送验证码
	public function sms_send(){
		$yzm = rand(1000,9999);
		$email = trim(I('post.email'));//获取邮箱
		if(check_email($email)){
			session('SMS',$yzm);
	        Vendor('PHPMailer.PHPMailerAutoload');     
	        $mail = new \PHPMailer(); //实例化
	        $mail->IsSMTP(); // 启用SMTP
	        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
	        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
	        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
	        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
	        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
	        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
	        $mail->AddAddress($email,"尊敬的用户");
	        $mail->WordWrap = 500; //设置每行字符长度
	        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
	        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
	        $mail->Subject ='西瓜游-注册验证码'; //邮件主题
	        $mail->Body = '【西瓜游】你的验证码为 '.$yzm; //邮件内容
	        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
	        $bool = $mail->Send();
	        if($bool){
	        	$json['Code'] = '200';
	        	$json['Message'] = '发送成功';
	        }else{
	        	$json['Code'] = '201';
	        	$json['Message'] = '发送失败';
	        }
		}else{
			$json['Code'] = '199';
	        $json['Message'] = '邮箱不合法';
		}
		echo json_encode($json);
    }

    //忘记密码获取验证码
 	public function forgetSMS(){
		$yzm = rand(1000,9999);
		$tel = trim(I('post.tel'));//获取邮箱
		$user_id = M("Login")->where(array('tel'=>$tel))->getField('user_id');
		$email = M('User')->where(array('id'=>$user_id))->getField('email');
		if(check_email($email)){
			session('forget',$yzm);
	        Vendor('PHPMailer.PHPMailerAutoload');     
	        $mail = new \PHPMailer(); //实例化
	        $mail->IsSMTP(); // 启用SMTP
	        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
	        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
	        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
	        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
	        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
	        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
	        $mail->AddAddress($email,"尊敬的用户");
	        $mail->WordWrap = 500; //设置每行字符长度
	        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
	        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
	        $mail->Subject ='西瓜游-验证码'; //邮件主题
	        $mail->Body = '【西瓜游】你的验证码为 '.$yzm; //邮件内容
	        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
	        $bool = $mail->Send();
	        if($bool){
	        	$json['Code'] = '200';
	        	$json['Message'] = '发送成功';
	        }else{
	        	$json['Code'] = '201';
	        	$json['Message'] = '发送失败';
	        }
		}else{
			$json['Code'] = '199';
	        $json['Message'] = '操作错误';
		}
		echo json_encode($json);
    }   
    /**
	 * [checkSMS 检测验证码]
	 *@param [string] $SMS [POST过来的短信验证码]
	 */
	public function checkSMS(){
		if(!IS_POST){
			$json['Code'] = '-1';
			$json['Message'] = "service error!";
		}else{
			if(!session('?SMS')){
				$json['Code'] = '0';
				$json['Message'] = "验证码无效!";
			}else{
				$SMS = I('post.SMS');
				if($SMS!=session('SMS')){
					$json['Code'] = '2';
					$json['Message'] = "验证码错误!";
				}else{
					$json['Code'] = '200';
					$json['Message'] = "success!";
				}
			}
		}
		echo json_encode($json);
	}


	public function checkFSMS(){
		if(!IS_POST){
			$json['Code'] = '-1';
			$json['Message'] = "service error!";
		}else{
			if(!session('?foget')){
				$json['Code'] = '0';
				$json['Message'] = "验证码无效!";
			}else{
				$SMS = I('post.SMS');
				if($SMS!=session('SMS')){
					$json['Code'] = '2';
					$json['Message'] = "验证码错误!";
				}else{
					$json['Code'] = '200';
					$json['Message'] = "success!";
				}
			}
		}
		echo json_encode($json);
	}

	//注册view
	public function register(){
		$this->display();
	}

	//忘记密码view
	public function forget(){
		$this->display();
	}


	public function forget_user(){
		$tel = I('post.tel');
		session('forget',$tel);
		if(session("?forget")){
			echo session("forget");
		}else{
			echo "error";
		}
	}
	//注册action
	public function reg(){
		// C('TOKEN_ON',false);
		
		$LoginModel = D('Login');
		$result = $LoginModel->create();
		if(!$result){
			session('message',$LoginModel->getError());
			$this->redirect("Login/register",array());
		}else{
			
			$data['email']= trim(I('post.email'));
			if(check_email($data['email'])){
				$model = M('');
				$model->startTrans();
				$UserModel = M('User');
				$userResult = $UserModel->add($data);
				if($userResult!==false){
					$LoginModel->user_id = $UserModel->getLastInsID();
					$LoginModel->password = md5($LoginModel->password);
					$LoginModel->reg_time = date('y-m-d H:i:s',time());
					$LoginModel->last_time = date('y-m-d H:i:s',time());
					$LoginModel->last_read_message_time = date('y-m-d H:i:s',time());
					$tel = $LoginModel->tel;
					$result1 = $LoginModel->add();

					if($result1!==false){
						session('SMS',null);
						session('login', $LoginModel->getLastInsID());
						$model->commit();
						if(session('?url')){
							$url = session('url');
							session('url',null);
							header("location:".$url);
						}else	$this->redirect("Index/index");
					}else{
						$model->rollback();
						session('message','注册失败');
						$this->redirect("Login/register",array());
					}

				}else{						
					$model->rollback();
					$this->error("注册失败");
				}
				
			}else{
				$this->error("邮箱格式非法");
			}

			
		}
	
		
	}

	//登录action	
	public function login(){
		$LoginModel = D('Login');
		$data['tel'] = I('post.tel');
		$data['password'] = I('post.password');
		$bool = $LoginModel ->login($data);
		if($bool){
			if(session('?url')){
				$url = session('url');
				session('url',null);
				header("location:".$url);
				// $this->redirect("News/detail",array('id'=>session('news')));
			}else $this->redirect("Index/index",array());
		}
		else{
			session('message','用户名或密码不正确');
			$this->redirect("Login/index",array());
		}
	}
	//退出登录
	public function outlogin(){
		session(null);
		$this->redirect("Index/index",array());
	}


	public function check_verify(){
		$verify_code = I('post.verify');
		$verify = new \Think\Verify();
		$result = $verify->check($verify_code);
		if($result)
			echo 'true';
		else
			// echo session('verify');
			echo 'false';
	}

	/**
	 * [reset 密码重置]
	 */
	public function reset(){
		$SMS = I('post.SMS');
		if($SMS!=session('forget')){//验证码不正确
			session('message','短信验证码错误');
			$this->redirect("Login/forget");
		}else{
			$password = I('post.password');
			$repassword = I('post.repassword');
			if($password!=$repassword){//密码与确认密码不一致
				session('message','密码与确认密码不一致');
				$this->redirect("Login/forget");
			}else{
				if(!session("?forget")){//判断是否通过正常方式重置密码，提高安全性
					echo "service error";
				}else{
					$tel = I('post.tel');
					$data['password'] = md5($password);
					$LoginModel = M('Login');
					$result = $LoginModel->where(array('tel'=>$tel))->save($data);
					if($result===false){
						session('message','密码重置失败');
						$this->redirect("Login/forget");
					}
					
					session('SMS',null);
					session('forget',null);
					session('message','密码重置成功');
					$this->redirect("Login/index");
				}
			}
		}
		
	}


	public function nickname_check(){
		$nickname = I('get.nickname');
		$condition['nickname'] = $nickname;
		$count = M('Login')->where($condition)->count();
		if($count==0){
			$json['Code'] = '200';
		}
		else{
			$json['Code'] = '300';
			$json['Message'] = '用户名已存在';
		}
		echo json_encode($json);
	}
}