<?php

/*!
 * \class Press Viewer
 * \brief Contains the logic for viewing a press page. A press page is a static page.
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;

use Model\StaticPageList as StaticPageList;

class PageView {
    public static function main ($pageData, $viewData) {
        $viewData->setType('static-page');

        $slug = $pageData -> getPath();
        $pageCategory = $slug[0];
        $pageName = $slug[1];
    
        $pageList = new StaticPageList($pageCategory);
        $pressPage = $pageList->getPage($pageName);

        if($pressPage !== false) {
            $viewData->setData('page-listing', $pageList->getPageList());
            $viewData->setData('page-css', $pressPage->getCSS());
            $viewData->setData('page-js', $pressPage->getJS());
            $viewData->setData('content', $pressPage->getHTML());
            $viewData->setData('title', $pressPage->getTitle());
        } else {
            $pageData->setFound(false);
        }
    }
}