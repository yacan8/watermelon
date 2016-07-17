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
    <link rel="stylesheet" href="/watermelon/Public/css/account_pic.css">
    <link rel="stylesheet" href="/watermelon/Public/css/photoViewer.css">
  	<link rel="stylesheet" href="/watermelon/Public/css/photo.css">


    <title>西瓜游-景点</title>
  <?php if(session('login') != $user_id) $self = 'TA'; else $self = '我'; ?>
</head>

<body>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">创建相册</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          
          <fieldset>
           <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">相册名</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="输入相册名">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-success btn-sm">创建</button>
        </div>
      </form>
    </div>
  </div>
</div>



    
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
          <div class="col-xs-12">
            <div class="m-t-sm">
              <a class="m-r-md font-16 tc-black" href="#"><?php echo ($self); ?>的相册(2)</a>
              <a class="font-16 tc-black" href="#"><?php echo ($self); ?>的旅游相片(15)</a>

              <a href="#" class="btn btn-sm btn-info pull-right  m-l-sm" data-toggle="modal" data-target="#myModal">+创建相册</a>
              <a href="#" class="btn btn-sm btn-success pull-right">上传相片</a>

            </div>
            <div class="m-t-md">
              <div class="photoCon"> 
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/6.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/1.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/2.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/3.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/4.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/5.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/7.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/8.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/9.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
  <div class="photoItem">
    <img src="http://img2.3lian.com/2014/f2/132/d/11.jpg">
    <div class="info">
      <a href="#">麦乐</a> 上传于 2016-2-4
    </div>
    <a href="javascript:void(0)" class="p_delete">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </div>
</div>
            </div>
           
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
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.scrollLoading.js"></script>
 
<script type="text/javascript" src="/watermelon/Public/js/photoViewer.js"></script>
<script type="text/javascript">
  var PUBLIC = "/watermelon/Public";

 $(function(){
  $('.pic_thumb').scrollLoading();


  $(".photoItem img").photoViewer({
        loadUrl : "<?php echo U('Index/ajax_load');?>",
        num: 100
   });
 })
</script>
</html>