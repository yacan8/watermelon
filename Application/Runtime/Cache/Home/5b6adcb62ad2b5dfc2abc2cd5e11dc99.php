<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

        <script src="/watermelon/Public/assets/jquery/js/jquery.min.js"></script>
    <script src="/watermelon/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
    <link rel="stylesheet" href="/watermelon/Public/css/login.css">
    <script type="text/javascript">
       
        var reg_url = "<?php echo U('Login/reg');?>";
        var login_url = "<?php echo U('Login/login');?>";
        var check_url = "<?php echo U('Login/check');?>";
        $(function(){
            <?php if(session('?message')): ?>alert("<?php echo session('message') ?>");
            <?php session('message',null); endif; ?>
        })
    </script>
    <script src="/watermelon/Public/js/login.js"></script>
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



    <div class="login-bg bg-main overflow-auto">
        <div class="container">
            <div class="bg-white p-lg pull-right op-container transition-all-03">
                <form id="l_form" class="form-horizontal" method="post" action="<?php echo U('Login/login');?>">
                  <fieldset>
                    <legend class="login_header">登录<span></span><a href="<?php echo U('Login/register');?>" class="pull-right header-right m-t-sm">注册<e class="hidden-xs">新账号</e></a></legend>

                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-user"></span>
                        <input class="from-input" title="请填写手机号码" type="text" name="tel" id="tel" placeholder="手机号" required/>
                        <img id="username_check" src="/watermelon/Public/img/loading.gif">
                        <span class="help-block m-t-sm"></span>
                    </div>


                    <div class="input-g">
                        <span class="input-icon glyphicon glyphicon-ice-lolly"></span>
                        <input class="from-input" title="请输入密码" id="password" type="password" name="password" placeholder="密码" required/>
                        <span class="help-block m-t-sm"></span>
                    </div>





                    <div class="text-right m-b-md">
                        <a href="<?php echo U('Login/forget');?>">忘记密码？</a>
                    </div>
                    

                    <div class="form-group">
                      <div class="col-lg-12">
                        <button id="form_submit" data-loading-text="Loading..." type="submit" class="btn p-sm bg-main btn-block">登录</button>
                      </div>
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