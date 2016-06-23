<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/watermelon/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/watermelon/Public/css/nav.css">
    <link rel="stylesheet" href="/watermelon/Public/css/footer.css">
    <link rel="stylesheet" href="/watermelon/Public/css/style.css">

    <link rel="stylesheet" href="/watermelon/Public/css/topic.css?v=20160320">
    <link rel="stylesheet" href="/watermelon/Public/assets/viewer/css/viewer.min.css">
    
    
    <title><?php echo ($topic["title"]); ?></title>
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



    <div class="container m-t-sm m-b-sm">
            <div class="topic-container bg-white m-b-md">
                <div class="table-col topic-main">
                    <div class="m-lr-15 m-b-md" style="position: relative;">
                      <div class="tt-container">
                        <a class="topic-item topic-type" href="<?php echo U('Topic/index');?>">全部</a>
                        <?php if(is_array($TypeList)): $i = 0; $__LIST__ = $TypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="topic-item topic-type" href="<?php echo U('Topic/index',array('t'=>$vo['id']));?>"><?php echo ($vo["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>
                      <?php echo W('Collection/collection',array('collected'=>$topic['id'],'type'=>2));?>
                    </div>
                    <div class="t_title border-b ">
                      <?php echo ($topic["title"]); ?>
                    </div>
                    <div class="m-lr-15 m-t-sm line-h22">
                      <?php echo ($topic["content"]); ?>
                    </div>
                    <div class="m-lr-15 m-t-sm over-h">
                      <?php echo W('TopicImg/TopicImg',array('type'=>'1','id'=>$topic['id']));?>
                    </div>
                    <div class="tc-gray9 p-b-sm m-t-sm m-lr-15 font-12 border-b">
                      <?php echo ($topic["time"]); ?>
                      ·
                      <?php echo ($topic["browse"]); ?>次浏览
                      ·
                      <a href="<?php echo U('/u/'.$topic['user']['id'],'',false,false);?>"><?php echo ($topic["user"]["nickname"]); ?></a> 
                      · 
                      <?php echo W('Attention/follow',array('follow_id'=>$topic['user']['id']));?>
                    </div>
                    <div class="p-lr-15 m-t-sm m-b-sm media-op">
                        <?php echo W('TopicZan/TopicZan',array('type'=>'1','id'=>$topic['id'],'zan_count'=>$topic['zan_count']));?>
                        
                        <a id="a_c_p" class="op-group-item m-r-sm" href="javascript:void(0)"><span title="评论" class="iconfont icon-pingjia"></span> 添加评论</a>
                        <div class="btn-group ">
                          <a href="javascript:void(0)" class="dropdown-toggle op-group-item" data-toggle="dropdown" aria-expanded="false"><span title="评论" class="glyphicon glyphicon-share"> </span> 分享</a>
                          <ul class="dropdown-menu">
                            <li><a class="jiathis_button_cqq" href="javascript:void(0)"><span class="iconfont icon-qq"> </span>QQ</a></li>
                            <li><a class="jiathis_button_weixin" href="javascript:void(0)"><span class="iconfont icon-weixin"> </span>微信</a></li>
                            <li><a class="jiathis_button_qzone" href="javascript:void(0)"><span class="iconfont icon-qzone"> </span>QQ空间</a></li>
                            <li><a class="jiathis_button_tsina" href="javascript:void(0)"><span class="iconfont icon-weibo"> </span>微博</a></li>
                          </ul>
                        </div>
                        <div class="pull-right report">
                        <a class="op-group-item" href="#"><span title="评论" class="glyphicon glyphicon-floppy-remove"> </span> 举报</a></div>
                    </div>
                    <div class="m-lr-15 add-comment">
                      <div class="panel panel-default">
                        <div class="panel-body">
                        
                          <textarea class="form-control to_input" rows="1"  type="text" placeholder="你想说些什么吗。。。"></textarea>
                          <div class="comment-op">
                            <div class="text-right m-t-sm">
                              <a class="btn pull-left btn-sm emoji m-r-xs" href="javascript:void(0)"  style="border: 1px solid #eee;">: )</a>
                              <a href="javascript:void(0)" title="上传图片" class="pull-left btn btn-sm img_uploap" style="border: 1px solid #eee;"><span class="glyphicon glyphicon-picture"></span></a>
                              <a class="btn btn-info btn-sm c-submit" data-cid="0" data-loading-text="提交中..." href="javascript:void(0)">评论</a>
                              <a class="btn btn-default btn-sm c_close" href="javascript:void(0)">取消</a>
                            </div>
                            <div class="upload-img-container "><ul class="images media-picture over-h"><ul></div>
                            <input name="img[]" class="input" type="file" hidden="ture" accept="image/jpg,image/png,image/gif,image/jpeg" multiple="multiple">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="p-lr-15 border-b m-t-md m-b-md">
                      <div class="text-right" style="margin-bottom: -2px;"><span class="font-16 pull-left"><?php echo ($topic["comment_count"]); ?>个评论</span>
                        <!-- 排序 -->
                        <?php if($sort_type == 'hot'): ?><a class="sort active" href="javascript:void(0)">最热 <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <?php else: ?>
                        <a class="sort" href="<?php echo U('Topic/detail',array('id'=>$topic['id'],'sort_type'=>'hot'));?>">最热 <span class="glyphicon glyphicon-chevron-down"></span></a><?php endif; ?>

                        <?php if($sort_type == 'time_up'): ?><a class="sort active" href="<?php echo U('Topic/detail',array('id'=>$topic['id'],'sort_type'=>'time_down'));?>">时间 <span class="glyphicon glyphicon-chevron-up time"></span></a>

                        <?php elseif($sort_type == 'time_down'): ?>
                        <a class="sort active" href="<?php echo U('Topic/detail',array('id'=>$topic['id'],'sort_type'=>'time_up'));?>">时间 <span class="glyphicon glyphicon-chevron-down time"></span></a>
                        <?php else: ?>
                        <a class="sort" href="<?php echo U('Topic/detail',array('id'=>$topic['id'],'sort_type'=>'time_down'));?>">时间 <span class="glyphicon glyphicon-chevron-down time"></span></a><?php endif; ?>
                        <!-- /排序 -->
                      </div>
                    </div>




                    <div class="m-lr-15 p-b-sm m-t-sm">

                        <?php if(count($CommentList) != 0): if(is_array($CommentList)): $i = 0; $__LIST__ = $CommentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media media-container list">
  <a class="pull-left" href="<?php echo U('/u/'.$vo['sender_id'],'',false,false);?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo ($vo["sender_nickname"]); ?>">
    <img class="media-object u_c_icon" src="<?php echo ($vo["sender_icon"]); ?>" alt="..." >
  </a>
  <div class="media-body">
    <div class="c<?php echo ($vo["c_id"]); ?>">
      <a href="<?php echo U('/u/'.$vo['sender_id'],'',false,false);?>" class="media-heading a_user"><?php echo ($vo["sender_nickname"]); ?></a> - <span class="font-12 tc-gray9"><?php echo ($vo["time"]); ?></span>
      
      <div class="comment-content">
          <?php echo ($vo["content"]); ?>
      </div>
      <div class="m-t-xs over-h">
        <?php echo W('TopicImg/TopicImg',array('type'=>'2','id'=>$vo['c_id']));?> 
      </div>
    </div>
    <div class="media-op m-t-xs">
        <?php echo W('TopicZan/TopicZan',array('type'=>'2','id'=>$vo['c_id'],'zan_count'=>$vo['zan']));?>
        
        <a class="op-group-item i_reply" href="javascript:void(0)"><span title="评论" class="iconfont icon-pinglun">  <?php echo count($vo['reply']); ?></span></a>

    </div>






    <!-- 回复 -->
    <div class="replay-container">

      <!-- 回复item -->
      <?php if(is_array($vo['reply'])): $i = 0; $__LIST__ = $vo['reply'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rvo): $mod = ($i % 2 );++$i;?><div class="m-t-sm c<?php echo ($rvo["c_id"]); ?>">
        <div class="media media-container border-b">
          <a class="pull-left" href="<?php echo U('/u/'.$rvo['sender_id'],'',false,false);?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo ($rvo["sender_nickname"]); ?>">
            <img class="media-object u_c_icon" src="<?php echo ($rvo["sender_icon"]); ?>" alt="..." >
          </a>
          <div class="media-body">
            <?php if(session('login') != $rvo['sender_id']): ?><a href="javascript:void(0)" data-user="<?php echo ($rvo["sender_id"]); ?>" class="pull-right font-12 m-t-xs m-l-sm replay-to">回复</a><?php endif; ?>
            <a href="<?php echo U('/u/'.$rvo['sender_id'],'',false,false);?>" class="media-heading a_user"><?php echo ($rvo["sender_nickname"]); ?></a> - <span class="font-12 tc-gray9"> <?php echo ($rvo["time"]); ?></span>
            
            <div class="m-b-sm line-h22">
                 <?php echo ($rvo["content"]); ?>
            </div>
          </div>
        </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <!-- /回复item -->

    </div>
    <!-- /回复 -->

    <!-- 回复input -->
    <div class="replay-input m-t-sm" style="display:none">
        <div class="panel panel-default border-no shadow-no">
          <div class="panel-body p-no">
            <textarea class="form-control to_input"  type="text" placeholder="你想说些什么吗。。。" rows = 1></textarea>
            <div class="text-right m-t-sm comment-op">
              <a class="btn pull-left btn-sm emoji m-r-xs" href="javascript:void(0)"  style="border: 1px solid #eee;">: )</a>
  
              <a class="btn btn-info btn-sm c-submit" data-cid='<?php echo ($vo["c_id"]); ?>' data-loading-text="提交中..." href="javascript:void(0)">评论</a>
              <a class="btn btn-default btn-sm c_close" href="javascript:void(0)">取消</a>
              
            </div>
          </div>
        </div>
    </div>
    <!-- /回复input -->

  </div>


  
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<?php else: ?>
<div class="text-center tc-gray9" style="height:200px;font-size:16px;line-height:173px;background:#fff;">
    <span class="tc-gray9">暂无评论</span>
</div><?php endif; ?>

                    </div>


                    <ul class="pager p-l-sm p-r-sm">
                      <?php if($p != 1): ?><li class="previous" title="下一页"><a href="<?php echo U('Topic/detail',array('p'=>$p-1,'id'=>$topic['id'],'sort_type'=>$sort_type));?>"><<</a></li><?php endif; ?>
                      <?php if($p+1 <= $TotalPage): ?><li class="next" title="下一页"><a href="<?php echo U('Topic/detail',array('p'=>$p+1,'id'=>$topic['id'],'sort_type'=>$sort_type));?>">>></a></li><?php endif; ?>
                    </ul>


                    <?php echo W('Edit/edit');?>



                </div>










                

                <div class="table-col t_u_t_c hidden-sm hidden-xs">
            <?php echo W('TopicUserHot/hotUser');?>

                    
                </div>
            </div>

  
    </div>
    <form action="<?php echo U('TopicComment/addComment',array('p'=>$p,'sort_type'=>'time_up'));?>" method="post" id="submit-form">
      <input type="hidden" name="topic_id" value="<?php echo ($topic["id"]); ?>" />
      <input type="hidden" name="comment_id" value="" />
      <input type="hidden" name="imgStr" value="" />
      <input type="hidden" name="content" value="" />
    </form>
    
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
<script type="text/javascript">
  var follow_url = '<?php echo U("Attention/AjaxAttention",'',false,false);?>';
  var collect_url = '<?php echo U("Collection/AjaxCollecting",'',false,false);?>';
  var zan_url = '<?php echo U("TopicZan/AjaxZan",'',false,false);?>';
  var topic_id = <?php echo ($topic["id"]); ?>;
  var login_state = <?php if(session('?login')): ?>true<?php else: ?>false<?php endif; ?>;
  var img_uploap_url = '<?php echo U("Topic/addTopicUpload",'',false,false);?>';
  var PUBLIC = "/watermelon/Public";
  var login_url = "<?php echo U('Login/index');?>";
  var this_url = window.location.href;
</script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.min.js"></script>
    <script src="/watermelon/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
<?php if(session('?login')): ?><!-- css -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/froala_editor.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/froala_style.css">
  <link rel="stylesheet" href="/watermelon/Public/assets/froalaeditor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <!-- js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/froala_editor.min.js" ></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="/watermelon/Public/assets/froalaeditor/js/languages/zh_cn.js"></script>
  <script type="text/javascript">
  $(function(){
    $('textarea[name="content"]').froalaEditor({
      placeholderText: '亲，说说你的看法吧^_^',
      heightMin: 200,
      language: 'zh_cn',
      pasteDeniedAttrs: ['class', 'id','style'],
      toolbarButtons: ['bold', 'italic', 'underline',  '|', 'formatOL', '|', 'insertLink', 'emoticons','undo']
    });

    $("a[href='https://froala.com/wysiwyg-editor']").remove();
    
  })

  </script><?php endif; ?>
<script type="text/javascript" src="/watermelon/Public/assets/viewer/js/viewer.min.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.toaster.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.scrollLoading.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/jquery/js/jquery.cursor.js"></script>
<script type="text/javascript" src="/watermelon/Public/assets/exif/js/exif.min.js"></script>

<script type="text/javascript" src="/watermelon/Public/js/topic.detail.js"></script>
<script type="text/javascript" src="/watermelon/Public/js/topic.i-d.js"></script>
<script type="text/javascript" src="/watermelon/Public/js/emoji.js"></script>

<script>
    var DATAPATH = "<?php echo C('__DATA__');?>";
    var PUBLIC = '/watermelon/Public';
    var page = 1;
    $(function () {
      var hash = window.location.hash;
      if(hash!=''){
        var c = hash.substr(1);
        var o = $('.'+c);
        o.addClass('bg-main-40');
        setTimeout(function(){
          $("html,body").animate({scrollTop:o.offset().top-100},200);
        },300);
      }
      


      $('.pic_thumb,.u_icon,.u_c_icon').scrollLoading();
      $('[data-toggle="tooltip"]').tooltip();
      $("#topic-type-menu").click(function(e) {
        var ob = $(".topic-type-container");
        ob.toggleClass('active');
      });


      

      $(document).on('click',".c_close",function(e) {
        // 评论处理回复
        var _self = $(this);
        var obj = _self.parents(".replay-input");
        var text = obj.find('.to_input').val();
        $(this).parents('.comment-op').fadeOut('fast');
        obj.find('.to_input').val('');
        _self.parents('.comment-op').siblings('.to_input').attr('rows',1);
        // 添加评论处理
        var c_obj = $('.add-comment');
        c_obj.fadeOut('fast').find('.comment-op').fadeOut('fast');
      });

      $("#a_c_p").click(function(e) {
        $(".add-comment").fadeToggle('fast');
      });

      $(document).on('click',".replay-to",function(e) {
        var _self = $(this);
        var _user = _self.attr('data-user');
        var reply_to_name = _self.siblings(".a_user").html();
        var obj = _self.parents(".replay-container").siblings('.replay-input');
        var input = obj.find(".to_input");
        var text = input.val();
        var reply_text = "@["+_user+"]"+reply_to_name+":";
        input.val(reply_text+'');
        obj.fadeIn('fast');
        $("html,body").animate({scrollTop:obj.offset().top-100},200);
        input.focus();
      });
      $(document).on('click',".i_reply",function(e) {
        var _self = $(this);
        var obj = _self.parents(".media-container").find('.replay-input');
        _self.toggleClass('active');
        _self.parents(".media-container.list").find(".replay-container").fadeToggle('fast');
        obj.fadeToggle('fast');
        // $("html,body").animate({scrollTop:obj.offset().top-100},500);
      });
      $(".i_reply").each(function(index, el) {
        var count = $(this).find('.iconfont.icon-pingjia').html();
        if(count!=' 0')
          $(this).click();
      });
    })

  var options = {
    title:false,
    maxZoomRatio:1,
    url: 'data-original',
  };

  $('.images').viewer(options);

    </script>


<script type="text/javascript">
  $(function(){
    <?php if(session('?message')): if(session("message") == "200"): ?>$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"> </span>', message : '发表成功'});
      <?php else: ?>
      $.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"> </span>', message : '<?php echo session('message') ?>'});<?php endif; ?>
    <?php session('message',null); endif; ?>
  })
var jiathis_config = {
    summary:' ',
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
</html>