<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
		'__ASRC__' => __ROOT__ . '/Peter_player/Public/Admin',
		'__HSRC__' => __ROOT__ . '/Peter_player/Public/Home'
	),

	'SHOW_PAGE_TRACE' => true,

	//database settings
	'DB_TYPE'               =>  'mysql',     // database type
    'DB_HOST'               =>  'localhost', // server address
    'DB_NAME'               =>  'test',          // database name
    'DB_USER'               =>  '',      // username
    'DB_PWD'                =>  '',          // password
    'DB_PORT'               =>  '3306',        // port
    'DB_PREFIX'             =>  'mp_',    // tablePrefix
	//database settings done
);