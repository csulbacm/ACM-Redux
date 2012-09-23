<?php

/* \class Router
 * \brief Handles URL routing
 * \author David Nuon <david@davidnuon.com>
 */

namespace Utility;

class Router extends JsonMap {
	protected $pages;

	function __construct($json) {
		parent::__construct($json);
		$this->parseJSON();
	}

	private function parseJSON() {
		$this->pages = $this->jsonArray["pages"];
	}

	public function getArray () {
		return $this->pages;
	}
}