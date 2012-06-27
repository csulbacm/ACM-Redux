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
    protected $HTML     = '';
    
    function __construct($markdown = NULL) {
        if($markdown != NULL) {
            $this->markdown = $markdown;
        }

        $this->readAttributes();        
        $this->makeHTML();        
    }
    
    private function readAttributes() {
        // Find the attributes of the page
        $titleRegex = '/\/\/(\s|!?)Title:(\s|!?)(.*+)/';
        $dateRegex  = '/\/\/(\s|!?)Date:(\s|!?)(.*+)/';
        $commentRegex = '/\/\/(.*+)/';
        
        $pageTitle = preg_match_all($titleRegex, $this->markdown, $titleMatches);
        $pageDate = preg_match_all($dateRegex, $this->markdown, $dateMatches);
        
        if(isset($titleMatches[3][0])) {
            $this->title = $titleMatches[3][0];
        }
        
        if(isset($dateMatches[3][0])) {
            $this->date = $dateMatches[3][0];
        }
                
        $this->markdown = preg_replace($commentRegex, '', $this->markdown);
   
    }
    
    private function makeHTML () {
        $this->HTML = Markdown($this->markdown);
    }
    
    public function getHTML() {
        return $this->HTML;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getDate() {
        return $this->date;
    }
}
