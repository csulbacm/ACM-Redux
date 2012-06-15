<?php

$siteRoot = 'http://'. $_SERVER['HTTP_HOST'];

if(dirname($_SERVER['SCRIPT_NAME']) !== '/') {
	$siteRoot = $siteRoot . dirname($_SERVER['SCRIPT_NAME']) . '/';
} else {
	$siteRoot = $siteRoot . '/';
}

define('REWRITE', true);

define('INCPATH', dirname(__FILE__));
define('FILEROOT', dirname(dirname(__FILE__)) ); 

define('DATABASEPATH', FILEROOT . "/db/");

define('SITEROOT', $siteRoot);

define('IMAGESDIR', SITEROOT . 'static/global/img/');
define('CSSDIR',    SITEROOT . 'static/global/css/');
define('DATADIR',   SITEROOT . 'static/data/');

define('IMAGESFILEDIR', FILEROOT . '/static/global/img/');
define('CSSFILEDIR',    FILEROOT . '/static/global/css/');
define('DATAFILEDIR',   FILEROOT . '/static/data/');