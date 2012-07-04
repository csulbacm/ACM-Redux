<?php
/*!
 * \class Minutes View Page
 * \brief Contains the logic for viewing a project page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use \Utility\FileList as FileList;
use \Models\Documents\MarkdownMinutes as MarkdownMinutes;

class MinutesView {
    public static function main($pageData, $viewData) {
        $viewData->setType('minutes-view');

        $slug = $pageData -> getPath();
        $dateName = $slug[1];
        $path = FILEROOT . '/static/data/minutes/' . $dateName;

        if (!file_exists($path)) {
            $pageData -> setFound(false);
        } else {
            $directory = new FileList(FILEROOT . '/static/data/minutes/' . $dateName);
            $viewData -> setData('dateName', $dateName);
            $minutesType = "xhtml";

            if ($directory -> hasFile('minutes.md')) {
                $minutesType = "markdown";
            } else if ($directory -> hasFile('minutes.xhtml')) {
                $minutesType = "xhtml";
            } else {
                $minutesType = "none";
            }

            // Files that have a FS Path or a web path
            $HardFiles = $directory -> getFileList();
            $webFiles = $directory -> getFileList(true);

            // Generate the file links for the document list
            $documentURLS = array_map(function($e) {
                $dateName = rx_getData('dateName');
                return array('name' => $e, 'url' => SITEROOT . '/static/data/minutes/' . $dateName . '/' . $e);
            }, $webFiles);

            if ($minutesType === "xhtml") {
                $data = $directory -> getFileContent('minutes.xhtml');
                $firstHalf = explode('<body>', $data);
                $secondHalf = explode('</body>', $firstHalf[1]);
                $viewData -> setData('minutes-content', $secondHalf[0]);
            }

            if ($minutesType === "markdown") {
                $data = $directory -> getFileContent('minutes.md');
                $markdownMinutes = new MarkdownMinutes($data);

                $viewData -> setData('minutes-content', $markdownMinutes -> getMinutesHTML());
                $viewData -> setData('sidebar-content', $markdownMinutes -> getSidebar());
            }

            $viewData -> setData('dir', $documentURLS);

            // Add breadcrumbs
            $pageData -> addCrumb(array('Documents', rx_siteURL('documents')));
            $pageData -> addCrumb(array('Viewing Minutes Page', '#'));
        }
    }
}
