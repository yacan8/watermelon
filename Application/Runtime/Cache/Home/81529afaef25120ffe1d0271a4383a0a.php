<?php if (!defined('THINK_PATH')) exit(); if(session('?login')): ?><div class="m-lr-15 p-t-sm m-t-sm m-b-sm border-t">
    <a href="/cl/index.php/u/12">
      <img class="u_c_icon pull-left m-r-sm" src="<?php echo C('__DATA__');?>/login_thumb/<?php echo ((isset($userinfo["icon"]) && ($userinfo["icon"] !== ""))?($userinfo["icon"]):'default.jpg'); ?>" alt="...">
    </a>
    <a href="<?php echo U('/u/'.$userinfo['id']);?>" style="line-height:43px;"><?php echo ($userinfo["nickname"]); ?></a>
</div>
<div class="m-lr-15 p-b-sm m-t-xs">

    <div id="#foo"></div>
    <textarea name="content" class="to_input"></textarea>
    <div class="comment-op" style="display:block">
      <div class="m-t-sm over-h">
        <a href="javascript:void(0)" title="上传图片" class="btn btn-sm img_uploap" style="border: 1px solid #eee;">添加图片</a>
        <span class="m-l-sm tc-gray9 font-12">允许:jpg,jpeg,png,gif,最多添加9张</span>
        <button type='button' class="btn bg-main btn-sm pull-right submit-gj" data-loading-text="提交中..."  data-cid="0">提交</button>
      </div>
      <div class="upload-img-container "><ul class="images media-picture over-h"><ul></div>
      <input name="img[]" class="input" type="file" hidden="ture" accept="image/jpg,image/png,image/gif,image/jpeg" multiple="multiple">
    </div>
</div>
<?php else: ?>
<div class="m-t-md text-center m-b-md" style="font-size:16px;">
  <span class="tc-gray6">亲，评论需要先<a href="<?php echo U('Login/index');?>?url=<?php echo 'http://'.$_SERVER['SERVER_NAME']; ?>/watermelon/index.php/t/69.html"> 登录 </a>哦</span>
</div><?php endif; ?>