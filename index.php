<?php
/*!
 * \brief The index page for the site, handles url path.
 */

  
include_once("./app/redux.php");


global $pageData;
global $viewData;
global $classMap;

if (isset ($_GET["page"])) {
    $name = $_GET["page"];   
} else {
    $name = 'index';
}

$pageData->setPath($name);

$slug = $pageData->getSlug();

if (isset($classMap[$slug])) {
    $classMap[$slug][1]($pageData, $viewData);
    if($pageData->found()) {
        $pageData->renderPage();   
    } else {
        throw404();    
    }
} else {
    throw404();
}