<?php if (!defined('THINK_PATH')) exit();?><div class="over-h">
	<div class="side_t m-b-md">热点</div>
	<!-- 侧栏列表 -->
	<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="m-t-md b_b p-b-sm over-h">
		<div class="t_s_i over-h m-b-sm w-220 h-140 "> 
			<a href="<?php echo U('Infomation/detail',array('id'=>$vo['id']));?>" style="background-image:url('<?php echo C('__DATA__');?>/<?php echo ((isset($vo["image_thumb"]) && ($vo["image_thumb"] !== ""))?($vo["image_thumb"]):"Infomation/default.jpg"); ?>')"></a>
		</div>
		<span class="l_t"><a href="<?php echo U('Infomation/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></span>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!-- /侧栏列表 -->
</div>