<?php

namespace Controller\Pages;
use Controller\Pages\PageViewer as PageViewer;

class PressPageViewer extends PageViewer {
	public static function main ($pageData, $viewData) {
	    \Controller\Pages\PageViewer::main($pageData, $viewData);
	}
}