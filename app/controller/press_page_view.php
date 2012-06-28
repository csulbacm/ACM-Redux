<?php

/*!
 * \class Press Page Viewer
 * \brief Contains the logic for viewing a press page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Documents\PressPage as PressPage;
use Utility\FileList as FileList;

class PressPageViewer {
    function __construct($pageData, $viewData) {
        if ($viewData -> getType() === 'press-page-view') {
            $slug = $pageData -> getPath();
            $pageName = $slug[1];
            $path = FILEROOT . '/static/data/pages/';

            if (!file_exists($path)) {
                $pageData->setFound(false);
            } else {
                $directory = new FileList($path);
                $filename  = $pageName . '.md';
                if(!$directory->hasFile($filename)) {
                    $pageData->setFound(false);
                } else {
                    $pressPage = new PressPage($directory->getFileContent($filename));
                    $viewData->setData('content', $pressPage->getHTML());
					
					
                    $viewData->setData('title', $pressPage->getTitle());

                }
            }
        }
    }
}
