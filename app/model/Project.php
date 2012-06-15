<?php
/*!
 *  \class Project
 *  \brief Structure for a project page
 *  \author David Nuon <david@davidnuon.com>
 * 
 */
namespace Models\Project;

class ProjectStatus {
    const Finished  = 'Finished Project';
    const Ongoing   = 'Ongoing Project';
    const Evergreen = 'Evergreen Project';
    const Inative   = 'Project on Hiatus';
    const Closed    = 'Project is Closed';
}

class Project {
    protected $name           = '';
    protected $shortName      = '';
    protected $tagLine        = '';
    protected $abstract       = '';
    protected $pageContent    = '';
    protected $teamContent    = '';
    protected $blogData       = array();

    protected $hasCSS = false;
    protected $status = ProjectStatus::Inative;

    function __construct($name = NULL, $shortName = NULL, $tagLine = NULL, $abstract = NULL,
        $pageContent = NULL, $teamContent = NULL, 
        $blogData = NULL, $hasCSS = false, $status = ProjectStatus::Inative) {

        $valid = true;
        foreach (func_get_args() as $arg) {
            if($arg === NULL) {
                $valid = $false;
            }
        }

        if($valid) {
            $this->name        = $name;
            $this->shortName   = $shortName;
            $this->tagLine     = $tagLine;
            $this->abstract    = $abstract;
            $this->pageContent = $pageContent;
            $this->teamContent = $teamContent;
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
    public function getTagLine() {
        return $this->tagLine;
    }

    /*!
     *
     * Returns the abstract of the project
     *      \return string
     */
    public function getAbstract() {
        return $this->abstract;
    }

    /*!
     *
     * Returns the page content of the project
     *      \return string
     */
    public function getPageContent() {
        return $this->pageContent;
    }

    /*!
     *
     * Returns the team content of the project
     *      \return string
     */
    public function getTeamContent() {
        return $this->teamContent;
    }

    /*!
     *
     * Returns the thumdnail url for the project
     *      \return string
     */
    public function getThumbURL() {
        return DATADIR . 'project/' . $this->shortName . '/img/thumb.png';
    }

    /*!
     *
     * Returns the blog data of the project
     *      \return string
     */
    public function getBlogData() {
        return $this->blogData;
    }

    /*!
     *
     * Returns the abstract of the project
     *      \return string
     */
    public function getCSS() {
        return DATADIR . 'project/' . $this->shortName . '/style.css';
    }
    
    /*!
     *
     * Returns the status of the project
     *      \return string
     */
    public function getStatus() {
        return $this->status;
    }
}