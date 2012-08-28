<?php 
	include_once("bootstrap.php");
	include_once("helpers.php");
	include_once("template_tags.php");

	rx_includeAll(INCPATH . '/controller/base/');
	rx_includeAll(INCPATH . '/controller/');
	rx_includeAll(INCPATH . '/model/');
	rx_includeAll(INCPATH . '/utility/');
	
	global $pageData;
	global $viewData;
	global $classMap;
	global $defaultCSS;
	
	$jsonFileContents = file_get_contents( INCPATH . '/map.json');
	$router = new \Utility\Router($jsonFileContents);
	$defaultCSS = array('960.css', 'search.css', 'style.css', 'mobile.css');
	$classMap = $router->getArray();
	$pageData = new \Controller\Page();
	$viewData = new \Controller\ViewData();
	$pageData->pushCSS($defaultCSS);
