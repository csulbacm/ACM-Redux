<?php

/* \class JsonMap
 * \brief Handles Json to be used by other classes
 * \author David Nuon <david@davidnuon.com>
 */

namespace Utility;

class JsonMap {
	protected $json     = "";
	protected $jsonArray = array();
	protected $routeMap = "";

	function __construct($json) {
		$this->json = $json;
		$this->jsonArray = json_decode($this->json, true);
	}

}