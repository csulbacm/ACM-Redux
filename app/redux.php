<?php
include_once("bootstrap.php");include_once("helpers.php");include_once("template_tags.php");
rx_includeAll(INCPATH . '/controller/base/');rx_includeAll(INCPATH . '/controller/');rx_includeAll(INCPATH . '/model/');rx_includeAll(INCPATH . '/utility/');
global $pageData;global $viewData;global $classMap;
global $defaultCSS;$defaultCSS = array('960.css', 'search.css', 'style.css');
$classMap = array(    'project' => array('Projects', function ($pageData, $viewData) {    	$path = $pageData->getPath();
		if(isset($path[1])) {			header("Location: " . SITEROOT . "project-view/" . $path[1]);		} else {		        $viewData->setType('project');	        $page = new \Controller\Pages\ProjectMain($pageData, $viewData);	        $pageData->setView('project');		}    }),
	'documents' => array('Documents', function ($pageData, $viewData) {        $viewData->setType('documents');        $page = new \Controller\Pages\DocumentMain($pageData, $viewData);		$pageData->setView('documents');	}),
   'about' => array('About Us', function ($pageData, $viewData) {       $viewData->setType('about');        $page = new \Controller\Pages\About($pageData, $viewData);       $pageData->setView('about');    }),
    'alumni' => array('', function ($pageData, $viewData) {      	$path = $pageData->getPath();		if(isset($path[1])) {			header("Location: " . SITEROOT . "alumni-view/" . $path[1]);		} else {		        $viewData->setType('alumni');            $page = new \Controller\Pages\AlumniMain($pageData, $viewData);	        $pageData->setView('alumni');		}    }),
    'constitution' => array('Constitution/Bylaws', function ($pageData, $viewData) {       $viewData->setType('constitution');      $pageData->setView('constitution');    }, 'right' => true),
    'mission' => array('Mission', function ($pageData, $viewData) {       $viewData->setType('mission');        $pageData->setView('mission');
    }, 'right' => true),
    // for URLs that don't appear in the navigation
    'project-view' => array('', function ($pageData, $viewData) {
        $viewData->setType('project-view');
        $page = new \Controller\Pages\ProjectView($pageData, $viewData);
        $pageData->setView('project_view');
    }),
    
    'minutes-view' => array('', function ($pageData, $viewData) {
        $viewData->setType('minutes-view');
        $page = new \Controller\Pages\MinutesView($pageData, $viewData);
        $pageData->setView('minutes_view');
    }),
    'index' => array('', function ($pageData, $viewData) {
        $viewData->setType('index');
        $pageData->setView('index');
    }),   
    'alumni-view' => array('', function ($pageData, $viewData) {
        $viewData->setType('alumni-view');
        $page = new \Controller\Pages\AlumniView($pageData, $viewData);        $pageData->setView('alumni_view');
    }),
);

$pageData = new \Controller\Page();
$viewData = new \Controller\ViewData();