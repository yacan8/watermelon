<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

    <link rel="stylesheet" href="/watermelon/Public/css/login.css">
        <script src="/watermelon/Public/assets/jquery/js/jquery.min.js"></script>
    <script src="/watermelon/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
    <title>账号中心丨campusleader</title>
</head>

<body>
    
<nav class="nav bg-main">
	<div class="container">
		<a href="#"><img class="logo_img" src="/watermelon/Public/img/logo.png"></a>
		<ul class="nav_l">
			<li class="active"><a href="#">首页</a></li>
			<li class="transition-all-03"><a class="transition-all-03" href="#">资讯</a></li>
			<li><a href="#">景点</a></li>
			<li><a href="#">装备</a></li>
			<li><a href="#">游记</a></li>
			<li><a href="#">论坛</a></li>
		</ul>

		<ul class="nav_l pull-right">
			<li><a href="#">注册/登录</a></li>
			<li class="user"><a href="#">_杨溜溜</a></li>
		</ul>
	</div>
</nav>



    <div class=" overflow-auto">
        <div class="container">
            <div class="bg-white p-lg re-container transition-all-03">
                <form id="r_form" class="form-horizontal" method="post" action="<?php echo U('Login/reg');?>">
                  <fieldset>
                    <legend class="login_header">注册CL<i></i><a href="<?php echo U('Login/index');?>" class="pull-right header-right m-t-sm">使用已有账号登录</a></legend>
                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-earphone"></span>
                        <input class="from-input" type="text" name="tel" id="tel" placeholder="手机号" maxlength="11" title="请输入手机号码" required/>
                        <img id="username_check" src="/watermelon/Public/img/loading.gif">
                        <span class="help-block m-t-sm"></span>
                    </div>
                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-user"></span>
                        <input class="from-input" type="text" name="nickname" id="nickname" placeholder="昵称" maxlength="15" title="请输入昵称" required/>
                        <span class="help-block m-t-sm"></span>
                    </div>

                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-ice-lolly"></span>
                        <input class="from-input" id="password" type="password" name="password" placeholder="密码" title="请输入密码" required/>
                        <span class="help-block m-t-sm"></span>
                    </div>

                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-ice-lolly"></span>
                        <input class="from-input" id="repassword" type="password" name="repassword" title="确认密码" placeholder="确认密码" />
                        <span class="help-block m-t-sm"></span>
                    </div>
                    
                    <div class="input-g m-r-110">
                        <span class="input-icon glyphicon glyphicon-check"></span>
                        <input id="verify" class="from-input" type="text" placeholder="图形验证码" title="图形验证码" required/>
                        <img class="verify" src="<?php echo U('Index/verify');?>" title="看不清？点击刷新验证码">
                        <span class="help-block m-t-sm"></span>
                    </div>

 <!--                    <div class="input-g m-r-130">
                        <span class="input-icon glyphicon glyphicon-eye-open"></span>
                        <input id="SMS" class="from-input" name="SMS" type="text" placeholder="短信验证码" title="短信验证码" required/>
                        <a title="点击获取短信验证码" id="send" href="javascript:void(0)" class="btn" >点击发送短信</a>
                        <span class="help-block m-t-sm"></span>
                    </div>
 -->
                    <div class="input-g">
                      
                        <button id="form_submit" data-loading-text="Loading..." type="button" class="btn-submit btn-danger btn-block">注册账号</button>
                      
                    </div>
                  </fieldset>
                </form>
            </div>
        </div>
    </div>

    
<footer>
	<div class="container text-center p-sm p-t-md">
            <a target="_blank" class="border-no" href="#">关于我们</a>
            <a target="_blank" href="#">加入我们</a>
            <a target="_blank" href="#">免责声明</a>
            <a target="_blank" href="#">合作伙伴</a>
            <a target="_blank" href="#">联系我们</a>
            <a target="_blank" href="#">新浪微博</a>
            <a target="_blank" href="#">微信公众号</a>
    </div>
	<div class="p-sm">
		<div class="container text-center">
			 <span>2016 © 西瓜游® campusleader.cn All rights reserved</span>
		</div>
	</div>
</footer>
</body>
    <script type="text/javascript">
        var set_time;
        
        var sight = 0;
        var check_verify_url = "<?php echo U('Login/check_verify');?>";
        var check_url = "<?php echo U('Login/check');?>";
        var verify_src = "<?php echo U('Index/verify');?>";
        var check_nickname_url = "<?php echo U('Login/nickname_check');?>";
        $(function(){
            <?php if(session('?message')): ?>alert("<?php echo session('message') ?>");
            <?php session('message',null); endif; ?>
        })
    </script>
    <script src="/watermelon/Public/js/reg.js"></script>
    <script src="/watermelon/Public/js/verify.js"></script>
</html>