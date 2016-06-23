<?php if (!defined('THINK_PATH')) exit();?>
	<?php if($type == 2): if(!$bool): ?><a id="collection" class="btn btn-info pull-right btn-sm collection" href="javascript:void(0)">收藏</a>
		<?php else: ?>
			<a id="collection" class="btn btn-default pull-right btn-sm collection" href="javascript:void(0)">取消收藏</a><?php endif; endif; ?>