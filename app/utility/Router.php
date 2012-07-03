<?php

/* \class Router
 * \brief Handles URL routing
 * \author David Nuon <david@davidnuon.com>
 */

namespace Utility;

class Router {
	protected $json     = "";
	protected $parsedJSON = array();
	protected $routeMap = "";

	function __construct($json) {
		$this->json = $json;
		$this->parseJSON();
	}

	private function parseJSON() {
		$this->parsedJSON = json_decode($this->json, true);
	}

	public function getArray () {
		return $this->parsedJSON;
	}

	public function getRoute($slug) {
		// Check to see with the slug is in the map
		// If yes: return the information of the page
		// If no: return false
	}
}