<?php
/*!
 * ViewData
 * \brief Manages the information specific to a page type (e.g serialized projects 
 *        a project page)
 * \author David Nuon <david@davidnuon.com> 
 */

namespace Controller;

class ViewData {
    /*!
        \brief The type of view the data is for. For example, if it was 'blog'
         it should only contain data for a blog. This is used to verify that
         the right data is being used for the proper view. 
        \protected
    */
    
    protected $viewType = '';

    /*!
        \protected
        \brief Any data to be used in a template is stored here. 
    */    
    protected $viewData = array();
    

    /*!
     * \brief Sets the vieeType
     * \param $type string
     * \public
     */
    public function setType($type) {
        if($type) {
            $this->viewType = $type;
        }
    }
    
    /*!
     * \brief Sets an attribute for the viewData.
     * \param $name string
     * \param $data mixed
     * \public
     */
    public function setData($name, $data) {
        $this->viewData[$name] = $data;
    }

    /*!
     * \brief Returns the type of the view as a string
     * \return string
     * \public
     */
    public function getType() {
        if($this->viewType) {
            return $this->viewType;
        }
    }

    /*!
     * \brief Returns the value of an attribute from viewData.
     * \return mixed
     * \public
     */
    public function getData($name) {
        if(isset($this->viewData[$name])) {
            return $this->viewData[$name];
        }
    }
    
}