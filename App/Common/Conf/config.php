<?php
return array(
	//'配置项'=>'配置值'
	'DB_DSN' => 'mysql://car:car@localhost:3306/newcar',
	//使用smarty
	'TMPL_ENGINE_TYPE' => 'Smarty',
	'TMPL_ENGINE_CONFIG' => array(
		'caching' => false,
		'template_dir' => APP_PATH . '/Home/View',
		'cache_dir' => APP_PATH . '/Runtime/Cache'
	),
	'DEFAULT_MODULE'     => 'Home', //默认模块
	'URL_MODEL'          => '0', //URL模式
	'STATIC_DIR'		 => '/car2/public/static/',
);