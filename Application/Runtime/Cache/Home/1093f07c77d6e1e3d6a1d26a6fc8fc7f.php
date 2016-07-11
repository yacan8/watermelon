<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

    <link rel="stylesheet" href="/watermelon/Public/css/topic.css?v=20160320">
    <link rel="stylesheet" href="/watermelon/Public/assets/viewer/css/viewer.min.css">
    <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/emoticons.css">
  <title>话题圈</title>
</head>

<body>

    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
      <form id="topic-publish" method="post" action='<?php echo U("Topic/addTopic");?>'>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">发表话题</h4>
        </div>
        <div class="modal-body">
          <div class="alert-container">

          </div>
          <div>
            <textarea name="title" class="form-control" placeholder="想一个可以吸引人的标题吧" rows="1" name="question_content" style="resize: none;"></textarea>
            <textarea name="content" class="form-control m-t-sm to_input" rows="4" placeholder="输入你想表达的内容" style="resize: none;"></textarea>
            <div class="m-t-sm comment-op">
              <a class="btn btn-xs emoji-index" href="javascript:void(0)">: )</a>
              
            </div>
            <div class="m-t-sm">
              <span class="select-topic">选择类型</span>
              <div class="m-t-sm over-h">
                <?php if(is_array($TypeList)): $i = 0; $__LIST__ = $TypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="publish-topic" href="javascript:void(0)" data-type="<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <input type="hidden" name="topic_type" value="" />
              </div>
              <div class="m-t-sm">
                <span class="select-topic">上传图片</span>
                <div class="comment-op" style="display:block">
                  <div class="m-t-sm upload-img-container"><ul class="images media-picture over-h"><ul></div>
                  <input name="img[]" class="input" type="file" hidden="ture" accept="image/jpg,image/png,image/gif,image/jpeg" multiple="multiple">
                  <div class="m-t-sm">
                    <button type="button" class="btn btn-sm btn-info img_uploap">添加图片</button>
                    <span class="tc-gray9 font-12 m-l-sm">允许:jpg,jpeg,png,gif,最多添加9张</span>
                  </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0)" class="btn" data-dismiss="modal">取消</a>
          <button type="button" data-loading-text="提交中..."  class="btn bg-main publish-submit">发表</button>
        </div>
      </div>
    </form>
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




    <div class="container m-t-sm">
            <div class="topic-container bg-white m-b-md">
                <div class="table-col topic-main">
                    <div class="border-b">
                      <a href="javascript:void(0)" class="pull-right topic-type-menu visible-xs" id="topic-type-menu">
                           <span class="glyphicon glyphicon-menu-hamburger"></span>
                         </a>
                         <a href="#" class="pull-right topic-type-menu visible-xs m-r-sm" data-toggle="modal" data-target="#myModal">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                         <span class="t_title"><span class="glyphicon glyphicon-stats"></span> 话题</span>
                         
                    </div>
                    <div class="border-b topic-type-container flex-row transition-all-03">
                        <a class="topic-item <?php if( $t =='' || $t == 0 ) echo "active"; ?>" href="<?php echo U('Topic/index');?>">全部</a>
                        <?php if(is_array($TypeList)): $i = 0; $__LIST__ = $TypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="topic-item <?php if($vo['id'] == $t ) echo "active"; ?>" href="<?php echo U('Topic/index',array('t'=>$vo['id']));?>"><?php echo ($vo["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="topic-list">
                        
<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="m-sm p-b-sm border-b">
  <div class="media media-container list">
    <a class="pull-left" href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo ($vo["user_nickname"]); ?>">
      <img class="media-object u_icon" src="/watermelon/Public/img/tloading.jpg" data-url="<?php echo C('__DATA__');?>/login_thumb/<?php echo ((isset($vo["user_icon"]) && ($vo["user_icon"] !== ""))?($vo["user_icon"]):'default.jpg'); ?>"  alt="..." >
    </a>
    <div class="media-body ">
      <a href="<?php echo U('/t/'.$vo['t_id']);?>" class="media-heading"><?php echo ($vo["t_title"]); ?></a>
      <a href="javascript:void(0)" class="pull-right font-12 out-hover uninterested">不感兴趣</a>
      <div class="media-content tc-gray9">
          <a  href="<?php echo U('Topic/index',array('t'=>$vo['type_id']));?>" class="topic-type"><?php echo ($vo["type"]); ?></a>
          ·
          <?php echo ($vo["discuss_count"]); ?>个人在讨论
          ·
          <?php if($vo['top_user_nickname'] != ''): ?><a href="<?php echo U('/u/'.$vo['top_user_id'],'',false,false);?>"><?php echo ($vo["top_user_nickname"]); ?></a>
          ·
          <?php echo ($vo["update_time"]); ?>发表了新评论
          ·
          <?php else: ?>
          <?php echo ($vo["update_time"]); ?>
          ·<?php endif; ?>
          <?php echo ($vo["t_browse"]); ?>次浏览
      </div>
      <?php echo W('TopicImg/TopicImg',array('type'=>'1','id'=>$vo['t_id']));?> 
      <div class="media-op m-t-xs">
          <?php echo W('TopicZan/TopicZan',array('type'=>'1','id'=>$vo['t_id'],'zan_count'=>$vo['t_zan']));?>
          <a class="op-group-item i_reply" href="javascript:void(0)"><span title="评论" class="iconfont icon-pinglun"> <?php echo ($vo["comment_count"]); ?></span></a>
          <div class="btn-group pull-right share_click">
            <a href="javascript:void(0)" class="dropdown-toggle op-group-item" data-toggle="dropdown" aria-expanded="false"><span title="评论" class="glyphicon glyphicon-share"> </span> 分享</a>
            <ul class="dropdown-menu">
              <li><a class="jiathis_button_cqq" href="javascript:void(0)"><span class="iconfont icon-qq"> </span>QQ</a></li>
              <li><a class="jiathis_button_weixin" href="javascript:void(0)"><span class="iconfont icon-weixin"> </span>微信</a></li>
              <li><a class="jiathis_button_qzone" href="javascript:void(0)"><span class="iconfont icon-qzone"> </span>QQ空间</a></li>
              <li><a class="jiathis_button_tsina" href="javascript:void(0)"><span class="iconfont icon-weibo"> </span>微博</a></li>
            </ul>
          </div>
      </div>
      <div class="replay-container">
        <?php if(is_array($vo['comment_list'])): $i = 0; $__LIST__ = $vo['comment_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><div class="m-t-sm"><div class="media media-container"><a class="pull-left" href="<?php echo ($cvo["sender_url"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo ($cvo["sender_nickname"]); ?>" data-original-title="游客1"><img class="media-object u_c_icon" src="/watermelon/Public/img/tloading.jpg" data-url="<?php echo ($cvo["sender_icon"]); ?>" alt="..."></a><div class="media-body"><a href="<?php echo ($cvo["sender_url"]); ?>" class="media-heading a_user"><?php echo ($cvo["sender_nickname"]); ?></a> - <span class="font-12 tc-gray9"><?php echo ($cvo["time"]); ?></span><div class="m-b-sm line-h22"><?php echo ($cvo["content"]); ?> 
            <?php if($cvo['picture_count'] != '0'): $__FOR_START_22705__=0;$__FOR_END_22705__=$cvo['picture_count'];for($i=$__FOR_START_22705__;$i < $__FOR_END_22705__;$i+=1){ ?><span class="glyphicon glyphicon-picture"> </span>&nbsp;<?php } endif; ?>
          </div></div></div></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if($vo['comment_count'] > 4): ?><a href="<?php echo U('/t/'.$vo['t_id']);?>" class="more-btn">更多..</a><?php endif; ?>

      </div>


    </div>


  </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>





                    </div>
                    
                        <ul class="pager p-l-sm p-r-sm">
                          <?php if($p != 1): ?><li class="previous" title="下一页"><a href="<?php echo U('Topic/index',array('p'=>$p-1,'t'=>$t));?>"><<</a></li><?php endif; ?>
                          <?php if($p+1 <= $TotalPage): ?><li class="next" title="下一页"><a href="<?php echo U('Topic/index',array('p'=>$p+1,'t'=>$t));?>">>></a></li><?php endif; ?>
                        </ul>
                    
                </div>
                <div class="table-col t_u_t_c hidden-xs">
                    <a href="#" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#myModal">
                      <span class="glyphicon glyphicon-edit"></span> 发表话题
                    </a>
                    
                    <?php echo W('TopicUserHot/hotUser');?>
                    
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
  var zan_url = '<?php echo U("TopicZan/AjaxZan",'',false,false);?>';
  var DATAPATH = "<?php echo C('__DATA__');?>";
  var login_state = <?php if(session('?login')): ?>true<?php else: ?>false<?php endif; ?>;
  var img_uploap_url = '<?php echo U("Topic/addTopicUpload",'',false,false);?>';
  var PUBLIC = "/watermelon/Public";
  var login_url = "<?php echo U('Login/index');?>";
  var this_url = window.location.href;
</script>



<script type="text/javascript" src="/watermelon/Public/assets/viewer/js/viewer.min.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.scrollLoading.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.cursor.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/exif/js/exif.min.js"></script>
<script type="text/javascript" src="/watermelon/Public/js/topic.js"></script>

<script type="text/javascript" src="/watermelon/Public/js/topic.i-d.js"></script>
<script type="text/javascript" src="/watermelon/Public/js/emoji.js"></script>



<script type="text/javascript">
  $(function(){

    <?php if(session('?message')): if(session("message") == "200"): ?>$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"> </span>', message : '发表成功'});
      <?php else: ?>
      $.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"> </span>', message : '<?php echo session('message') ?>'});<?php endif; ?>
    <?php session('message',null); endif; ?>
  })

</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
</html>