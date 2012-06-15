<?php

/*!
 * \class Minutes
 * \brief Structure for a Minutes
 * \author David Nuon <david@davidnuon.com>
 */

namespace Models\Documents;

class Minutes {
	protected $HTMLData  = '';
	protected $documents = array();
	protected $date      = '';
    protected $name      = '';
    protected $URL       = '';

 	function __construct($HTMLData = NULL, $documents = NULL, $date = NULL, $name = NULL, $URL = NULL) {
 		$valid = true;

 		foreach(func_get_args() as $arg) {
 			if($arg == NULL) {
 				$valid = false;
 			}
  		}

  		if($valid) {
  			$this->HTMLData  = "$HTMLData";
  			$this->documents = $documents;
  			$this->date      = $date;
            $this->name      = $name;
            $this->URL       = $URL;
  		}
 	}
    
    /*! 
     * 
     * Returns an array of data for the minutes
     *  \return array 
     */
    
    function getData() {
        return array(
            'HTMLData'  => $this->HTMLData,
            'documents' => $this->documents,
            'date'      => $this->date,
            'name'      => $this->name,
            'URL'       => $this->URL
        );
    }
}