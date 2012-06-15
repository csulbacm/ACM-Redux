<?php
class PHPDBD {
    public $about;
    public $aboutHTML;
	public $master;
	
	
	public function __construct ($version=-1) {
		$configF = parse_ini_file(INCPATH."/database/version.config.ini", true);
		//print_r($configF);
		//echo "hI1";
		if($version == -1) $version = $configF["PHPDBDINFO"]['latestVersion'];
		//echo "hI2";
		$this->about = $configF["PHPDBV$version"]['about'];
		//echo "hI3";
		$this->aboutHTML = $configF["PHPDBV$version"]['aboutHTML'];
		//echo "hI4". $configF["PHPDBV$version"]['phpdbdfile'];
		include(INCPATH."/database/"  . $configF["PHPDBV$version"]['phpdbdfile']);
		//echo "hI5";
		$this->master = new PHPDBMaster();
		//echo "hi";
		//print_r($configF);
	}

    // method declaration
    function info() {
        return $this->about;
    }
	function infoHTML() {
        return $this->aboutHTML;
    }
	
	function query($queryArray) {
		$item = $this->master->query($queryArray);
		return $item;
	}
}

?>