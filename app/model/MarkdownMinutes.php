<?php

/*!
 * \class MarkdownMinutes
 * \brief Structure for a Minutes in Markdown
 * \author David Nuon <david@davidnuon.com>
 */

namespace Models\Documents;

include_once(dirname(dirname(__FILE__)) . '/utility/markdown.php');

class MarkdownMinutes {
	protected $markdown 	= "";
	protected $minutesHTML  = "";
	protected $sidebar      = "";
	
	function __construct($markdownText = NULL) {
		if ($markdownText != NULL) {
			$this->markdown = $markdownText;
			$this->generateMinutesHTML();
			$this->generateSidebar();
		}		
	}
		
	protected function generateMinutesHTML() {
		$this->minutesHTML .= Markdown($this->markdown) . "html 23232";
	}
	
	protected function generateSidebar() {
		$stringArray = explode("\n", $this->markdown);
		$this->sidebar = $stringArray;
	}

	function getMarkdown() {
		return $this->markdown;
	}

	function getMinutesHTML() {
		return $this->minutesHTML;
	}
	
	function getSidebar() {
		return $this->sidebar;
	}
		
}