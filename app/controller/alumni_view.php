<?php
/*!
 * \class Project View Page
 * \brief Contains the logic for viewing a project page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Utility\FileList as Filelist;
use Models\Documents\AlumniProfile as AlumniProfile;


class AlumniView {
    public static function main($pageData, $viewData) {
        error_reporting(0);
        @ini_set("display_errors", 0);

        $viewData->setType('alumni-view');
        // Get the list of alumni
		$alumniDir = new Filelist(FILEROOT . '/db/Alumni/');
		$alumniList = $alumniDir->getDirList(true);
		
        
        // Get the slugs from the url
		$getData       = $pageData->getPath();
		$shortName = $getData[1];
					
		// Only display the page if the alumni imaage exists		
		if(in_array($shortName, $alumniList)) {
			 // Get data from the database
			$dbHolder      = new \Utility\PHPDBUtility();
			$alumniData    = $dbHolder->DBD->query(Array( "type" => "get", "DATABASE" => "Alumni", 
						     "USER" => $getData[1], "ID" => 0));
							 
			$gData         = $alumniData->getGlobals(0);
			
            // Parsing the data retrieved from the database
				
            $profile = new AlumniProfile($gData['NAME'], 
                $shortName,$gData['QUOTE'], $gData['DISCOVERY'],
                $gData['MOTIVATION'], $gData['ADVICE'], $gData['ACTIVEYEARS'], $gData['ACTIVITY'],
                $gData['DESC'], $gData['MEMORY'], $gData['EMAIL']);
			
			$pageData->addCrumb(array('M.V.P and Alumni', rx_siteURL('alumni')));
			$pageData->addCrumb(array($gData['NAME'], '#'));
			
            $viewData->setData('profile', $profile);
		} 
    }
}