<?php
return array(
	//'配置项'=>'配置值'
	'DB_DSN' => 'mysql://root:@127.0.0.1:3306/newcar',
	//使用smarty
	'TMPL_ENGINE_TYPE' => 'Smarty',
	'TMPL_ENGINE_CONFIG' => array(
		'caching' => false,
		'template_dir' => APP_PATH . '/Home/View',
		'cache_dir' => APP_PATH . '/Runtime/Cache'
	),

	'URL_PARAMS_BIND'       =>  true, // URL变量绑定到操作方法作为参数
	'URL_HTML_SUFFIX'		=>  '',// 关闭伪静态

	'TOKEN_ON' => true,

	'DEFAULT_MODULE'     => 'Home', //默认模块
	'URL_MODEL'          => 2, //URL模式
	'STATIC_DIR'		 => '/car2/public/static/',

	'COOKIE_HTTPONLY' => true,

	'BRAND'   => '东南汽车', // 品牌
	'COMPANY' => '梁平总代理',//公司名字

	'BRAND'   => '', // 品牌
	'COMPANY' => '',//公司名字

	'MANAGER' => array(
		array('Admin', '管理员', ), // 添加管理员
		array('User', '用户'),
		array('Cate', '一级分类'),
		array('Sub', '二级分类'),
		array('News', '新闻'),
	),// 管理菜单
	'PWDCOOKIE'  => 'string', // 密码cookie
	'INFOCOOKIE' => '__cake', // 信息cookie

	'ERROR' => array(
		100 => '用户名格式错误',
		101 => '用户名不存在',
		110 => '密码格式错误',
		111 => '密码错误',


		900 => '令牌错误',

		404 => '接口不存在',

		'default' => '未知错误',
	),

	// 菜单配置
	'CFG' => array(
		array('管理员', 'Admin', ''),
		array('用户', 'User', ''),
		array('导航分类', 'Cates', 'sort'),
		array('二级分类', 'Subs', 'sort'),
	),
);