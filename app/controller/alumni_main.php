<?php
/*!
 * \class Alumni Main Page
 * \brief Contains the logic for the alumni main page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Blog as Blog;
use \Controller\BaseController as BaseController;

class AlumniMain extends BaseController{
	public static function main($pageData, $viewData) {
	       
	    error_reporting(0);
        @ini_set(‘display_errors’, 0);

        $path = $pageData->getPath();
        if(isset($path[1])) {
        	self::redirect('alumni-view', $path[1]);
        }

        $viewData->setType('alumni');
		$getData = $pageData -> getPath();
		$dbHolder = new \Utility\PHPDBUtility();
		$alumniData = $dbHolder -> DBD -> query(Array("type" => "list", "DATABASE" => "Alumni"));

		$alumni = Array();
		foreach ($alumniData->names as $shortName => $gData) {
            $alumni[] = new \Models\Documents\AlumniProfile($gData['NAME'], 
            $shortName,$gData['QUOTE'], $gData['DISCOVERY'],
            $gData['MOTIVATION'], $gData['ADVICE'], $gData['ACTIVEYEARS'], $gData['ACTIVITY'],
            $gData['DESC'], $gData['MEMORY'], $gData['EMAIL']);
		}

		$viewData -> setData('alumni', $alumni);
	}

}