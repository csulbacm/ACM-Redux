<?php

/* \class Router
 * \brief Handles URL routing
 * \author David Nuon <david@davidnuon.com>
 */

class Route {
	protected $view       = "";
	protected $controller = "";
	protected $route      = ""; // Regex patter
	protected $url        = ""; // Incoming url that user puts in

	public function __construct($view, $controller, $route, $url = "") {
		$this->view = $view;
		$this->controller = $controller;
		$this->route = $route;
		$this->url = $url;
	}

	public function getSlugs() {
		// Apply the route pattern on url to return the slugs of the
		// route
	}

}