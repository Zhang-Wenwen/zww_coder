<?php
$IVPConfig= array (
	'version'		=>	'1.0',
	'lastupdate'	=>	'2011-10-07',
	'database'		=>	array(
		'host'		=>	'',
		'dbname'	=>	'',
		'dbuser'	=>	'',
		'dbpassword'=>	''
	),
	'cookie'		=>	array(
		'prefix'	=>	'TWT_',
		'hashfix'	=>	'TWTSTD@2011',
		'duration'	=>	24*3600
	),
	'basedatabase'	=>	array(
		'log'		=>	'_log',
		'record'	=>	'_record',
		'lock'		=>	'_lock'
	),
	'addons'		=>	array(
		'json'		=>	false,
		'httpdown'	=>	false,
		'id3tagreader'	=>	false
	),
	'cacheswitch'	=>	false,
);
?>