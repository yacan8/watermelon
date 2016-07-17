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
  <?php if(session('login') == '2') $self = '我'; else $self = 'TA'; ?>
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
	<li <?php if(ACTION_NAME == 'dynamics'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/dynamics');?>">动态</a></li>
	<li <?php if(ACTION_NAME == 'travelNote'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/travelNote');?>">游记</a></li>
	<li <?php if(ACTION_NAME == 'topic'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/topic',array('id'=>$user_id));?>">话题</a></li>
	<li <?php if(ACTION_NAME == 'board'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/board');?>">留言板</a></li>
	<li <?php if(ACTION_NAME == 'album' or ACTION_NAME == 'photo'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/album');?>">照片</a></li>
	<li <?php if(ACTION_NAME == 'collection'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/collection');?>">我的收藏</a></li>
	<li <?php if(ACTION_NAME == 'message'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Account/message');?>">我的消息 <span class="label label-info">5</span></a></li>
	<li class="last <?php if(ACTION_NAME == 'information'): ?>active<?php endif; ?>"><a href="<?php echo U('Account/information');?>"><span class="glyphicon glyphicon-user"></span> 个人资料</a></li>
	<li><a href="#">退出登录</a></li>
</ul>
        <div class="row">
          <div class="col-xs-9">
            <div class="dynamics-item bg-white border-gray-e m-b-sm">
	<div class="p-15 border-gray-b-e">
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="#">这是一个昵称</a></h4>
		    <div class="dynamics-info">
		    	评论了资讯 <a href="#">这是一个资讯的title</a>
		    </div>
		  </div>
		</div>
	</div>
	<div class="p-sm p-l-15 font-12 tc-gray9">
		<span class="glyphicon glyphicon-time"></span> 2016-2-4
	</div>
</div>

<div class="dynamics-item bg-white border-gray-e m-b-sm">
	<div class="p-15 border-gray-b-e">
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="#">这是一个昵称</a></h4>
		    <div class="dynamics-info">
		    	在资讯 <a href="#">这是一个资讯的title</a> 回复了 <a href="#">这是被回复的人的昵称</a>
		    </div>
		  </div>
		</div>
	</div>
	<div class="p-sm p-l-15 font-12 tc-gray9">
		<span class="glyphicon glyphicon-time"></span> 2016-2-4
	</div>
</div>

<div class="dynamics-item bg-white border-gray-e m-b-sm">
	<div class="p-15 border-gray-b-e">
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="#">这是一个昵称</a></h4>
		    <div class="dynamics-info">
		    	在景点 <a href="#">景点名</a> 发表了N张照片
		    </div>
			<ul class="images media-picture m-t-sm over-h">
				<li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0c5fae.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0c5fae.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0c5fae.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0dcd8e.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0dcd8e.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0dcd8e.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0eccce.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0eccce.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0eccce.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac10fdda.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac10fdda.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac10fdda.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac1270e1.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac1270e1.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac1270e1.jpeg" alt="Picture"></li>
			</ul>

		  </div>
		</div>
	</div>
	<div class="p-sm p-l-15 font-12 tc-gray9">
		<span class="glyphicon glyphicon-time"></span> 2016-2-4
	</div>
</div>




<div class="dynamics-item bg-white border-gray-e m-b-sm">
	<div class="p-15 border-gray-b-e">
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="#">这是一个昵称</a></h4>
		    <div class="dynamics-info">
		    	在城市 <a href="#">城市名</a> 添加想去标记
		    </div>
		  </div>
		</div>
	</div>
	<div class="p-sm p-l-15 font-12 tc-gray9">
		<span class="glyphicon glyphicon-time"></span> 2016-2-4
	</div>
</div>


<div class="dynamics-item bg-white border-gray-e m-b-sm">
	<div class="p-15 border-gray-b-e">
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="#">这是一个昵称</a></h4>
		    <div class="dynamics-info">
		    	在发表话题 <a href="#">这是一个话题的title</a> 
		    </div>
			<ul class="images media-picture m-t-sm over-h">
				<li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0c5fae.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0c5fae.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0c5fae.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0dcd8e.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0dcd8e.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0dcd8e.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0eccce.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac0eccce.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac0eccce.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac10fdda.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac10fdda.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac10fdda.jpeg" alt="Picture"></li><li><img class="pic_thumb viewer-toggle" src="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac1270e1.jpeg%21feature" data-url="/watermelon/index.php/Image/Timg/image/topic%252F2016-05-06%252F572c4ac1270e1.jpeg%21feature" data-original="/watermelon/Data/topic/2016-05-06/572c4ac1270e1.jpeg" alt="Picture"></li>
			</ul>

		  </div>
		</div>
	</div>
	<div class="p-sm p-l-15 font-12 tc-gray9">
		<span class="glyphicon glyphicon-time"></span> 2016-2-4
	</div>
</div>

            
          </div>

          <div class="col-xs-3">
            
            <h4>
              <?php echo ($self); ?>去过的城市
            <a class="font-12 tc-gray9 pull-right m-t-xs" href="#">>>更多</a>
            </h4>
            <ul class="city_list">
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a><a href="#">哈尔滨</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f4.jpg"></a><a href="#">成都</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f2.png"></a><a href="#">桂林</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f3.jpg"></a><a href="#">咸阳</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a><a href="#">深圳</a></li>
            </ul>

            <hr>
            <h4>
              <?php echo ($self); ?>的粉丝(25)
              <a class="font-12 tc-gray9 pull-right m-t-xs" href="#">>>更多</a>
            </h4>
            <ul class="img_list">
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f4.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f3.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f2.png"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f1.png"></a></li>
            </ul>


            <hr>
            <h4>
              <?php echo ($self); ?>的关注(25)
              <a class="font-12 tc-gray9 pull-right m-t-xs" href="#">>>更多</a>
            </h4>
            <ul class="img_list">
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f4.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f3.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f2.png"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f1.png"></a></li>
            </ul>
            <hr>

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
<script type="text/javascript" src="/watermelon/Public/assets/viewer/js/viewer.min.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.scrollLoading.js"></script>
<script type="text/javascript">
	var PUBLIC = "/watermelon/Public";

  option = {
        loadUrl : "<?php echo U('Index/ajax_load');?>",
        num: 100
    };
 $(function(){
  $('.pic_thumb').scrollLoading();
  var options = {

    title:false,
    maxZoomRatio:1,
    url: 'data-original',
  };
  $('.images').viewer(options);
 })
</script>
<script type="text/javascript" src="/watermelon/Public/js/photoViewer.js"></script>

<?php if((CONTROLLER_NAME == 'Account') and (ACTION_NAME == 'edit')): ?><script type="text/javascript">
    var province_change_url = "<?php echo U('AddressProvinces/change');?>";
  </script>
  <script type="text/javascript" src="/watermelon/Public/js/wait.js"></script>
  <script type="text/javascript" src="/watermelon/Public/js/edit_information.js"></script><?php endif; ?>

</html>