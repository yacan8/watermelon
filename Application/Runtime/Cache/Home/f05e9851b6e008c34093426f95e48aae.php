<?php if (!defined('THINK_PATH')) exit();?><h4 class="m-l-xs">排行</h4>
<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['count'] != '0'): ?><div class="m-b-sm">
	    <div class="media media-container">
	      <a class="pull-left" href="<?php echo U('/u/'.$vo['id'],'',false,false);?>">
	        <img class="media-object u_icon hot" src="<?php echo C('__DATA__');?>/login_thumb/<?php echo ((isset($vo["icon"]) && ($vo["icon"] !== ""))?($vo["icon"]):'default.jpg'); ?>" alt="..." >
	      </a>
	      <div class="media-body tc-gray9">
	        <a href="<?php echo U('/u/'.$vo['id'],'',false,false);?>" class="media-heading"><?php echo ($vo["nickname"]); ?></a>
	        <div class="font-12">获得<?php echo ($vo["count"]); ?>次赞同</div>
	      </div>
	    </div>
	</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>