<?php

/*! \class Index Page
 *  \brief Logic for the Home Page
 *  \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;

use Controller\BaseController as BaseController;

class Index extends BaseController {
    public static function main($pageData, $viewData) {
	    $viewData->setType('index');

	    /*
		$dbHolder      = new \Utility\PHPDBUtility();
		$newsQueryData   = $dbHolder->DBD->query(Array( "type" => "getall", "DATABASE" => "Blog", "USER" => "News"));
		$newsData = Array();
		foreach($newsQueryData->names as $id => $gData) {
			if($id != "master" || $id != "global") {
					$newsData[] = array('name' => $gData['TITLE'], 'desc' => $gData['TLDR']);
			}
		}
	    $viewData->setData('news', $newsData);

	    // TODO: Add events array here.
	    //       Display logic is in /views/parts/index/event_column.php
		
		$eventQueryData   = $dbHolder->DBD->query(Array( "type" => "getall", "DATABASE" => "Events", "USER" => "Main"));
		$eventData = Array();
		//var_dump($eventQueryData->names);
		foreach($eventQueryData->names as $id => $gData) {
			if($id != "master" && $id != "globals") {
					$eventData[] = array(
	            'month'     => $gData['MONTH'],
	            'day'       => $gData['DATE'],
	            'title'     => $gData['TITLE'],
	            'time'      => $gData['TIME'],
	            'location'  => $gData['WHERE'],
				);
			}
		}
	    $viewData->setData('fake_date', $eventData);
        */
    }
}