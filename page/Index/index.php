<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Public/css/nav.css">
    <link rel="stylesheet" href="../../Public/css/footer.css">
    <link rel="stylesheet" href="../../Public/css/style.css">
    <link rel="stylesheet" href="../../Public/css/index.css">
    <!-- <link rel="stylesheet" href="../../Public/css/trangle.css"> -->
	<title>首页</title>
    
</head>
<body class="bg-gray-f6">
	
<!-- header部分 -->
<?php
   include "../common/navbar.php";
?> 

<div class="banner">
    <div class="back-img">
        <div class="back-text p-md">
            <h1 class="p-b-md">你好，中国！</h1>
            <div class="center-text">
                <span class="glyphicon glyphicon-search pull-right"></span>
                <input class="p-xs" type="text" placeholder="搜索省份、城市、目的地"></input>
                <ul class="hot-cities ">
                    <li><a href="">热门城市：</a></li>
                    <li><a href="">香港</a></li>
                    <li><a href="">澳门</a></li>
                    <li><a href="">北京</a></li>
                    <li><a href="">上海</a></li>
                    <li><a href="">成都</a></li>
                </ul>
            </div>
        </div>
        <img src="../../Public/img/back.gif" alt="">
    </div>
</div>

<div style="height: 50px;"></div>

<div class="container">
    <h1 class="p-t-lg" style="text-align: center;">你想去哪儿</h1>
    <div class="Where-togo m-t-lg">
        <span class="China">探索美丽中国</span>
        <ul class="Choice">
            <li class="active equipment_type"><a href="#tab1" data-toggle="tab">春意盎然</a></li>
            <li><a href="#tab2" data-toggle="tab">冬季滑雪</a></li>
            <li><a href="#tab3" data-toggle="tab">美食中国</a></li>
            <li><a href="#tab4" data-toggle="tab">山水之间</a></li>
            <li><a href="#tab5" data-toggle="tab">花舞人间</a></li>
        </ul>
        <div class="pull-right p-sm">
            <img src="../../Public/img/circle.gif">
            <img src="../../Public/img/circle.gif">
            <img src="../../Public/img/circle.gif">
        </div>
    </div>
</div>

<!-- 图片的组合排列 -->
<div class="container" id="tp-pictures">
    <div class="Images m-t-lg" id="tab1">
        <div class="left-imgs">
            <div class="mouse-over over-h pull-left">
                <div class="width-70">
                    <img src="../../Public/img/pictures/jzg.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>九寨沟1</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-30">
                    <img src="../../Public/img/pictures/sy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>都江堰</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-70">
                    <img src="../../Public/img/pictures/lgh.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>泸沽湖</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-left">
                <div class="width-30">
                    <img src="../../Public/img/pictures/djy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>三亚</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-imgs over-h" style="position: relative;">
            <div class="mouse-over2 pull-right m-l-xs">
                <img src="../../Public/img/pictures/sx.gif" width="196" height="493" alt="" >
                <div class="img-text p-md transition-all-05">
                    <h2>三峡</h2>
                    <p class="m-t-lg">
                        <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hide Images m-t-lg" id="tab2">
        <div class="left-imgs">
            <div class="mouse-over over-h pull-left">
                <div class="width-70">
                    <img src="../../Public/img/pictures/jzg.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>九寨沟2</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-30">
                    <img src="../../Public/img/pictures/sy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>都江堰</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-70">
                    <img src="../../Public/img/pictures/lgh.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>泸沽湖</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-left">
                <div class="width-30">
                    <img src="../../Public/img/pictures/djy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>三亚</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-imgs over-h" style="position: relative;">
            <div class="mouse-over2  pull-right m-l-xs">
                <img src="../../Public/img/pictures/sx.gif" width="196" height="493" alt="" >
                <div class="img-text p-md transition-all-05">
                    <h2>三峡</h2>
                    <p class="m-t-lg">
                        <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hide Images m-t-lg" id="tab3">
        <div class="left-imgs">
            <div class="mouse-over over-h pull-left">
                <div class="width-70">
                    <img src="../../Public/img/pictures/jzg.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>九寨沟3</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-30">
                    <img src="../../Public/img/pictures/sy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>都江堰</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-70">
                    <img src="../../Public/img/pictures/lgh.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>泸沽湖</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-left">
                <div class="width-30">
                    <img src="../../Public/img/pictures/djy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>三亚</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-imgs over-h" style="position: relative;">
            <div class="mouse-over2 pull-right m-l-xs">
                <img src="../../Public/img/pictures/sx.gif" width="196" height="493" alt="" >
                <div class="img-text p-md transition-all-05">
                    <h2>三峡</h2>
                    <p class="m-t-lg">
                        <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hide Images m-t-lg" id="tab4">
        <div class="left-imgs">
            <div class="mouse-over over-h pull-left">
                <div class="width-70">
                    <img src="../../Public/img/pictures/jzg.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>九寨沟4</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-30">
                    <img src="../../Public/img/pictures/sy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>都江堰</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-70">
                    <img src="../../Public/img/pictures/lgh.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>泸沽湖</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-left">
                <div class="width-30">
                    <img src="../../Public/img/pictures/djy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>三亚</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-imgs over-h" style="position: relative;">
            <div class="mouse-over2 pull-right m-l-xs">
                <img src="../../Public/img/pictures/sx.gif" width="196" height="493" alt="" >
                <div class="img-text p-md transition-all-05">
                    <h2>三峡</h2>
                    <p class="m-t-lg">
                        <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hide Images m-t-lg" id="tab5">
        <div class="left-imgs">
            <div class="mouse-over over-h pull-left">
                <div class="width-70">
                    <img src="../../Public/img/pictures/jzg.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>九寨沟5</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-30">
                    <img src="../../Public/img/pictures/sy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>都江堰</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-right">
                <div class="width-70">
                    <img src="../../Public/img/pictures/lgh.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>泸沽湖</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mouse-over over-h pull-left">
                <div class="width-30">
                    <img src="../../Public/img/pictures/djy.gif" alt="" >
                    <div class="img-text p-md transition-all-05">
                        <h2>三亚</h2>
                        <p class="m-t-lg">
                            <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-imgs over-h" style="position: relative;">
            <div class="mouse-over2 pull-right m-l-xs">
                <img src="../../Public/img/pictures/sx.gif" width="196" height="493" alt="" >
                <div class="img-text p-md transition-all-05">
                    <h2>三峡</h2>
                    <p class="m-t-lg">
                        <a href="">自然旅游资源比较丰富，各方面性价比都不错。</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="height: 20px;"></div>
<div class="Hot-travel m-t-lg">
    <div class="container">
        <h1 class="p-t-lg">想了解热门攻略吗？</h1>

        <!-- 轮播条目1 -->
        <!--  data-ride="carousel" data-interval="2000" -->
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="lists">
                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="item">
                    <div class="lists">
                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view2.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view2.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view2.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view3.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view4.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="item">
                    <div class="lists">
                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view3.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view4.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="item">
                    <div class="lists">
                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view6.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view1.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item item-diff m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="img-diff" src="../../Public/img/view2.gif" alt=""></a>
                            </div>
                            <div class="item-cont m-t-md">
                                <p class="p-lg">五彩池，酒店。。。</p>
                                <div class="bottom-words">
                                    <a class="p-l-xs" href="">
                                        <span class="glyphicon glyphicon-user tc-gray6">
                                        </span>
                                    </a>
                                    <a class="tc-main" href="">&nbsp;四火</a>
                                    <div class="small-pic" >
                                        <p>
                                            <a href="">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <a class="color-diff" href="">145&nbsp;</a>
                                        </p>
                                        <p class="p-l-xs">
                                            <a href="">
                                                <span class="glyphicon glyphicon-comment"></span> 
                                            </a>
                                            <a class="color-diff" href="">145</a>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div><!--The end of myCarouse-inner -->
            <div style="height: 60px"></div>
            <div class="listsNum">
                <a data-target="#myCarousel" data-slide-to="0" class="active"></a>
                <a data-target="#myCarousel" data-slide-to="1"></a>
                <a data-target="#myCarousel" data-slide-to="2"></a>
                <a data-target="#myCarousel" data-slide-to="3"></a>
            </div>

            <div class="see-more p-t-md">
                <button class="btn btn-lg bg-white">查看更多</button>
            </div>

        </div><!--The end of myCarousel -->
    </div><!--The end of container -->
</div><!--The end of Hot-travel -->


<div style="height: 20px;"></div>
<div class="m-t-lg">
    <div class="container">
        <h1 class="p-t-lg" style="text-align: center;">热门游记</h1>

        <!-- 轮播条目2 -->
        <!--  data-ride="carousel" data-interval="2000" -->
        <div id="myCarousel2" class="carousel slide">
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="lists">
                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view1.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal1.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view3.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view4.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/joba.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view5.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/girl.jpg"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view6.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/child.jpg"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="item">
                    <div class="lists">

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view3.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view1.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal1.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view5.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/woman.jpg"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="item">
                    <div class="lists">
                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view4.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/child.jpg"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="item">
                    <div class="lists">
                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view6.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/joba.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view2.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal1.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view4.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal2.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <div class="item border-grap9 m-l-lg m-t-lg">
                            <div class="item-list">
                                <a href=""><img class="view-img" src="../../Public/img/view5.gif" alt=""></a>
                                <a href=""><img class="img-circle person-img" src="../../Public/img/animal3.gif"></a>
                                <span class="m-l-sm"><a href="">画画</a></span>
                            </div>

                            <div class="item-cont p-b-lg ">
                                <p class="p-md">[陆潜之旅]是慵懒 是自由 是传统 是混搭 一机一镜五城七日 阳光欢笑</p>
                                 <div class="small-pic pull-right">
                                    <p>
                                        <a href="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="color-diff" href="">2012&nbsp;</a>
                                    </p>
                                    <p class="p-l-xs">
                                        <a href="">
                                            <span class="glyphicon glyphicon-comment"></span> 
                                        </a>
                                        <a class="color-diff" href="">231</a>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
            <div style="height: 60px"></div>
            <div class="listsNum num-diff">
                <a data-target="#myCarousel2" data-slide-to="0" class="active"></a>
                <a data-target="#myCarousel2" data-slide-to="1"></a>
                <a data-target="#myCarousel2" data-slide-to="2"></a>
                <a data-target="#myCarousel2" data-slide-to="3"></a>
            </div>

            <div class="see-more p-t-md">
                <button class="btn btn-lg bg-white border-grap9">查看更多</button>
            </div>

        </div>
    </div>
</div>

<div style="height: 100px;"></div>
<!-- footer部分 -->
 <?php
   include "../common/footer.php";
?> 

    <script src="../../Public/assets/jquery/js/jquery.min.js"></script>
    <script src="../../Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Public/js/index.js"></script>
</body>
</html>