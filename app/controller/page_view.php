<?php

/*!
 * \class Press Page Viewer
 * \brief Contains the logic for viewing a press page. A press page is a static page.
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Models\Documents\StaticPage as StaticPage;
use Controller\BaseController as BaseController;
use Utility\FileList as FileList; 

class PageViewer extends BaseController {
    protected static $basePath = '/static/data/staticpages/';
    protected static $path     = '/static/data/staticpages/pages/';

    public static function main($pageData, $viewData) {
        $viewData->setType('static-page-view');
        $slug = $pageData -> getPath();
        $pageName = $slug[1];
        $pressPage = self::getPage($pageName);

        if($pressPage !== false) {
            $viewData->setData('page-css', $pressPage->getCSS());
            $viewData->setData('page-js', $pressPage->getJS());
            $viewData->setData('content', $pressPage->getHTML());
            $viewData->setData('title', $pressPage->getTitle());
        } else {
            $pageData->setFound(false);
        }
    }

    public static function init() {
        self::setPath();
    }

    protected static function setPath($path = '') {
        if ($path !== '') {
            self::$path = self::$basePath . '/' . $path;
        } else {
            self::$path = self::$basePath . '/' . 'pages';
        }
    }

    protected static function getPage($pageName, $slug) {
        $pagesPath = FILEROOT . self::$path;

        if (!file_exists($pagesPath)) {
                return false;
        } else {
            $directory = new FileList($pagesPath);
            $filename  = $pageName . '.md';

            if(!$directory->hasFile($filename)) {
                return false;
            } else {
                $pressPage = new StaticPage($directory->getFileContent($filename), $slug);
                return $pressPage;
            }
        }
    }

    protected static function listPages() {
        $pagesPath = FILEROOT . self::$path;
        $directory = new FileList($pagesPath);
        $fileList   = $directory->getFileList();

        return array_map( function ($e) { 
            $pathArray = explode('/', $e);
            $fileName  = end($pathArray);
            $fileNameArray = explode('.', $fileName);
            $slug = $fileNameArray[0];

            return StaticPage::fromFile($e, $slug); 
        }, $fileList);
    }

    public static function getPageList() {
        self::init();
        return self::listPages();
    }

}