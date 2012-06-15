<?php
/*!
 * \class Project Main Page
 * \brief Contains the logic for the project main page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Project\ProjectStatus as ProjectStatus;
use Models\Blog as Blog;

class ProjectMain {
	function __construct($pageData, $viewData) {
	       
	    error_reporting(0);
        @ini_set(‘display_errors’, 0);

		if ($viewData -> getType() === 'project') {
			$getData = $pageData -> getPath();
			$dbHolder = new \Utility\PHPDBUtility();
			$projectData = $dbHolder -> DBD -> query(Array("type" => "list", "DATABASE" => "Project"));

			$currentProjects = Array();
			foreach ($projectData->names as $shortName => $gData) {
				if ($gData['STATUS'] != "2") {
					$currentProjects[] = new \Models\Project\Project($gData['PROJECTNAME'], $shortName, $gData['CATCH'], $gData['ABSTRACT'], $gData['ABOUT'], $gData['MEMBERS'], array(), false, ProjectStatus::Ongoing);
				}
			}

			$finishedProjects = Array();
			foreach ($projectData->names as $shortName => $gData) {
				if ($gData['STATUS'] == "2") {
					$finishedProjects[] = new \Models\Project\Project($gData['PROJECTNAME'], $shortName, $gData['CATCH'], $gData['ABSTRACT'], $gData['ABOUT'], $gData['MEMBERS'], array(), false, ProjectStatus::Finished);
				}
			}

			$viewData -> setData('current-projects', $currentProjects);
			$viewData -> setData('past-projects', $finishedProjects);
		}
	}

}
