<?php
/*!
* \page Helper functions Here
*
* \author David Nuon <david@davidnuon.com> 
* \version 1.0
*/

//! Returns a boolean of whether a string begins with a substring.
/*! From http://snipplr.com/view.php?codeview&id=5939
*    \param $string    string
*    \param $subString string
* 	 \return boolean
*/

function stringBeginsWith($string, $subString) {
    return (strncmp($string, $subString, strlen($subString)) == 0);
}

//! Returns a boolean of whether a string ends with a substring.
/*! http://stackoverflow.com/questions/619610/whats-the-most-efficient-test-of-whether-a-php-string-ends-with-another-string
*    \param $string    string
*    \param $subString string
* 	 \return boolean
*/

function stringEndsWith($string, $subString) {
    $strlen = strlen($string);
    $testlen = strlen($subString);
    if ($testlen > $strlen) return false;
    return substr_compare($string, $subString, -$testlen) === 0;
}


//! Includes a php part for a page
/*!
*    \param $type string
*    \param $name string  
*/
function includePart($type, $name) {
	include(INCPATH .'/views/parts/' . $type . '/' . $name . '.php');
}

//!@{ Error Pages

//! Displays the 404 page and throws the 404 header
/*
 *     \param none
 *     \return none
 */

function throw404() {
    header("HTTP/1.0 404 Not Found");
    include_once(INCPATH .'/views/404.php');
}

//!}

//! Returns the HTML for the page.
/*!
* 
*     \param $tempalteName string 
*/
function renderView($tempalteName) {
    $viewPath = INCPATH .'/views/' . $tempalteName . '.php';
    if($tempalteName == "") {
        include_once(INCPATH .'/views/index.php');
    } else {
        if(file_exists($viewPath)) {
            include_once($viewPath);
        } else {
            throw404();
        }
    }
}


//! Set the CSS of the page class. Takes arguments as an array of strings or strings
/*!
* 
*      \param array variadic
*      \param string variadic
*/
function rx_setTitle($title) {
    global $pageData;
    $pageData->setTitle($title);
}


//! Set the CSS of the page class. Takes arguments as an array of strings or strings
/*!
*      \param array variadic
*      \param string variadic
*/
function rx_pushCSS() {
    global $pageData;

    foreach (func_get_args() as $arg) {
        $pageData->pushCSS($arg);

    }
}

//! Set the JS of the page class. Takes arguments as an array of strings or strings
/*!
*      \param array variadic
*      \param string variadic
*/
function rx_pushJS() {
    global $pageData;

    foreach (func_get_args() as $arg) {
        $pageData->pushJS($arg);

    }
}


//! Includes all the php files in a given directory
/*!
 *
 *      \param   $dir string
 *      \returns none
 *
 */

function rx_includeAll($dir) {
    $handle = opendir($dir);
    if ($handle) {
        while (false !== ($entry = readdir($handle))) {
            $filePath = $dir . '/' .$entry;
            if(!is_dir($filePath)) {
                include_once($filePath);
            }
        }
    }
    closedir($handle);
}

//!@{ URL Helpers

//! Returns ths URL of an image in the image directory
/*! 
*      \return string
*/
function rx_imageURL($image) {
    return IMAGESDIR . $image;
}

//! Returns ths URL of a file in the CSS directory.
/*! Ihe URL is a web url and not a name of a file,
*  it returns what is put in.
* 	   \param  string
*      \return string
*/
function rx_cssURL($css) {
	if( stringBeginsWith($css, 'http://')  ||
	    stringBeginsWith($css, 'https://') ||
        stringBeginsWith($css, '//') ) {
		return $css;
	} else {
		return CSSDIR . $css;
	}
}

//! Returns ths URL of a file in the JS directory.
/*! Ihe URL is a web url and not a name of a file,
*  it returns what is put in.
*      \param  string
*      \return string
*/
function rx_jsURL($js) {
    if( stringBeginsWith($js, 'http://')  ||
        stringBeginsWith($js, 'https://') ||
        stringBeginsWith($js, '//')) {
        return $css;
    } else {
        return JSDIR . $js;
    }
}

//! Returns a URL in the site
/*! 
*      \return string
*/
function rx_siteURL($slug = "") {
	$addition = '?page=';
	
	if(REWRITE) {
		$addition = '';
	}
 	
    if ($slug !== "") {
        return SITEROOT . $addition .$slug;
    }
    else {
        return SITEROOT;
    }
}

//!@}

