<?php
/*!
 *  \class Project
 *  \brief Structure for a project page
 *  \author David Nuon <david@davidnuon.com>
 * 
 */
namespace Models\Documents;

class AlumniProfile {
    protected $name        = '';
    protected $shortName   = '';
    protected $quote       = '';
    protected $discovery   = '';
    protected $motivation  = '';
    protected $advice      = '';
    protected $activeYears = '';
    protected $activity    = '';
    protected $desc        = '';
    protected $memory      = '';


    function __construct($name = NULL, $shortName = NULL, $quote = NULL, $discovery = NULL,
        $motivation = NULL, $advice = NULL, $activeYears = NULL, $activity = NULL,
        $desc = NULL, $memory = NULL, $email = NULL) {

        $valid = true;
        
        foreach (func_get_args() as $arg) {
            if($arg === NULL) {
                $valid = $false;
            }
        }

        if($valid) {
            $this->name        = $name;
            $this->shortName   = $shortName;
            $this->quote       = $quote;
            $this->discovery   = $discovery;
            $this->motivation  = $motivation;
            $this->advice      = $advice;
            $this->activeYears = $activeYears;
            $this->activity    = $activity;
            $this->desc        = $desc;
            $this->memory      = $memory;
            
            $this->blogData    = $blogData;
            
            $this->hasCSS      = $hasCSS;
            $this->status      = $status;
        }
    }

    /*!
     *
     * Returns the name of the project
     *      \return string
     */
    public function getName() {
        return $this->name;
    }

    /*!
     *
     * Returns the short name of the project
     *      \return string
     */
    public function getShortName() {
        return $this->shortName;
    }
    
    /*!
     *
     * Returns the tag lin of the project
     *      \return string
     */
    public function getQuote() {
        return $this->quote;
    }

    /*!
     *
     * Returns the discovery of the project
     *      \return string
     */
    public function getDiscovery() {
        return $this->discovery;
    }

    /*!
     *
     * Returns the page content of the project
     *      \return string
     */
    public function getMotivation() {
        return $this->motivation;
    }

    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getAdvice() {
        return $this->advice;
    }
    
    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getActiveYears() {
        return $this->activeYears;
    }

    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getActivity() {
        return $this->activity;
    }

    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getDescription() {
        return $this->desc;
    }

    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getMemory() {
        return $this->memory;
    }


    /*!
     *
     * Returns the thumdnail url for the project
     *      \return string
     */
    public function getPhoto() {
        return DATADIR . 'alumni/' . $this->shortName . '.jpg';
    }

    /*!
     *
     * Returns the blog data of the project
     *      \return string
     */
    public function getEmail() {
        return $this->email;
    }

}