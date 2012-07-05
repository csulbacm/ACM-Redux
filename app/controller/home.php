<?php

/*! \class Index Page
 *  \brief Logic for the Home Page
 *  \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;

use Controller\BaseController as BaseController;
use Controller\Pages\DocumentMain as DocumentMain;
use Controller\Pages\PressPageViewer as PressPageViewer;

class Index extends BaseController {
    public static function main($pageData, $viewData) {
	    $viewData->setType('index');

	    $pageData->pushJS('home.js');
	    
	    // Latest Minutes on the page
	    $minutesList = DocumentMain::getMinutesList(5);
        $viewData->setData('minutes-listing', $minutesList);
        
        $pressList = PressPageViewer::getPageList();
        $viewData->setData('press-listing', $pressList);
    }
}