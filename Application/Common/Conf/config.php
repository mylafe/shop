<?php
return array(

	// 加载扩展配置文件
	'LOAD_EXT_CONFIG' => 'database',
	'LANG_SWITCH_ON' => true,   // 开启语言包功能

	// 数据库配置
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'shopimooc',// 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  '123',          // 密码
	'DB_PORT'               =>  '3306',        // 端口
	'DB_PREFIX'             =>  'imooc_',    // 数据库表前缀
	// 'SHOW_PAGE_TRACE'=>true ,   //显示页面Trace信息
 	'LOG_RECORD' => true, // 开启日志记录
 	//'URL_ROUTER_ON'   => true, //开启路由
	'LOG_LEVEL' =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误


	'URL_ROUTER_ON' => true,// 开启路由
	'URL_ROUTE_RULES'=>array(
	'news/:year/:month/:day' => array('News/archive', 'status=1'),
	'news/:id' => 'News/read',
	'news/read/:id' => '/news/:1',
	),

	'SESSION_OPTIONS'         =>  array(
    'name'                =>  'shopimoocsession_',	            //设置session名
    'expire'              =>  24*3600*30,                      //SESSION保存30天
    'use_trans_sid'       =>  1,                               //跨页传递
    'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),

	//'COOKIE_DOMAIN' => www.0796jg.com', //cookie的有效域名
	//'COOKIE_PATH' => '/' , //保存路径
	'COOKIE_PREFIX' => 'shopimooc_', //cookie的前缀
	'COOKIE_EXPIRE' => 24*36000*7, //cookie的生存时间
	'USER_AUTH_KEY' =>'authId', // 用户认证SESSION标记

);