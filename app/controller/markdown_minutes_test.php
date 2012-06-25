<?php
/*!
 * \class Markdown Minutes Test Page
 * \brief Contains the logic for viewing a project page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Documents\MarkdownMinutes as MarkdownMinutes;
use Utility\FileList as FileList;

class MinutesTestPage {
    function __construct($pageData, $viewData) {        
        if($viewData->getType() === 'new-minutes-test') {
            $minutes     = new FileList(FILEROOT . '/static/data/minutes/2012-06-01/');
        	$testMinutes = new MarkdownMinutes($minutes->getFileContent("minutes.md"));
			
			$outputContnet = "";
			
			foreach ($testMinutes->getSidebar() as $line) {
				$outputContnet .= $line . "<br />";
			}
			
			$viewData->setData('text', $outputContnet);
		}
    }
}