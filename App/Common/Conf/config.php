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
		1010 => '请登录',

		'default' => '未知错误',
	),

	// 菜单配置
	'CFG' => array(
		array('管理员', 'Admin', ''),
		array('用户', 'User', ''),
		array('导航分类', 'Cates', 'sort'),
		array('二级分类', 'Subs', 'sort'),
	),

	'DICT' => array(
	    "id" => "索引",
	    "username" => "用户名",
	    "name" => "名字",
	    "password" => "密码",
	    "repassword" => "重复密码",
	    "rights" => "权限",
	    "grade" => "等级",
	    "age" => "年龄",
	    "sex" => "性别",
	    "mobile" => "手机号码",
	    "number" => "电话号码",
	    "address" => "地址",
	    "email" => "电子邮箱",
	    "title" => "条目名字",
	    "en" => "条目英文名字或拼音",
	    "link" => "链接地址",
	    "hassub" => "是否有子分类",
	    "state" => "状态",
	    "index" => "排名位置",
	    "cateid" => "所属分类ID",
	    "static" => "是否静态化",
	    "date" => "发布日期",
	    "update" => "更新日期",
	    "author" => "发布者名字",
	    "content" => "内容",
	),
	'STATE' => array(
		"0" => "待审核",
		"1"  => "发布",
		"2"	=> "删除",
		"100"	=> "其他",
	),
);