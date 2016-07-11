<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

	<link rel="stylesheet" href="/watermelon/Public/css/Index_t.css">
    <title>西瓜游-资讯</title>
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



    <div class="container m-t-md">
		<div class="row">
			<div class="col-xs-9">
				<!-- 头条 -->
				<div class="over-h t_f_con h-330">
					<a href="<?php echo U('Infomation/detail',array('id'=>$List[0]['id']));?>" class="t_m" style="background-image:url('<?php echo ((isset($List[0]["image"]) && ($List[0]["image"] !== ""))?($List[0]["image"]):"/watermelon/Public/img/default.jpg"); ?>')"></a>
					<h3 class="t p-l-md p-r-md"><?php echo ($List[0]["title"]); ?></h3>
				</div>
				
				<div class="t_s_con m-t-md h-170 m-b-lg ">
					<div class="t_s_i over-h h-170 w-354">
						<a href="<?php echo U('Infomation/detail',array('id'=>$List[1]['id']));?>" class="t_m" style="background-image:url('<?php echo ((isset($List[1]["image"]) && ($List[1]["image"] !== ""))?($List[1]["image"]):"/watermelon/Public/img/default.jpg"); ?>')"></a>
						<h4 class="t p-l-sm p-r-sm"><?php echo ($List[1]["title"]); ?></h4>
					</div>

					<div class="t_s_i over-h h-170 w-354">
						<a href="<?php echo U('Infomation/detail',array('id'=>$List[2]['id']));?>" class="t_m" style="background-image:url('<?php echo ((isset($List[2]["image"]) && ($List[2]["image"] !== ""))?($List[2]["image"]):"/watermelon/Public/img/default.jpg"); ?>')"></a>
						<h4 class="t p-l-sm p-r-sm"><?php echo ($List[2]["title"]); ?></h4>
					</div>
				</div>
				<!-- /头条 -->
				<!-- 列表 -->
				<div id = "list_container">
					<?php if(is_array($List)): $i = 0; $__LIST__ = array_slice($List,3,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="I_list m-t-md">
						<div class="t_s_i over-h h-140 w-220 pull-left m-r-md">
							<a href="<?php echo ($vo["url"]); ?>" style="background-image:url('<?php echo ((isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):"/watermelon/Public/img/default.jpg"); ?>')"></a>
						</div>
						<h4 class="l_t"><a href="<?php echo U('Infomation/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></h4>
						<div class="m-t-sm ">
							<div class="over-h">
								<div class="pull-left">
									<a href="<?php echo ($vo["url"]); ?>"><img class="i_u_i" src="<?php echo ((isset($vo["user"]["icon"]) && ($vo["user"]["icon"] !== ""))?($vo["user"]["icon"]):"/watermelon/Public/img/udefault.png"); ?>"></a>
								</div>
								<a href="#" class="m-l-xs tc-grayb"> <?php echo ($vo["user"]["nickname"]); ?></a>
								<span class="m-l-md tc-grayb l_h_25"><span class="iconfont icon-fabu"></span> <?php echo ($vo["publish_time"]); ?></span>

								<span class="m-l-md tc-grayb"><span class="iconfont icon-liulan"></span> <?php echo ($vo["browse"]); ?></span>

								<span class="m-l-md tc-grayb"><span class="iconfont icon-pinglun"></span> <?php echo ($vo["comment_count"]); ?></span>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<a id="loading" href="javascript:void(0)" class="btn-block p-md text-center m-t-sm bg-main">加载更多</a>
			</div>

			<div class="col-xs-3">
				<?php echo W('InfomationSidelist/side',array('count'=>8));?>
			</div>
		</div>

    </div>
    <br><br>
    
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
	var loading_url = "<?php echo U('Infomation/loading');?>";
	var PUBLIC = "/watermelon/Public";
</script>
<script type="text/javascript" src="/watermelon/Public/js/infomation.js"></script>
</html>