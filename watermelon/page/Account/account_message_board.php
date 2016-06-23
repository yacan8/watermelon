<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心-留言板</title>
	<?php include '../common/headerCSS.php'; ?>
	<?php include '../common/footerJS.php'; ?>
	<link rel="stylesheet" href="../../Public/css/account_nav.css">
	<link rel="stylesheet" href="../../Public/css/account_message_board.css">
	<script type="text/javascript" src="../../Public/js/account_message_board.js"></script>
</head>
<body>
<?php include '../common/navbar.php'; ?>
<?php include '../common/account_navbar.php'; ?>
<br><br>
<div class="container">
	<!-- 留言板输入 -->
	<div class="img">
		<span class="h3">留言板</span><br><br>
		<div class="msg_edit">
			<form class="form-inline" method="post">
				<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/defualt_msghead.png" alt=""></a></p>
				<div class="talk_edit">
					<p class="arrow"></p>
					<p class="arrow2"></p>
					<textarea placeholder="我来过，我想说....." name="content" class="msgboard_textarea" maxlen="500" minlen="2"></textarea>
					<div class="btm clearfix">
						<p class="pull-right fr">
							<input type="submit" class="button_liuyan" value="留言">
						</p>
						<p class="words">
							<span class="sum">0</span>/500字
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- 用户留言 -->
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<br>
	<div class="messages">
		<p class="talk_edit_face"><a href="#"><img src="../../Public/img/account/massage_head.png" alt=""></a></p>
		<div class="msg_user">
			<table class="msgtable">
				<tr><td><a href="#"><span class="tc-main name">烬、陌</span></a><br></td></tr>
				<tr><td><span class="tc-gray3 name">哈哈哈哈哈</span></td></tr>
				<tr><td><span class="tc-gray9" style="font-size:12px;">2016-01-01 14:22</span></td></tr>
			</table>
		</div>
	</div>
	<hr align="left" class="hr" style="width:688px;">
	<nav class="msgnav">
		<ul class="pager">
			<li><a href="#">首页</a></li>
		    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		    <li class="active"><a href="#">2 <span class="sr-only">(current)</span></a></li>
		    <li class="active"><a href="#">3 <span class="sr-only">(current)</span></a></li>
		    <li class="active"><a href="#">4 <span class="sr-only">(current)</span></a></li>
		    ...
			<li><a href="#">尾页</a></li>
		</ul>
	</nav>
</div>
<?php include '../common/footer.php'; ?>
</body>
</html>