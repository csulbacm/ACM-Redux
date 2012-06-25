<?php

/*!
 * \class FileList
 * \brief Class for handling files
 * \author David Nuon <david@davidnuon.com>
 *
 */

namespace Utility;

class FileList {

    protected $files = array();
    protected $dir = array();

    protected $filesRelative = array();
    protected $dirRelative = array();

    protected $allObjects = array();
    protected $root = '';
    public $valid = false;

    function __construct($dir) {
        if (is_dir($dir)) {
            $this -> root = $dir;
            $this -> allObjects = scandir($dir);

            foreach ($this->allObjects as $object) {
                if (!stringBeginsWith($object, '.')) {
                    if (is_dir($dir . '/' . $object)) {
                        $this -> dir[] = $dir . '/' . $object;
                        $this -> dirRelative[] = $object;
                    } else {
                        $this -> files[] = $dir . '/' . $object;
                        $this -> filesRelative[] = $object;
                    }
                }
            }
            $this -> valid = true;
        }
    }

    /*!
     *	Returns a boolean of whether this directory contains a file
     * 		\param  $inputFile string
     * 		\return bool
     */

    function hasFile($inputFile) {
        return file_exists($this -> root . '/' . $inputFile);
    }

    /*!
     *	Returns a boolean of whether this directory contains a directory
     * 		\param  $inputDir string
     * 		\return bool
     */

    function hasDir($inputDir) {
        return is_dir($this -> root . '/' . $inputDir);
    }

    /*!
     *	Returns a FileList object if a directory exists in this directory
     * 		\param  $inputDir string
     * 		\return FileList
     */

    function returnDir($inputDir) {
        if ($this -> hasDir($inputDir)) {
            return new \Utility\FileList($this -> root . '/' . $inputDir);
        }
    }

    /*
     * 	Returns a list of directories.
     *      \param $relative boolean
     * 		\return array
     */

    function getDirList($relative = false) {
        if ($relative) {
            return $this -> dirRelative;
        } else {
            return $this -> dir;
        }
    }

    /*!
     * 	Returns a list of files.
     *      \param $relative boolean
     * 		\return array
     */

    function getFileList($relative = false) {
        if ($relative) {
            return $this -> filesRelative;
        } else {
            return $this -> files;
        }
    }

    /*!
     * 	Returns a list of files and directories.
     * 		\return array
     */

    function getAll() {
        return $this -> allObjects;
    }

    /*!
     * 	Returns the contents of a file as a stirng if it exits
     * 		\return mixed
     */

    function getFileContent($file) {
        $output = false;

        if ($this -> hasFIle($file)) {
            $output = implode("", file($this -> root . '/' . $file));
        }

        return $output;
    }

}
