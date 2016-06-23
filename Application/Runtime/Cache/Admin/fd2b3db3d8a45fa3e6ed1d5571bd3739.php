<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/watermelon/Public/img/cl.ico" media="screen" />
    <!-- Bootstrap Core CSS -->
    <link href="/watermelon/Public/assets/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Social Buttons CSS -->
    <link href="/watermelon/Public/assets/sb-admin/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/watermelon/Public/assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- admin模板 CSS -->
    <link href="/watermelon/Public/assets/sb-admin/sb-admin-2.css" rel="stylesheet">
    <!-- admin模板 Fonts -->
    <link href="/watermelon/Public/assets/sb-admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- 后台CSS -->
    <!-- <link href="/watermelon/Public/css/backstage.css" rel="stylesheet"> -->
    <link href="/watermelon/Public/css/style.css" rel="stylesheet">
    <link href="/watermelon/Public/css/admin.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/watermelon/Public/assets/sb-admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/watermelon/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/watermelon/Public/assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- admin模板 Theme JavaScript -->
    <script src="/watermelon/Public/assets/sb-admin/sb-admin-2.js"></script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
    <script src="/watermelon/Public/js/admin/admin.js"></script>
	<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.scrollLoading.js"></script>
	<link rel="stylesheet" href="/watermelon/Public/assets/viewer/css/viewer.min.css">
	<script src="/watermelon/Public/assets/viewer/js/viewer.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.pic_thumb,.u_icon,.u_c_icon').scrollLoading();
		var options = {
        title:false,
        maxZoomRatio:1,
        url: 'data-original',
      };
      $('.images').viewer(options);
	})
	  

	</script>
	<title><?php echo ($title); ?></title>
</head>
<body>
	

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">西瓜游后台管理</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a><i class="fa fa-user fa-fw"></i> 用户</a>
                </li>
                <li><a href="<?php echo U('Login/outlogin');?>"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <form mothed="get" action="<?php echo U('News/search');?>">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="key" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    </form>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?php echo U('Index/index');?>"><i class="fa fa-home fa-fw"></i> 首页</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> 资讯<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo U('Infomation/index');?>"><i class="fa fa-hacker-news fa-fw"></i> 资讯管理</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Infomation/infomation');?>"><i class="fa fa-angle-right fa-fw"></i> 资讯发布</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo U('User/index');?>"><i class="fa fa-user fa-fw"></i> 用户查询</a>
                            <a href="<?php echo U('User/reg_s');?>"><i class="fa fa-bar-chart-o fa-fw"></i> 注册统计</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo U('Message/index');?>"><i class="fa fa-envelope-o fa-fw"></i> 消息管理</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

	<div id="page-wrapper">
	

	<div class="row">
		<div class="col-xs-12">
	        <h3 class="page-header">置顶新闻</h3>
	    </div>
		<?php if(is_array($UpList)): $i = 0; $__LIST__ = $UpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
	        <div class="infomation-item">
				<div class="infomation-img">
					<a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>"><img src="<?php echo ($vo["image"]); ?>"></a>
				</div>
				<h5 class="infomation-title to1"><a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></h5>
				<div class="m-t-sm tc-grap6 font-12">
					<?php echo ($vo["publish_time"]); ?>
					·
					<a href="<?php echo U('Infomation/index',array('contributor'=>$vo['user']['id']));?>"><?php echo ($vo["user"]["nickname"]); ?></a>
					·
					<?php echo ($vo["browse"]); ?>次浏览
					·
					<?php echo ($vo["comment_count"]); ?>个评论
				</div>
				<div class="m-t-sm">
					<a href="<?php echo U('Infomation/view',array('id'=>$vo['id']));?>" target="_blank" class="btn btn-xs btn-info m-r-sm">查看</a>
					<a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>" class="btn btn-xs btn-default m-r-sm">修改</a>
					<a href="<?php echo U('Infomation/uplinetoggle',array('id'=>$vo['id']));?>" class="btn btn-xs btn-warning m-r-sm">取消置顶</a>
					<a href="<?php echo U('Infomation/delete',array('id'=>$vo['id']));?>" class="btn btn-xs btn-danger m-r-sm" onclick="return confirm('确认删除吗？')">删除</a>
				</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>






		
	</div>
	<!-- / .row -->
		
		<div class="row">
			<div class="col-xs-12">
	        <h3 class="page-header"><a href="<?php echo U('Infomation/index');?>">列表</a></h3>
	    </div>
		
		<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
		        <div class="infomation-item">
					<div class="infomation-img">
						<a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>"><img src="<?php echo ($vo["image"]); ?>"></a>
					</div>
					<h5 class="infomation-title to1"><a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></h5>
					<div class="m-t-sm tc-grap6 font-12">
						<?php echo ($vo["publish_time"]); ?>
						·
						<a href="<?php echo U('Infomation/index',array('contributor'=>$vo['user']['id']));?>"><?php echo ($vo["user"]["nickname"]); ?></a>
						·
						<?php echo ($vo["browse"]); ?>次浏览
						·
						<?php echo ($vo["comment_count"]); ?>个评论
					</div>
					<div class="m-t-sm">
						<a href="<?php echo U('Infomation/view',array('id'=>$vo['id']));?>" target="_blank" class="btn btn-xs btn-info m-r-sm">查看</a>
						<a href="<?php echo U('Infomation/infomation',array('id'=>$vo['id']));?>" class="btn btn-xs btn-default m-r-sm">修改</a>
						<?php if($vo['state'] == '0'): ?><a href="<?php echo U('Infomation/uplinetoggle',array('id'=>$vo['id']));?>" class="btn btn-xs btn-success m-r-sm">置顶</a>
						<?php else: ?>
						<a href="<?php echo U('Infomation/uplinetoggle',array('id'=>$vo['id']));?>" class="btn btn-xs btn-warning m-r-sm">取消置顶</a><?php endif; ?>
						<a href="<?php echo U('Infomation/delete',array('id'=>$vo['id']));?>" class="btn btn-xs btn-danger m-r-sm" onclick="return confirm('确认删除吗？')">删除</a>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
	
<ul class="pagination pagination-sm">
  <?php echo ($page); ?>
</ul>
	</div>
</body>
</html>