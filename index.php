<?php
/*!
 * \brief The index page for the site, handles url path.
 */

include_once("./app/redux.php");

global $pageData;
global $viewData;
global $classMap;

if (isset ($_GET["page"])) {
    $pagePath = $_GET["page"];   
} else {
    $pagePath = 'index';
}

$pageData->setPath($pagePath);

$slug = $pageData->getSlug();

if (isset($classMap[$slug])) {
	$controller = null;
	$view       = null; 

	if(isset($classMap[$slug]['controller'])) {
		$controller = $classMap[$slug]['controller'];
	} 

	if(isset($classMap[$slug]['view'])) {
		$view = $classMap[$slug]['view'];
	} 

	if ($view != null) {
		$pageData->setView($view);

		if($controller != null) {
			
			// If there is a controller, run its main
			
			$contollerClass = "\Controller\Pages\\" . $controller;
			$contollerClass::main($pageData, $viewData);			
		} else {

			// Otherwise, we will assume that the type of the page
			// is the same name as the view. (Used for css includes)

			$viewData->setType($view);	
		}

		if($pageData->found()) {
			$pageData->renderPage();   
		} else {
			// If the controller set the 404 error
			throw404(); 
		}
	} else {
		// If the page has no view
		throw404();
	}
} else {
	 	// If the slug is not found 
		throw404();
}