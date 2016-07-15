<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

    <link rel="stylesheet" href="/watermelon/Public/css/photoViewer.css">
  	<link rel="stylesheet" href="/watermelon/Public/css/city_list.css">
    <title>西瓜游-景点</title>

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



    <div class="p-t-md">
      <div class="container">
          <h2>热门城市</h2>
          <div class="hot_container over-h m-t-lg">
            <?php $__FOR_START_9571__=1;$__FOR_END_9571__=9;for($i=$__FOR_START_9571__;$i < $__FOR_END_9571__;$i+=1){ ?><div class="hit_item">
              <a class="img_a" href="#">
                <img class="transition-all-1" src="/watermelon/Public/img/f1.png">
              </a>
              <div class="p-sm text-center">
                <div class="font-bold font-16">
                  <a class="title" href="#">四川-成都</a>
                </div>
                <div class="m-t-xs font-12 tc-gray9">
                  <span class="keywords">2015</span>人想去
                </div>
              </div>
            </div><?php } ?>
          </div>
        </div>
    </div>
    
   	<div class="container">
      <h2 class="pull-left">城市列表</h2>
      <div class="city-type m-l-lg pull-left">
            <a class="active" href="#">全部</a>
            <a href="#">东北</a>
            <a href="#">华东</a>
            <a href="#">西南</a>
      </div>
      <div style="clear: both;"></div>
      
      <div style="clear: both;">
        <h3 class="tc-main">东北</h3>
        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">大庆市</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>

        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>

        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">大庆市</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>


        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">大庆市</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>


        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>


        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>
      </div>
          <div style="clear: both;">
        <h3 class="tc-main">东北</h3>
        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">大庆市</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>

        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
        </div>

        <div class="p-item">
          <span class="p-title">黑龙江</span>
          <ul class="city_list">
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">齐齐哈尔市</a></li>
            <li><a href="#">鸡西市</a></li>
            <li><a href="#">大庆市</a></li>
            <li><a href="#">掌不住</a></li>
            <li><a href="#">不懂</a></li>
            <li><a href="#">哈尔滨</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">黑色幽默</a></li>
            <li><a href="#">相同</a></li>
          </ul>
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
<script type="text/javascript">
	var PUBLIC = "/watermelon/Public";

  option = {
        loadUrl : "<?php echo U('Index/ajax_load');?>",
        num: 100
    };
 
</script>
<script type="text/javascript" src="/watermelon/Public/js/photoViewer.js"></script>
</html>