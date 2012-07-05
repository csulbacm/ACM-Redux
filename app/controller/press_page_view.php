<?php

namespace Controller\Pages;

class PressPageViewer extends PageViewer {
	public static function init() {
        self::setPath('press');
	}

	public static function main ($pageData, $viewData) {
        self::setPath('press');

        $viewData->setType('static-page-view');
        $slug = $pageData -> getPath();
        $pageName = $slug[1];

        $pressPage = self::getPage($pageName, $slug[1]);

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