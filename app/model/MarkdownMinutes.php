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
		
    /*!
     *  Generates the markdown for the minutes 
     *      \param  none
     *      \return none
     */
        
	protected function generateMinutesHTML() {
		$this->minutesHTML .= Markdown($this->markdown);
	}

    /*!
     *  Generates the sidebar for the officer listing 
     *      \param  none
     *      \return none
     */
	
	protected function generateSidebar() {
		$stringArray = explode("\n", $this->markdown);
		$sidebarArray = array();
		
        // Some flags
		$seekOfficers  = true;
		$foundRollCall = false;
		$officerLevel  = 0;
		
        // The headers we are looking for
		$rollCallHeader = "Roll Call";
		$officerHeaders	= array("Administrative Cabinet", 
								"Appointed Positions", 
								"Project Managers");		
				
		$addingOfficers = false;
		
		for($i = 0; $i < count($stringArray) && $seekOfficers; $i++) {
			$currentLine = $stringArray[$i];
            
            // When we find the roll call header, we start
			if (strpos($currentLine, $rollCallHeader)) {
				$foundRollCall = true;
			} else {
				if($foundRollCall) {
					$currentHeader = $officerHeaders[$officerLevel];
					$hasHeader     = strpos($currentLine, $currentHeader);
					
					if($hasHeader) {
                       $officerLevel++;
                       $addingOfficers = true;
                       
                       // Officers will be in a list that is in an array
                       // along with the officer type
                       array_push($sidebarArray, array(
                            "type" => $currentHeader,
                            "officers" => array()
                       ));
					}
                    
                   if($addingOfficers) {
                        if(!$hasHeader) {
                            // Get the name of the officers and positions
                            preg_match_all('/\S..(.*)\s-\s(.*):\W/', $currentLine, $matches);                       
                            // If there are matches, add an array with officer's info to the
                            // list
                            
                            if(isset($matches[2][0]) && $matches[1][0]) {
                                $name = $matches[2][0];
                                $position = $matches[1][0];
                                
                                array_push($sidebarArray[count($sidebarArray) - 1]["officers"], array(
                                    "name" => $name,
                                    "position" => $position
                                ));
                            }                            
                        } 
                    }                         
				}
			}
            
            // After going through the officer types, we stop looping
            if ($officerLevel >= count($officerHeaders)) {
                $seekOfficers = false;
            }
 		} 
										
		$this->sidebar = $sidebarArray;
	}

    /*!
     *  Returns the markdown for the minutes 
     *      \param  none
     *      \return string
     */

	function getMarkdown() {
		return $this->markdown;
	}

    /*!
     *  Returns the html for the minutes 
     *      \param  none
     *      \return string
     */

	function getMinutesHTML() {
		return $this->minutesHTML;
	}
	
    /*!
     *  Returns the officer list array for the minutes 
     *      \param  none
     *      \return array
     */
    
	function getSidebar() {
		return $this->sidebar;
	}
		
}