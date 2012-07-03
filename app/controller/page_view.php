<?php

/*!
 * \class Press Page Viewer
 * \brief Contains the logic for viewing a press page. A press page is a static page.
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Documents\StaticPage as StaticPage;
use Utility\FileList as FileList;

class PageViewer {
    protected static $path = '/static/data/pages/';

    public static function main($pageData, $viewData) {
        $viewData->setType('static-page-view');

        $slug = $pageData -> getPath();
        $pageName = $slug[1];
        $pagesPath = FILEROOT . self::$path;

        if (!file_exists($pagesPath)) {
            $pageData->setFound(false);
        } else {
            $directory = new FileList($pagesPath);
            $filename  = $pageName . '.md';
            if(!$directory->hasFile($filename)) {
                $pageData->setFound(false);
            } else {
                $pressPage = new StaticPage($directory->getFileContent($filename));

                $viewData->setData('page-css', $pressPage->getCSS());
                $viewData->setData('page-js', $pressPage->getJS());
                $viewData->setData('content', $pressPage->getHTML());
                $viewData->setData('title', $pressPage->getTitle());

            }
        }
    }
}