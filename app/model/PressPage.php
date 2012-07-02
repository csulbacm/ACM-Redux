<?php

/*
 *  \class Press Page
 *  \brief Model for a press page
 *  \author David Nuon <david@davidnuon.com>
 */
 
namespace Models\Documents;

include_once(dirname(dirname(__FILE__)) . '/utility/markdown.php');

class PressPage {
    protected $markdown = '';    
    protected $title    = '';
    protected $date     = '';
    protected $html     = '';
    protected $js       = array();
    protected $css      = array();
    
    function __construct($markdown = NULL) {
        if($markdown != NULL) {
            $this->markdown = $markdown;
        }

        $this->rendershortTags();
        $this->readAttributes();        
        $this->makeHTML();        
    }
    
    private function rendershortTags() {
        // Homebrewed Image Tag
        // Markdown leaves images in <p> tags, so we use this instead.
        $imageRegex = '/\[image:\s(.*)\]+/';
        preg_match_all($imageRegex, $this->markdown, $imageMatches);

        for($i = 0; $i < count($imageMatches[0]); $i++) {  

            $imageString = "<img src=\"". $imageMatches[1][$i] . "\" alt=\"\" />"; 

            $this->markdown = str_replace($imageMatches[0][$i], $imageString, $this->markdown);
        }

    }

    private function escapeRegex($str) {
        $out = $str;

        return $out;
    }

    private function readAttributes() {
        // Find the attributes of the page
        // They all look like C-style comments

        // Get title attribute
        $titleRegex = '/\/\/(\s|!?)Title:(\s|!?)(.*+)/';        
        preg_match_all($titleRegex, $this->markdown, $titleMatches);
        if(isset($titleMatches[3][0])) {
            $this->title = $titleMatches[3][0];
        }
        $this->markdown = preg_replace($titleRegex, '', $this->markdown);

        // Get date attribute
        $dateRegex  = '/\/\/(\s|!?)Date:(\s|!?)(.*+)/';
        preg_match_all($dateRegex, $this->markdown, $dateMatches);
        if(isset($dateMatches[3][0])) {
            $this->date = $dateMatches[3][0];
        }
        $this->markdown = preg_replace($dateRegex, '', $this->markdown);

        // Get CSS attribute
        $cssRegex   = '/\/\/(\s|!?)(css|CSS):(\s|!?)(.*+)/';
        preg_match_all($cssRegex, $this->markdown, $cssMatches);
        if(isset($cssMatches[4][0])) {
            $cssArray = explode(',', $cssMatches[4][0]);
            $this->css = $cssArray;
        }
        $this->markdown = preg_replace($cssRegex, '', $this->markdown);

        // Get Javascirpt attribute
        $jsRegex   = '/\/\/(\s|!?)(JS|js):(\s|!?)(.*+)/';
        preg_match_all($jsRegex, $this->markdown, $jsMatches);
        if(isset($jsMatches[4][0])) {
            $jsArray = explode(',', $jsMatches[4][0]);
            $this->js = $jsArray;
        }
        $this->markdown = preg_replace($jsRegex, '', $this->markdown);
        
   
    }
    

    private function makeHTML () {
        $this->html = Markdown($this->markdown);
    }
    
    public function getHTML() {
        return $this->html;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getDate() {
        return $this->date;
    }

    public function getCSS() {
        return $this->css;
    }

    public function getJS() {
        return $this->js;
    }
}
