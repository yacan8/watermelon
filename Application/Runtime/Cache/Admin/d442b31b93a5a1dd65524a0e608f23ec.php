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
	
  <!-- css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/froala_editor.min.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/froala_style.min.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/code_view.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/colors.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/image.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/table.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/char_counter.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/video.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/themes/red.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <!-- js -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/languages/zh_cn.js"></script>
  <script type="text/javascript">
  $(function(){
    $('textarea').froalaEditor({
      heightMin: 200,
      imageUploadURL: '<?php echo U('Upload/upload');?>',
      language: 'zh_cn',
      pasteDeniedAttrs: ['class', 'id','style']
    });
    $("a[href='https://froala.com/wysiwyg-editor']").remove();
  })


  </script>


	<div class="row margin-bottom">
		<div class="col-xs-12">
	        <h3 class="page-header">发布资讯</h3>
	    </div>

	</div>
	<!-- / .row -->

	
		<form class="form-horizontal" id='new-form' method="post" action="<?php echo U('Infomation/save',array('id'=>$detail['id']));?>" enctype="multipart/form-data">
      <div class="form-group">
        <label class="col-sm-1 control-label">标题</label>
        <div class="col-sm-11">
            <input type="text" class="form-control" id="title" name="title" placeholder="输入标题" value="<?php echo ($detail["title"]); ?>" required />
        </div>

      </div>




<div class="form-group">
    <label class="col-sm-1 control-label">内容</label>
    <div class="col-sm-11">
        <textarea name="content" class="form-control"><?php echo ($detail["content"]); ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">图片</label>


    <?php if($change != 1): ?><div class="col-sm-11">
        <img id="file-img" class="img-thumbnail" alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTJmMzFiNjE5ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MmYzMWI2MTllIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" style="width: 200px; height: 150px;">
        <input name="file" type="file" id="file" style="display:none" />
        <button type="button" class="btn btn-default btn-sm btn-file">浏览</button>
    </div>
    <?php else: ?>
    <div class="col-sm-11">
        <img id="file-img" class="img-thumbnail" alt="" src="<?php echo ($detail["image"]); ?>" style="width: 200px; height: 150px;">
        <input name="file" type="file" id="file" style="display:none" requried/>
        <button type="button" class="btn btn-default btn-sm btn-file">浏览</button>
    </div><?php endif; ?>
</div>
<div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
        <button type="submit" class="btn btn-success btn-sm">提交</button>
    </div>
</div>
</form>


	</div>
</body>
</html>