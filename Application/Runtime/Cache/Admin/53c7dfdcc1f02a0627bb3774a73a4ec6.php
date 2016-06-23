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
		<div class="col-xs-12 m-t-md">
			<ul class="topic-sections">
				<li <?php if($select == 't'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Topic/index');?>">话题</a></li>
				<li <?php if($select == 'c'): ?>class="active"<?php endif; ?>><a href="<?php echo U('TopicComment/index');?>">评论及回复</a></li>
			</ul>
		</div>
		<?php if($userinfo != ''): ?><div class="col-xs-12 m-t-md">
				<a href="<?php echo U('Topic/index');?>" class='m-r-sm'>全部</a>
				<a class='m-r-sm tc-gray6'><?php echo ($userinfo["nickname"]); ?> </a>
			</div><?php endif; ?>
		<div class="col-xs-12 m-t-md">
			<div class="topic-container">
				
				<?php if($select == 't'): if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="topic-item">
					<div class="media">
				      <div class="media-left">
				        <a href="<?php echo U('Topic/index',array('user_id'=>$vo['userinfo']['id']));?>">
				          <img class="media-object"  src="<?php echo ($vo["userinfo"]["icon"]); ?>" style="width: 36px; height: 36px;">
				        </a>
				      </div>
				      <div class="media-body">
				        <div><?php echo ($vo["title"]); ?></div>
				        <div class="m-t-xs font-12">
				        	<?php if(is_array($vo["type"])): $i = 0; $__LIST__ = $vo["type"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($i % 2 );++$i;?><span class="topic-type"><?php echo ($tvo["type"]); ?></span> 
				        	·<?php endforeach; endif; else: echo "" ;endif; ?>
				        	<a href="<?php echo U('Topic/index',array('user_id'=>$vo['userinfo']['id']));?>"><?php echo ($vo["userinfo"]["nickname"]); ?></a> 
				        	· 
				        	<?php echo ($vo["time"]); ?>
				        	· 
				        	<?php echo ($vo["browse"]); ?>次浏览
				        </div>
				        <?php echo W('Admin/TopicImg/TopicImg',array('type'=>'1','id'=>$vo['id']));?> 
				      	<div class="m-t-xs">
							<a href="<?php echo U('/t/'.$vo['id']);?>" target="_blank" class="btn btn-xs btn-info m-r-sm">查看</a>
							<a href="<?php echo U('Topic/delete',array('id'=>$vo['id'],'type'=>$select));?>" class="btn btn-xs btn-danger m-r-sm" onclick="return confirm('确认删除吗？')">删除</a>
						</div>

				      </div>



				    </div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php else: ?>
					

<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="topic-item">
		<div class="media">
	      <div class="media-left">
	        <a href="<?php echo U('TopicComment/index',array('user_id'=>$vo['userinfo']['id']));?>">
	          <img class="media-object" src="<?php echo ($vo["userinfo"]["icon"]); ?>" style="width: 36px; height: 36px;">
	        </a>
	      </div>
	      <div class="media-body">
	        <div>
	        	在话题<a href="<?php echo U('/t/'.$vo['topic']['id']);?>" target="_blank"><?php echo ($vo["topic"]["title"]); ?></a>发表：
	        	<br><?php echo ($vo["content"]); ?>

	        </div>
	        <div class="m-t-xs font-12">
	        	
	        	<a href="<?php echo U('TopicComment/index',array('user_id'=>$vo['userinfo']['id']));?>"><?php echo ($vo["userinfo"]["nickname"]); ?></a> 
	        	· 
	        	<?php echo ($vo["time"]); ?>
	        </div>
	        <?php echo W('Admin/TopicImg/TopicImg',array('type'=>'2','id'=>$vo['id']));?> 
	      	<div class="m-t-xs">
				<a href="<?php echo U('TopicComment/view',array('id'=>$vo['id']));?>" target="_blank" class="btn btn-xs btn-info m-r-sm">查看</a>
				<a href="<?php echo U('Topic/delete',array('id'=>$vo['id'],'type'=>$select));?>" class="btn btn-xs btn-danger m-r-sm" onclick="return confirm('确认删除吗？')">删除</a>
			</div>

	      </div>



	    </div>
	</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>



				


				<ul class="pagination pagination-sm m-t-lg">
      				<?php echo ($page); ?>
      			</ul>



			</div>
		</div>
	


		
	</div>
	
		
	
	</div>
</body>
</html>