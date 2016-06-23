<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

	<link rel="stylesheet" href="/watermelon/Public/css/Index_t.css">
    <title><?php echo ($infomation["title"]); ?></title>
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
				<h3 class="m-b-md"><?php echo ($infomation["title"]); ?></h3>
				<div class="pull-left">
				<a href="#"><img class="i_u_i" src="<?php echo ((isset($infomation["user"]["icon"]) && ($infomation["user"]["icon"] !== ""))?($infomation["user"]["icon"]):"/watermelon/Public/img/udefault.png"); ?>"></a>
				</div>
				<a href="#" class="m-l-xs tc-grayb"> <?php echo ($infomation["user"]["nickname"]); ?></a>
				<span class="m-l-md tc-grayb l_h_25"><span class="iconfont icon-fabu"></span> <?php echo ($infomation["publish_time"]); ?></span>

				<span class="m-l-md tc-grayb"><span class="iconfont icon-liulan"></span> <?php echo ($infomation["browse"]); ?></span>

				<span class="m-l-md tc-grayb"><span class="iconfont icon-pinglun"></span> <?php echo ($infomation["comment_count"]); ?></span>
				<div class="img-center">
					<img src="<?php echo ((isset($infomation["image"]) && ($infomation["image"] !== ""))?($infomation["image"]):"/watermelon/Public/img/default.jpg"); ?>">
				</div>

				<div class="article-content m-b-lg">
					<?php echo ($infomation["content"]); ?>
	            </div>


	            <div class="c_area">
	            	<h4 class="b_main"><span class="b_border">发表评论</span></h4>
	            	<textarea class="form-control m-t-lg" id="saytext" name="saytext" placeholder="客官，8个字起评，不讲价哟" rows="5" style="resize: none; overflow-y: hidden;"></textarea>
					<a href="javascript:void(0)" data-loading-text="发表中..." id="addComment" class="m-t-md btn bg-main btn-md">发表评论</a>
					<div class="reply-container" style="position: relative;display: inline-block;vertical-align: middle;">
						
					</div>

					<span style="position: relative;display: inline-block;vertical-align: middle;" class="m-l-sm m-t-md tc-gray9 tag hidden">请回复一些有意义的信息，不健康的内容将很快被删除。</span>
	            </div>

	            <div class="c_container m-t-lg">
	            	<?php if($infomation['comment_count'] != 0): ?><h4 class="m-b-lg b_main"><span class="b_border">评论列表</span></h4>
		            	<!-- 评论列表 -->
		            	<div id="list_container">
		            	<?php if(is_array($CommentList)): $i = 0; $__LIST__ = $CommentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media">
							  <div class="media-left">
							    <a href="<?php echo ($vo["sender_url"]); ?>">
							      <img class="media-object c_u_icon" src="<?php echo ((isset($vo["sender_icon"]) && ($vo["sender_icon"] !== ""))?($vo["sender_icon"]):"/watermelon/Public/img/udefault.png"); ?>" >
							    </a>
							  </div>
							  <div class="media-body b_main">
							    <h5 class="media-heading">
							    	<a class="nickname_text" href="<?php echo ($vo["sender_url"]); ?>"><?php echo ($vo["sender_nickname"]); ?></a> <?php if($vo['receiver_id'] != ''): ?>回复了 <a href="<?php echo ($vo["receiver_url"]); ?>"><?php echo ($vo["receiver_nickname"]); ?></a><?php endif; ?> <span class="pull-right tc-gray9 font-12"><?php echo ($vo["time"]); ?></span>
							    </h5>
							    <p class="m-t-xs c-content">
							    <?php echo ($vo["content"]); ?>
								</p>
								<?php if(session('login') != $vo['sender_id']): ?><a class="reply-btn" href="javascript:void(0)" data-reply="<?php echo ($vo["sender_id"]); ?>"><span class="iconfont icon-pinglun"> </span> 回复</a><?php endif; ?>
							  </div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<?php if($infomation['comment_count'] > 4): ?><a id="comment_loading" href="javascript:void(0)" class="btn-block p-md text-center m-t-sm bg-main">加载更多</a>
						<?php else: ?>
						<a href="javascript:void(0)" class="btn-block p-md text-center m-t-sm bg-main">暂无更多评论</a><?php endif; ?>
						<!-- /评论列表 -->
						<?php else: ?>
						<h4 class="m-b-lg b_main"><span class="b_border">评论列表</span></h4>
						<div class="tc-gray9 text-center" style="height:200px;line-height:200px; background-color:#fcfcfc;">暂无评论</div><?php endif; ?>
	            </div>
			</div>
				


			<div class="col-xs-3">
				<div class="m-t-sm m-b-md">
					<h5 class="b_main m-b-md"><span class="b_border">分享</span></h5>
					<div class="operate">
	                    <!-- JiaThis Button BEGIN -->
	                    <a class="jiathis_button_weixin share-btn btn-success" title="分享到微信">
	                    	<i class="iconfont icon-weixin"></i>
	                    </a> 
	                    <a class="jiathis_button_cqq share-btn bg-qq" title="分享到QQ好友">
	                    	<i class="iconfont icon-qq"></i>
	                    </a> 
	                    <a class="jiathis_button_qzone share-btn bg-qq" title="分享到QQ空间">
	                    	<i class="iconfont icon-kongjian"></i>
	                    </a> 
	                    <a class="jiathis_button_tsina share-btn bg-weibo" title="分享到新浪微博">
	                    	<i class="iconfont icon-iconfontweibo"></i>
	                    </a>

	                    
	            
	                </div>
				</div>
				<?php echo W('InfomationSidelist/side',array('count'=>5));?>
				<!-- <div  id="side-list"> -->
					<!-- <h4 class="b_main m-b-lg"><span class="b_border">本文作者</span></h4>
					<div class="img-center"> -->
<!-- 						<a href="#"><img src="/watermelon/Public/img/default.jpg" class="author"></a>
						<h4 class="text-center"><a href="#">麦乐</a></h4>
						<div class="flex-row">
							<div class="text-center m-t-sm" style="width:50%">
								<a href="#">帖子：2</a>
							</div>
							<div class="text-center m-t-sm" style="width:50%">
								<a href="#">游记：5</a>
							</div>
							<div class="text-center m-t-sm" style="width:50%">
								<a >粉丝：0</a>
							</div>
							<div class="text-center m-t-sm" style="width:50%">
								<a href="#">资讯：12</a>
							</div>
						</div>
						<div class="m-t-sm text-center">
							<a href="#" class="btn bg-main btn-sm m-xs "><span class="glyphicon glyphicon-plus"> </span> 关注</a>
							 <a href="#" class="btn bg-main btn-sm m-xs"><span class="glyphicon glyphicon-ok"> </span> 已关注</a> 
						</div> -->

						
					<!-- </div> -->
				<!-- </div> -->
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
	var addComment_url = "<?php echo U('Comment/addComment');?>";
	var id  = <?php echo ($infomation["id"]); ?>;
	var loading_url = "<?php echo U('Comment/loading');?>";
	var PUBLIC = "/watermelon/Public";
</script>
<script type="text/javascript" src="/watermelon/Public/js/infomation.js"></script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
</html>