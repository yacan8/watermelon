<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql',
	'DB_NAME' => 'watermelon',
	'DB_HOST' => 'localhost',
	'DB_USER' => 'root',
	'DB_PWD' => 'root',
	'DB_PREFIX' => 'wt_',

	 '__DATA__' => __ROOT__.'/Data',
	'MODULE_ALLOW_LIST' => array('Home','Admin'), // 配置你原来的分组列表
	'DEFAULT_MODULE' => 'Home', // 配置你原来的默认分组
	//调试
	'SHOW_PAGE_TRACE' => true,
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
		'u/:id'  =>array('Account/dynamics','',array('ext'=>'')),
		't/:id'  => array('Home/Topic/detail','',array('ext'=>'html')),
		'i/:id'  => array('Home/Infomation/detail','',array('ext'=>'html')),
		'tn/:id'  => array('Home/TravelNote/detail','',array('ext'=>'html'))
	),
);