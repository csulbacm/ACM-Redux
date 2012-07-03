<?php
namespace Controller;

class BaseController {
	protected function redirect($base ,$path) {
		header("Location: " . SITEROOT . $base . "/" . $path);
		die();
	}
}