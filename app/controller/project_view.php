<?php
/*!
 * \class Project View Page
 * \brief Contains the logic for viewing a project page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Project\ProjectStatus as ProjectStatus;
use Utility\FileList as Filelist;


class ProjectView {
    function __construct($pageData, $viewData) {
        error_reporting(0);
        @ini_set(‘display_errors’, 0);
                
        if($viewData->getType() === 'project-view') {
            // Get the list of projects in the project directory
			
			$projectDir = new Filelist(FILEROOT . '/static/data/project/');
			$projectList = $projectDir->getDirList(true);
            
            // Get the slugs from the url
			$getData       = $pageData->getPath();
			
			// Only diplsay the page if the project exists		
			if(in_array($getData[1], $projectList)) {
				 // Get data from the database
				$dbHolder      = new \Utility\PHPDBUtility();
				$projectData   = $dbHolder->DBD->query(Array( "type" => "get", "DATABASE" => "Project", 
							     "USER" => $getData[1], "ID" => 0));
								 
				$globalData    = $projectData->getGlobals(0);
				$projectStatus = ProjectStatus::Finished;
	
				if($globalData['STATUS'] != 2) {
					$projectStatus = ProjectStatus::Ongoing;
				}
				
	            // Parsing the data retrieved from the database
				$members = explode('#', $globalData['MEMBERS']);		
					
	            $project = new \Models\Project\Project($globalData['PROJECTNAME'], $getData[1],
							$globalData['CATCH'], $globalData['ABSTRACT'], $globalData['ABOUT'], 
							$members, array(), false, $projectStatus);
				
				$pageData->addCrumb(array('Project', rx_siteURL('project')));
				$pageData->addCrumb(array($globalData['PROJECTNAME'], '#'));
				
	            $viewData->setData('project-viewing', $project);
			} else {
				$pageData->setFound(false);
			}
        }
    }
}