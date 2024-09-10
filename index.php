<?php

// Allow CORS

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
// ini_set("display_errors", "On");
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// Force SSL when behind an SSL proxy

// this ensures that internally generated absolute urls also are ssl

if ("https"== strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']))

{    

    $_SERVER['SERVER_PORT'] = 443;

    $_SERVER['HTTPS'] = 'on';

    if(isset($_SERVER['HTTP_X_REAL_IP'])) $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];

    $_SERVER['HTTP_HOST'] = str_replace(':443','',$_SERVER['HTTP_HOST'] );

}


require_once($yii);
Yii::createWebApplication($config)->run();
