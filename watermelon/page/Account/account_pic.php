<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心-个人资料</title>
	<?php include '../common/headerCSS.php'; ?>
	<?php include '../common/footerJS.php'; ?>
	<link rel="stylesheet" href="../../Public/css/account_nav.css">
	<link rel="stylesheet" href="../../Public/css/account_pic.css">
</head>
<body>
<?php include '../common/navbar.php'; ?>
<?php include '../common/account_navbar.php'; ?>
<br><br>
<div class="container">
	<div class="tnav">
		<nav class="anav">
			<ul class="anav_l">
				<li class="active"><a href="#">我的全部照片<span class="count"> 13</span></a></li>
				<li class="transition-all-03"><a class="transition-all-03" href="#">我喜欢的照片<span class="count"> 13</span></a></li>
			</ul>
		</nav>
	</div>
	<div class="all_pic">
		<a href="#"><img src="../../Public/img/account/pic1.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic2.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic3.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic4.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic5.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic6.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic7.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic8.jpg" alt=""></a>
		<a href="#"><img src="../../Public/img/account/pic9.jpg" alt=""></a>
	</div>
	<nav class="msgnav pull-right p-r-md">
		<ul class="pager">
			<li><a href="#">首页</a></li>
		    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		    <li class="disabled"><a href="#">1 <span class="sr-only">(current)</span></a></li>
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