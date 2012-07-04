<?php

namespace Controller\Pages;
use Controller\Pages\PageViewer as PageViewer;

class PressPageViewer extends PageViewer {
	private static function init() {
        self::setPath('press');
	}

	public static function main ($pageData, $viewData) {
		self::init();

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

}