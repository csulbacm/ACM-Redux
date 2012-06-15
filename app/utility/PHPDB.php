<?php
namespace Utility;

class PHPDBUtility {
	public $DBD;

	function __construct() {
		include_once(INCPATH.'/database/phpdbd.php');
		$this->DBD = new \PHPDBD();
	}
}

?>