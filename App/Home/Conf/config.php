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
);