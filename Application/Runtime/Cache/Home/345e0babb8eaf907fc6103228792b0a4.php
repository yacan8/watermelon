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
    <script type="text/javascript">
        var set_time;
        var check_SMS_url = "<?php echo U('Service/checkSMS');?>";
        var SMS_url = "<?php echo U('Service/sendTemplateSMS');?>";
        var sight = 0;
        var check_verify_url = "<?php echo U('Login/check_verify');?>";
        var check_url = "<?php echo U('Login/check');?>";
        var verify_src = "<?php echo U('Index/verify');?>";
        var forget_user = "<?php echo U('Login/forget_user');?>";
        $(function(){
            <?php if(session('?message')): ?>alert("<?php echo session('message') ?>");
            <?php session('message',null); endif; ?>
        })
    </script>
    <script src="/watermelon/Public/js/forget.js"></script>
    <script src="/watermelon/Public/js/verify.js"></script>
    <title>账号中心丨西瓜游</title>
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



    <div class="bg-main overflow-auto">
        <div class="container">
            <div class="bg-white p-lg re-container transition-all-03">
                <form id="f_form" class="form-horizontal" method="post" action="<?php echo U('Login/reset');?>">
                  <fieldset>
                    <legend class="login_header">重置密码<c></c></legend>

                    <div id="form_container">
                        <!-- 第一步 -->
                        <div class="input-g">
                            <span class="input-icon glyphicon glyphicon-user"></span>
                            <input class="from-input" type="text" name="tel" id="tel" placeholder="输入手机号码" />
                            <img id="username_check" src="/watermelon/Public/img/loading.gif">
                            <span class="help-block m-t-sm"></span>
                        </div>
                        
                        <div class="input-g">
                            <button id="first" data-loading-text="Loading..." type="button" class="btn-submit btn-danger btn-block">下一步</button>
                        </div>
                        <br><br><br><br><br>

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
</html>