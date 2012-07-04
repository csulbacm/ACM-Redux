<?php

/* \class Router
 * \brief Handles URL routing
 * \author David Nuon <david@davidnuon.com>
 */

namespace Utility;

class Router {
	protected $json     = "";
	protected $jsonArray = array();
	protected $routeMap = "";

	function __construct($json) {
		$this->json = $json;
		$this->parseJSON();
	}

	private function parseJSON() {	
		$this->jsonArray = json_decode($this->json, true)["pages"];
	}

	public function getArray () {
		return $this->jsonArray;
	}

	public function getRoute($slug) {
		// Check to see with the slug is in the map
		// If yes: return the information of the page
		// If no: return false
	}
}