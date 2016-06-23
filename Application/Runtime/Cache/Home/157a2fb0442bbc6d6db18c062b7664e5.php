<?php if (!defined('THINK_PATH')) exit();?>
<?php if(session('login') != $follow_id): if(!$bool): ?><a id="follow" class="follow" data-id='<?php echo ($follow_id); ?>' href="javascript:void(0)" title="添加关注"><span class="glyphicon glyphicon-plus"></span> 关注</a>
<?php else: ?>
<a id="follow" class="follow topic-type" data-id='<?php echo ($follow_id); ?>' href="javascript:void(0)" title="取消关注"> 取消关注</a><?php endif; endif; ?>