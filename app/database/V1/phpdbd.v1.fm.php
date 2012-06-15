<?php
echo "hhiiii";
class PHPDBDFileManager {
	
	function readFile($fileName) {
		$data = "";
		if(file_exists($fileName)) {
			$data = implode("", file($fileName));
		}
		
		return $data;
	}
	
	public function parseFile($fileName) {
		echo "ksfu";
		$data = $this->readFile($fileName);
		$p = xml_parser_create();
		xml_parse_into_struct($p, $data, $vals, $indexs);
		xml_parser_free($p);
		$i = 0;
		foreach($vals as $index) {
			if($index['type'] != 'cdata') {
				if($index['type'] == 'complete') {
					$dataArray[$index['tag']] = $index['value'];
					$i++;
				} 
				if($index['type'] == 'open') {
					$dataArray[$index['tag']."#open"] = "@".$index['tag']."#open";
					$i++;
					//if($index['tag'] == "FORMAT") echo "hi";
				} 
				if($index['type'] == 'close') {
					$dataArray[$index['tag']."#close"] = "@".$index['tag']."#close";
					$i++;
				} 
				
			}
		}
		print_r($dataArray);
	}
	
	public function readDBFile($db,$user,$id) {
	
	}
	
	public function writeFile($fileName, $data) {
	
	}
	
	public function writeXMLFile($fileName, $data) {
	
	}
	
	public function writeDBFile($db,$user,$id,$data) {
	
	}

}

?>