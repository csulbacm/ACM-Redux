<?php

/* \class Config
 * \brief Handles URL routing
 * \author David Nuon <david@davidnuon.com>
 */

namespace Utility;

class Config extends JsonMap{
	protected $settings;
	protected $siteSettings;

	function __construct($json) {
		parent::__construct($json);
		$this->parseJSON();
	}

	private function parseJSON() {
		$this->settings = $this->jsonArray;
		$this->siteSettings = $this->settings["site"];
	}

	public function getIndexSplash() {
		$splashURL = $this->settings["site"]["splash"]["url"];
		$splashImage = $this->settings["site"]["splash"]["image"];

		return Array(
			"url" => rx_siteURL($splashURL),
			"image" => $splashImage
		);
	}
}