<?php

/*
 *  \class Press Page
 *  \brief Model for a press page
 *  \author David Nuon <david@davidnuon.com>
 */
 
namespace Models\Documents;

include_once(dirname(dirname(__FILE__)) . '/utility/markdown.php');

class StaticPage {
    protected $markdown  = '';    
    protected $title     = '';
    protected $date      = '';
    protected $html      = '';
    protected $thumbnail = '';

    protected $js        = array();
    protected $css       = array();
    protected $slug      = '';
    
    function __construct($markdown = NULL, $slug = NULL) {
        if($markdown != NULL && $slug != NULL) {
            $this->markdown = $markdown;
            $this->slug = $slug;
        }

        $this->rendershortTags();
        $this->readAttributes();        
        $this->makeHTML();        
    }

    public static function fromFile($path, $slug) {
        $fileContents = file_get_contents($path);
        return new StaticPage($fileContents, $slug);
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
        $titlePattern = '/\/\/(\s|!?)Title:(\s|!?)(.*+)/';        
        preg_match_all($titlePattern, $this->markdown, $titleMatches);
        if(isset($titleMatches[3][0])) {
            $this->title = $titleMatches[3][0];
        }
        $this->markdown = preg_replace($titlePattern, '', $this->markdown);

        // Get date attribute
        $datePattern  = '/\/\/(\s|!?)Date:(\s|!?)(.*+)/';
        preg_match_all($datePattern, $this->markdown, $dateMatches);
        if(isset($dateMatches[3][0])) {
            $this->date = $dateMatches[3][0];
        }
        $this->markdown = preg_replace($datePattern, '', $this->markdown);

        // Get CSS attribute
        $cssPattern   = '/\/\/(\s|!?)(css|CSS):(\s|!?)(.*+)/';
        preg_match_all($cssPattern, $this->markdown, $cssMatches);
        if(isset($cssMatches[4][0])) {
            $cssArray = explode(',', $cssMatches[4][0]);
            $this->css = $cssArray;
        }
        $this->markdown = preg_replace($cssPattern, '', $this->markdown);

        // Get Javascirpt attribute
        $jsPattern   = '/\/\/(\s|!?)(JS|js):(\s|!?)(.*+)/';
        preg_match_all($jsPattern, $this->markdown, $jsMatches);
        if(isset($jsMatches[4][0])) {
            $jsArray = explode(',', $jsMatches[4][0]);
            $this->js = $jsArray;
        }
        $this->markdown = preg_replace($jsPattern, '', $this->markdown);       

        // Get Thumbnail Attribute        
        $thumbnailPattern = '/\/\/(\s|!?)Thumbnail:(\s|!?)(.*+)/';
        preg_match_all($thumbnailPattern, $this->markdown, $thumbnailMatches);
        if(isset($thumbnailMatches[3][0])) {
            $this->thumbnail = $thumbnailMatches[3][0];
        }
        $this->markdown = preg_replace($thumbnailPattern, '', $this->markdown);
    }


    private function makeHTML () {
        $this->html = Markdown($this->markdown);
    }
    
    public function getSlug() {
        return $this->slug;
    }

    public function getThumbnail () {
        return $this->thumbnail;
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