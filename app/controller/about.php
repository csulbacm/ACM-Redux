<?php
/*!
 * \class About  Page
 * \brief Contains the logic for the about
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Utility\FileList as FileList;

class About {
    public static function main($pageData, $viewData) {
       $viewData->setType('about');

       // The list of all the administrative years we have recorded
       $aboutFileList = new FileList(FILEROOT . '/static/data/about/');
       $directoryList = $aboutFileList->getDirList(true);
       
       // Some year folders may be missing data, we don't count them as valid
       // These are used for links in the bar to access previous years
       
       $validYears = array();
       $urlMap = array();
       
       foreach ($directoryList as $directory) {
           $year = $directory;
           $root = FILEROOT . '/static/data/about/';
           $basePath = $root . $year . '/';
           
           if(self::yearDirCheck($root, $year)) {
                array_push($validYears, $directory);             
           }
       }           
       sort($validYears);
       
       foreach ($validYears as $year) {
           array_push($urlMap, array(
                "url" => rx_siteURL('about/' . $year),
                "name" => $year
           ));
       }
       
       // Now, by using the slug in the url, diplsay the appropriate adminstration page
       $year = "";           
       $slugs = $pageData->getPath();
       
       if(count($slugs) === 1) {
            $year = $validYears[count($validYears) - 1];
       } else {
            $year = $slugs[1];
       }
       
       if(in_array($year, $validYears)) {
           $root = FILEROOT . '/static/data/about/';
           $basePath = $root . $year . '/';       
           
           if(self::yearDirCheck($root, $year)) {
                $viewData->setData('admin', file_get_contents($basePath . 'admin.html'));
                $viewData->setData('officers', file_get_contents($basePath . 'officers.html'));         
                $viewData->setData('year', $year);
                $viewData->setData('allYears', $urlMap);
                
                $viewData->setData('arbitraryTop', 
                    '<style type="text/css">body { background-image: url(' .
                        SITEROOT . 'static/data/about/' . $year . '/photo.jpg' .
                        ');}</style>' );
           } else {
               $pageData->setFound(false);    
           }
       } else {
           $pageData->setFound(false);
       }
    }

    /*!
     * Returns a boolean of whether the directory is valid or not
     *      \param $year string
     *      \return boolean
     *      \private
     *      \static 
     */
    private static function yearDirCheck($root, $year) {
        $basePath = $root . $year . '/';
        $yearFileList = new FileList($basePath);
        return ($yearFileList->hasFile('admin.html') && $yearFileList->hasFile('officers.html'));
    }
}
