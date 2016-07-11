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


    <?php if((CONTROLLER_NAME == 'Account') and (ACTION_NAME == 'topic')): ?><link rel="stylesheet" href="/watermelon/Public/css/topic.css"><?php endif; ?>


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
				<button class="btn btn-xs bg-main m-l-sm">
					<span class="glyphicon glyphicon-plus"></span> 加关注
				</button>
				<button class="btn btn-xs bg-main active m-l-sm">
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
	<li><a href="#">装备</a></li>
	<li><a href="#">话题</a></li>
	<li><a href="#">留言板</a></li>
	<li><a href="#">照片</a></li>
	<li><a href="#">我的消息 <span class="label label-info">5</span></a></li>
	<li class="last"><a href="#"><span class="glyphicon glyphicon-user"></span> 个人资料</a></li>
</ul>
        <div class="row">
          <div class="col-xs-9">
            <!-- <div class="dynamics-item bg-white border-gray-e m-b-sm">
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
 -->
            <!-- <div class="travelNote-item border-gray-e p-md bg-white m-b-md">
	<div class="media">
	    <div class="media-left">
	    	<a href="#"><img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="..."></a>
		</div>
	  	<div class="media-body">
	    	<h4 class="media-heading"><a class="tc-black" href="#">这是一个标题</a></h4>
		    <div class="info m-t-sm font-12">
		    	<a href="#" class="m-r-sm">这是一个昵称</a>
		    	<span class="m-r-sm">2015-2-4</span>
		    	<span class="m-r-sm la_item">成都</span>
		    </div>
		    <div class="m-t-sm travel_text">
		   	425大地震一周年之际，BBC播出了一系列追踪报道，着重展现重灾地区现状并批判了该国严重滞后的重建进程。 当画面切换到仍旧满目疮痍的Langtang村庄，小陶扭头问我：“你还记得这里么？”“当然，上一次我们还是坐在直升机里，还是飞行员告诉我们这里是被掩埋掉的Langtang。”当时以我的近视眼，往下望，只能看到一大堆黄土截断了一条河流。“Langtang就在那堆黄土之下。”飞行员看着我那
		   	</div>
		    <div class="m-t-sm over-h">
			   	<a class="travel_pic" href="#"><img src="http://image1.8264.com/forum/201605/31/191934bf17f7cc66b9q3c5.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/1929552y60qzq90jno6anj.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/193831l4r64xf9rtrl6l6s.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/194131763k6b4mom7cbeff.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/1942572gnkvvkn8kqxxxgp.jpg!t2w400h300"></a>
		    </div>


		    <div class="m-t-sm font-12 border-gray-b-e p-b-md m-b-xs">
		   		<span class="keywords">121</span>次浏览
		   		<span class="keywords m-l-md">121</span>次点赞
		    </div>
		</div>
	</div>





	<div class="media">
	    <div class="media-left">
	    	<a href="#"><img class="media-object media-img" src="/watermelon/Public/img/f2.png" alt="..."></a>
		</div>
	  	<div class="media-body">
	    	<h4 class="media-heading"><a class="tc-black" href="#">这是一个标题</a></h4>
		    <div class="info m-t-sm font-12">
		    	<a href="#" class="m-r-sm">这是一个昵称</a>
		    	<span class="m-r-sm">2015-2-4</span>
		    	<span class="m-r-sm la_item">成都</span>
		    </div>
		    <div class="m-t-sm travel_text">
		   	425大地震一周年之际，BBC播出了一系列追踪报道，着重展现重灾地区现状并批判了该国严重滞后的重建进程。 当画面切换到仍旧满目疮痍的Langtang村庄，小陶扭头问我：“你还记得这里么？”“当然，上一次我们还是坐在直升机里，还是飞行员告诉我们这里是被掩埋掉的Langtang。”当时以我的近视眼，往下望，只能看到一大堆黄土截断了一条河流。“Langtang就在那堆黄土之下。”飞行员看着我那
		   	</div>
		    <div class="m-t-sm over-h">
			   	<a class="travel_pic" href="#"><img src="http://image1.8264.com/forum/201605/31/191934bf17f7cc66b9q3c5.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/1929552y60qzq90jno6anj.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/193831l4r64xf9rtrl6l6s.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/194131763k6b4mom7cbeff.jpg!t2w400h300"></a>
			   	<a href="#" class="travel_pic"><img src="http://image1.8264.com/forum/201605/31/1942572gnkvvkn8kqxxxgp.jpg!t2w400h300"></a>
		    </div>


		    <div class="m-t-sm font-12 border-gray-b-e p-b-md">
		   		<span class="keywords">121</span>次浏览
		   		<span class="keywords m-l-md">121</span>次点赞
		    </div>
		</div>
	</div>



	<nav class="over-h">
	  <ul class="pagination pagination-sm pull-right">
	    <li>
	      <a href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	      </a>
	    </li>
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li>
	      <a href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
	    </li>
	  </ul>
	</nav>
</div> -->
            <div class="bg-white u-main p-md p-b-xs m-b-md border-gray-e">
<div class="u_title m-b-md p-b-sm border-gray-b-e">
  <?php echo ($self); ?>的话题
  <span class="pull-right  tc-gray9 font-12"><?php echo ($count); ?>个话题</span>
</div>
<div style="margin-top:-10px">
<?php if(count($List) != 0): if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="p-b-sm border-b m-b-sm">
  <div class="media media-container list">
    <a class="pull-left">
      <img class="media-object u_icon" src="<?php echo C('__DATA__');?>/login_thumb/<?php echo ((isset($vo["user_icon"]) && ($vo["user_icon"] !== ""))?($vo["user_icon"]):'default.jpg'); ?>" alt="..." >
    </a>
    <div class="media-body">
      <a href="<?php echo U('/t/'.$vo['t_id']);?>" class="media-heading" target="_blank"><?php echo ($vo["t_title"]); ?></a>
      <div class="media-content tc-gray9">
          <a href="<?php echo U('Topic/index',array('t'=>$vo['type_id']));?>" class="topic-type" target="_blank"><?php echo ($vo["type"]); ?></a>
          ·
          <?php echo ($vo["discuss_count"]); ?>个人在讨论
          ·
          <?php if($vo['top_user_nickname'] != ''): ?><a href="<?php echo U('/u/'.$vo['top_user_id'],'',false,false);?>"><?php echo ($vo["top_user_nickname"]); ?></a>
          ·
          <?php echo ($vo["update_time"]); ?>发表了新评论
          <?php else: ?>
          <?php echo ($vo["update_time"]); endif; ?>
          ·
          <?php echo ($vo["t_browse"]); ?>次浏览
      </div>
    </div>
  </div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<div class="text-center tc-gray9" style="height:210px;line-height:210px;">暂无话题</div><?php endif; ?>

<ul class="pager p-l-sm p-r-sm">
  <?php if($p != 1): ?><li class="previous" title="下一页"><a href="<?php echo U('Account/topic',array('id'=>$user_id,'p'=>$p-1));?>"><<</a></li><?php endif; ?>
  <?php if($p+1 <= $TotalPage): ?><li class="next" title="下一页"><a href="<?php echo U('Account/topic',array('id'=>$user_id,'p'=>$p+1));?>">>></a></li><?php endif; ?>
</ul>

</div>
</div>
          </div>

          <div class="col-xs-3">
            
            <h4>TA去过的城市</h4>
            <ul class="city_list">
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a><a href="#">哈尔滨</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f4.jpg"></a><a href="#">成都</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f2.png"></a><a href="#">桂林</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f3.jpg"></a><a href="#">咸阳</a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a><a href="#">深圳</a></li>
            </ul>

            <hr>
            <h4>
              TA的粉丝(25)
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
              TA的关注(25)
              <a class="font-12 tc-gray9 pull-right m-t-xs" href="#">>>更多</a>
            </h4>
            <ul class="img_list">
              <li><a href="#"><img src="/watermelon/Public/img/f5.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f4.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f3.jpg"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f2.png"></a></li>
              <li><a href="#"><img src="/watermelon/Public/img/f1.png"></a></li>
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
</html>