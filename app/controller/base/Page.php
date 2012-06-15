<?php
/*!
 * Page
 * \brief Manages the page information such as includes css and JavaScript.* 
 * \author David Nuon <david@davidnuon.com> 
 */

namespace Controller;

class Page {
    protected $title         = "";
    protected $page_template = "";
    protected $urlString     = "";
    protected $found         = true;

    protected $css  = array();
    protected $js   = array();

	protected $breadCrumb = array();
	
    protected $tags = array();
    
	function __construct() {
		$homeURL = rx_siteURL();
		$this->addCrumb(array('Home', $homeURL));
	}
	
	
    // Setters

    /*!
     * Sets the found status of the page
     *      \param $bool boolean
     *      \public 
     */

     public function setFound($bool) {
        $this->found = $bool;    
     }   
       
    /*!
     * Sets the title for the page
     *      \param $title string
     *      \public 
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /*!
     * Sets the view template for the page
     *      \param $view string
     * 
     */
    public function setView($view) {
        $this->page_template = $view;
    }

    /*!
     * Sets the CSS files for the page
     *      \param $CSSArray array
     *      \public 
     */
    
    public function setCSS($CSSArray) {
        if(gettype($CSSArray) === "array") {
            $this->css = $CSSArray;
        }
    }

    /*!
     * Sets the url string that will be used to determine the path.
     *      \param $url string
     */

    public function setPath($url) {
          $this->urlString = $url;
    }
	
	/*! 
	 * Sets the breadcrumb as an array
	 * 		\param $breadCrumb array
	 */
	
	public function addCrumb($breadCrumb) {
		if(gettype($breadCrumb) === 'array' &&
				   count($breadCrumb) === 2) {
			$this->breadCrumb[] = $breadCrumb;
		}
	}

    /*!
     *  Returns a boolean of whether the page is found
     *      \return boolean
     * 
     */
    
    public function found() {
        return $this->found;
    }

    /*!
     *  Returns an array representing the path of the url
     *      \return array
     * 
     */
    public function getPath() {
        return explode('/', $this->urlString);
    }

    /*!
     *  Returns a string that is the slug of the url.
     *  Returns an empty string if there is no slug.
     *      \return string
     *
     */

     public function getSlug() {
         $pathArray = $this->getPath();
         if(count($pathArray) > 0) {
             return $pathArray[0];
         } else {
             return '';
         }
     }

     /*!
     * Returns a string of HTML for the CSS
     *      \return string
     */
    public function getCSS() {
        global $defaultCSS;
        $out = "";
        $cssArray = array();

        if(count($this->css) <= 0) {
            $cssArray = $defaultCSS;
        } else {
            $cssArray = $this->css;
        }

        foreach ($cssArray as $CSSFile) {
        	// rx_cssURL returns its input if it is already a url (starting with SITEROOT)
        	
        	// If $CSSFIle does not start with SITEROOT 
        	if(rx_cssURL($CSSFile) != $CSSFile) { 
	            $out .= '<link rel="stylesheet" type="text/css" ' .
	                    ' href="' . rx_cssURL($CSSFile) . '" />';
			} else {
	            $out .= '<link rel="stylesheet" type="text/css" ' .
	                    ' href="' . $CSSFile . '" />';				
			}
        }

        return $out;
    }

    /*!
     * Returns a string representing the breadcrumb
     *      \return string
     */

     public function getBreadCrumb() {
     	$out    = '';
		$length = count($this->breadCrumb);
		
		for($count = 0; $count <= $length - 1; $count++) {			
			if ($count === $length - 1) {
				$out .= '<strong>' . $this->breadCrumb[$count][0] . '</strong>';	
			} else {
				$out .= '<a href="' . $this->breadCrumb[$count][1] . '">';
				$out .= $this->breadCrumb[$count][0] . '</a> / ';
			}
		}
		
		return $out;
     }
     
    /*!
     * Returns a string of HTML for the JavaScript
     *      \return string
     */
    public function getJS() {

    }

    /*!
     * Returns a string of HTML for the meta-description
     *      \return string
     */
    public function getTags() {

    }

    /*!
     * Returns thte title
     *      \return string
     */
    public function getTitle() {
        return $this->title;
    }

    /*!
     * Returns the HTML for the page
     *      \return string
     */
    public function renderPage() {
        renderView($this->page_template);
    }
    
}