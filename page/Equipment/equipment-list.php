<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Public/css/nav.css">
    <link rel="stylesheet" href="../../Public/css/footer.css">
    <link rel="stylesheet" href="../../Public/css/style.css">
    <link rel="stylesheet" href="../../Public/css/equiment.css">
    <link rel="stylesheet" href="../../Public/css/trangle.css">
	<title>装备列表页</title>
</head>
<body>
	
<!-- header部分 -->
<?php
   include "../common/navbar.php";
?>


<!-- 搜索部分 -->
<div class="container">
	<div class="search-big">
	    <!-- 面包屑导航 -->
        <ol class="breadnav m-t-lg">
            <li><a href="" class="tc-main">首页</a></li>
            <li><a href="" class="tc-black">&gt;</a></li>
            <li><a href="" class="tc-main">装备</a></li>
        </ol>
	    <!-- 标题+搜索栏-->
	    <div class="search-box">
		    <h3 class="tc-main p-b-lg">户外装备</h3>
    		<div class="right-form pull-right">
                <span class="glyphicon glyphicon-search pull-right search-img"></span>
                <form>
                     <input class="" type="text" placeholder="搜索省份、城市、目的地" > 
                </form>     
            </div>
	    </div>
    </div>
</div>

<!-- 快捷查看部分 -->

<div class="chosing-bigger bg-gray-f6">
	<div class="container">
	    <dl class="chosing clearfix">
            <dt class="equipment_type bg-main bg-after-main">装备类型</dt>
            <dd class="chosing_list">
                <ul class="clearfix">
                    <li><a href="#">全部</a></li>
                    <li><a href="#">服装</a></li>
                    <li><a href="#">鞋袜</a></li>
                    <li><a href="#">背包</a></li>
                    <li><a href="#">露营装备</a></li>
                    <li><a href="#">登山攀岩装备</a></li>
                    <li><a href="#">手机/眼镜/仪器/数码</a></li>
                    <li><a href="#">综合装备</a></li>
                    <li><a href="#">骑行装备</a></li>
                </ul>
            </dd>
        </dl>

         <dl class="chosing clearfix">
            <dt class="equipment_type bg-o bg-after-o">装备价格</dt>
            <dd class="chosing_list">
                <ul class="clearfix">
                    <li><a href="#">全部</a></li>
                    <li><a href="#">100元以下</a></li>
                    <li><a href="#">100~500元</a></li>
                    <li><a href="#">500~1000元</a></li>
                    <li><a href="#">1000~2000元</a></li>
                    <li><a href="#">2000~3000元</a></li>
                    <li><a href="#">3000~4000元</a></li>
                    <li><a href="#">4000~5000元</a></li>
                    <li><a href="#">5000元以上</a></li>
                </ul>
            </dd>
        </dl>

         <dl class="chosing clearfix longest-words">
            <dt class="equipment_type bg-b bg-b-after">装备品牌</dt>
            <dd class="chosing_list">
                <ul class="clearfix">
                    <li><a href="#">全部</a></li>
                    <li><a href="#">KAILAS</a></li><!-- (凯乐石) -->
                    <li><a href="#">Decathlon</a></li><!-- (迪卡侬) -->
                    <li><a href="#">ARC TERYX</a></li><!-- (始祖鸟) -->
                    <li><a href="#">the North Face</a></li><!-- (北面) -->
                    <li><a href="#">JACK WOLFSKIN</a></li>
                    <li><a href="#">PUMA</a></li><!-- (彪马) -->
                    <li><a href="#">更多品牌</a></li>
                </ul>
            </dd>
        </dl>

        <!-- 三个默认、热度、评分按钮 -->
        <div class="three-btns m-t-sm">
        	<button class="btn btn-sm bg-main">
        	    <span class="glyphicon glyphicon-download"></span> 默认
        	</button>
        	<button class="btn btn-sm btn-style">
        	    <span class="glyphicon glyphicon-download"></span> 热度
        	</button>
        	<button class="btn btn-sm btn-style">
        	    <span class="glyphicon glyphicon-download"></span> 评分
        	</button>
        </div>
    </div>
</div>


<!-- 装备列表部分 -->
<div class="container">
    <div class="equiment_list clearfix p-lg">
        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item mouse-hover over-h">
            <div class="item_list">
                <div class="img_item">
                    <a href="#">
                        <img src="../../Public/img/camera.gif" alt="" >
                    </a>
                </div>
                <div class="img_cont p-sm transition-all-03">
                    <h4>Canon(佳能)</h4>
                    <p><a href="#">Canon(佳能) EOS 6D 全画幅数码单反相机</a></p>
                    <p>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                        <i class="iconfont icon-xing tc-main"></i>
                          <span class="over-h half" >
                            <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                           <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                        </span>
                        <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                        <span>9.0</span>
                    </p>
                </div>


                <div class="hover-text text-center p-md transition-all-05">
                    <h4>Canon(佳能)</h4>
                    <p>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                            <i class="iconfont icon-xing tc-main"></i>
                              <span class="over-h half" >
                                <i class="iconfont icon-xing tc-grayc" style="position:absolute;"></i>
                               <i class="iconfont icon-1 tc-main" style="position:absolute;"></i>
                            </span>
                            <i class="iconfont icon-xing tc-grayc m-l-14"></i>
                            <span>9.0</span>
                    </p>
                    <button class="btn btn-success" style="width:80px;color: #fff;font-size: 16px;font-weight: bold;">点评</button>
                    <div class="some-distance m-l-md">
                        <p>
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <span><a href="">189</a></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span><a href="">189</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 25px;"></div>
    <!-- 分页设计 -->
    <div class="page pull-right">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">7</a>
            <a href="#">8</a>
            <a href="#">9</a>
            <a href="#">10</a>
            <span class="hl">...</span>
            <a href="#">371</a>
            <a href="#">下一页</a>
    </div>

</div>

   

<div style="height: 40px;"></div>
<!-- footer部分 -->
 <?php
   include "../common/footer.php";
?>

    <script src="../../Public/assets/jquery/js/jquery.min.js"></script>
    <script src="../../Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Public/js/main.js"></script>
</body>
</html>