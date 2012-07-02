<?php

/*! Returns the title of the page
 * 	   \uses $pageData
*      \return string
*/
function rx_getTitle() {
    global $pageData;
    return $pageData->getTitle();
}

/*! Returns the CSS of the page
* 	   \uses $pageData
*      \return string
*/
function rx_getCSS() {
    global $pageData;
    return $pageData->getCSS();
}

/*! Returns the JS of the page
* 	   \uses $pageData
*      \return string
*/
function rx_getJS() {
    global $pageData;
    return $pageData->getJS();
}

/*! Returns data from the viewData with a key
 *
 * 		 \param  $key string
 *  	 \uses   $viewData
 *
 * 		 \return mixed
 */
function rx_getData($key) {
    global $viewData;
    return $viewData->getData($key);
}

/*! Returns a string representing the breadcrumb
 * 	   \uses $pageData
*      \return string
*/
function rx_getBreadCrumb() {
    global $pageData;
    return $pageData->getBreadCrumb();
}

/*! Returns a string that is the view type 
 *      \uses $viewData
 *      \return string 
 */

 function rx_getViewType() {
    global $viewData;
    return $viewData->getType();
 }

 //! Includes an html (static) part for a page that is in the /static/parts/ directory
/*!
*    \param $type string
*    \param $name string  
*/
function rx_getStaticPart($type, $name) {
	$output = "";
	$filePath = FILEROOT .'/static/data/parts/' . $type . '/' . $name . '.html';
	
	if(file_exists($filePath))  {
		$output = file_get_contents($filePath);	
	} else {
		$output = "Static part " . $type . '/' . $name . " not found.";
	}
	
	return $output;
}
 