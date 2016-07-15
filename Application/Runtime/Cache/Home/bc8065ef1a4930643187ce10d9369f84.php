<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

    <link rel="stylesheet" href="/watermelon/Public/assets/viewer/css/viewer.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/account.css">
  	<link rel="stylesheet" href="/watermelon/Public/css/account_board.css">


    <?php if((CONTROLLER_NAME == 'Account') and (ACTION_NAME == 'topic')): ?><link rel="stylesheet" href="/watermelon/Public/css/topic.css"><?php endif; ?>


    <?php if((CONTROLLER_NAME == 'Account') and (ACTION_NAME == 'edit')): ?><link rel="stylesheet" href="/watermelon/Public/css/wait.css"><?php endif; ?>


    <title>西瓜游-景点</title>
  <?php if(session('login') == $user_id) $self = '我'; else $self = 'TA'; ?>
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



    <div class="bg-gray-f6">
     	<div class="container p-t-md">
        <div class="bg-white p-md border-gray-e">
	<div class="header_container">
		<img class="u_icon" src="/watermelon/Public/img/f4.jpg">
		<div class="info">
			<div class="nickname">
				这是一个昵称
				<button class="btn btn-xs btn-success m-l-sm">
					<span class="glyphicon glyphicon-plus"></span> 加关注
				</button>
				<button class="btn btn-xs btn-success active m-l-sm">
					<span class="glyphicon glyphicon-ok"></span> 已关注
				</button>
			</div>
			<div class="text tc-gray9">
				<span style="font-size:24px">“</span>
				做我自己想做的事，走自己想走的路，过不一样的生活，我的人生我做主我为自己代言，我就是哑舍格拉
			</div>
		</div>
	</div>
</div>
<ul class="menu bg-white m-b-sm">
	<li><a href="#">动态</a></li>
	<li class="active"><a href="#">游记</a></li>
	<li><a href="#">话题</a></li>
	<li><a href="#">留言板</a></li>
	<li><a href="#">照片</a></li>
	<li><a href="#">我的收藏</a></li>
	<li><a href="#">我的消息 <span class="label label-info">5</span></a></li>
	<li class="last"><a href="#"><span class="glyphicon glyphicon-user"></span> 个人资料</a></li>
</ul>
        <div class="row">
          <div class="col-xs-9">
            <div class="bg-white border-gray-e p-md font-12">
	<div class="font-16 p-b-md border-gray-b-e m-b-md">
		<?php echo ($self); ?>的粉丝
	</div>
	<?php $__FOR_START_2181__=1;$__FOR_END_2181__=8;for($i=$__FOR_START_2181__;$i < $__FOR_END_2181__;$i+=1){ ?><div class="fans-item p-b-md m-b-md">
		<a href="#"><img class="fans-icon" src="/watermelon/Public/img/f1.png"></a>
		<a class="m-r-sm" href="#">麦乐</a>
		<span class="glyphicon glyphicon-home tc-gray9"></span> 地区：广西壮族自治区 玉林市
		<a class="btn btn-success btn-xs pull-right m-t-sm f-theme follow" data-id="2"><span class="glyphicon glyphicon-plus"></span> 加关注</a>
	</div><?php } ?>

</div>
            
            
          </div>

          <div class="col-xs-3">
            <ul class="sidelist-group bg-white">
	<li class="border-l-main active <?php if(ACTION_NAME == 'edit'): ?>active<?php endif; ?>"><a href="<?php echo U('User/edit');?>"><?php echo ($self); ?>的粉丝</a></li>
	<li class="border-l-main <?php if(ACTION_NAME == 'safe'): ?>active<?php endif; ?>"><a href="<?php echo U('User/safe');?>"><?php echo ($self); ?>的关注</a></li>
	<li class="border-l-main <?php if(ACTION_NAME == 'safe'): ?>active<?php endif; ?>"><a href="<?php echo U('User/safe');?>"><?php echo ($self); ?>想去</a></li>
	<li class="border-l-main <?php if(ACTION_NAME == 'safe'): ?>active<?php endif; ?>"><a href="<?php echo U('User/safe');?>"><?php echo ($self); ?>去过</a></li>
</ul>
          </div>
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
    <script src="/watermelon/Public/assets/jquery/js/jquery.min.js"></script>
    <script src="/watermelon/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>


</html>