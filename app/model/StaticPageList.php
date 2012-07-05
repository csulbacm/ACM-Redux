<?php

namespace Model;

use Models\Documents\StaticPage as StaticPage;
use Controller\BaseController as BaseController;
use Utility\FileList as FileList; 

class StaticPageList {
	protected $basePath = PAGESPATH;
	protected $path = "";

	function __construct($path) {
		$this->path = $this->basePath . '/' . $path;
	}

    public function getPage($pageName) {
        $pagesPath = FILEROOT . $this->path;

        if (!file_exists($pagesPath)) {
                return false;
        } else {
            $directory = new FileList($pagesPath);
            $filename  = $pageName . '.md';

            if(!$directory->hasFile($filename)) {
                return false;
            } else {
                $pressPage = new StaticPage($directory->getFileContent($filename), $pageName);
                return $pressPage;
            }
        }
    }

 	public function getPageList() {
        return $this->listPages();
    }

    private function setPath($path = '') {
        if ($path !== '') {
            $this->path = $this->basePath . '/' . $path;
        } else {
            $this->path = $this->basePath . '/' . 'pages';
        }
    }

    private function listPages() {
        $pagesPath = FILEROOT . $this->path;
        $directory = new FileList($pagesPath);
        $fileList   = $directory->getFileList();

        return array_map( function ($e) { 
            $pathArray = explode('/', $e);
            $fileName  = end($pathArray);
            $fileNameArray = explode('.', $fileName);
            $slug = $fileNameArray[0];

            return StaticPage::fromFile($e, $slug); 
        }, $fileList);
    }


}