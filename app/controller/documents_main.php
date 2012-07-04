<?php
/*!
 * \class Documents Main Page
 * \brief Contains the logic for the document main page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Utility\FileList as FileList;
use Models\Documents\Minutes as Minutes;

class DocumentMain {
    public static function main($pageData, $viewData) {

        $viewData->setType('documents');
                       
        $viewData->setData('minutes-listing', self::getMinutesList());
        $viewData->setData('charters', self::getCharterList()["open"]);
        $viewData->setData('closed-charters', self::getCharterList()["closed"]);
    }

    public static function getMinutesList() {
        $minutes            = new FileList(FILEROOT . '/static/data/minutes/');
        $minutesList        = $minutes->getDirList();

        $minutesPageListing = array();
        
        foreach ($minutesList as $minutesItem) {
            $stringArray = explode('/', $minutesItem);
            $date        = $stringArray[count($stringArray) - 1];
            
            $minutesPage = new Minutes('2', array(1), $date, 'General Meeting', rx_siteURL('minutes-view/' . $date));
            $minutesPageListing[] = $minutesPage->getData();
        }

        return array_reverse($minutesPageListing);
    }

    public static function getCharterList() {
        $charters = new FileList(FILEROOT . '/static/data/charters/project/');        

        // Map all charters with a web url
        $projectCharters    = array_map(function($e) {
            return array( 'name' => $e, 
                'url'  => SITEROOT . 'static/data/charters/project/' . $e );
                
        }, $charters->getFileList(true));
        
        // Map all closed charters with a web url                        
        $closedCharters    = array_map(function($e) {
            return array( 'name' => $e, 
                'url'  => SITEROOT . 'static/data/charters/project/closed/' . $e );
                
        }, $charters->returnDir('closed')->getFileList(true));

        return array(
            "closed" => $closedCharters,
            "open"   => $projectCharters
        );
    }
}