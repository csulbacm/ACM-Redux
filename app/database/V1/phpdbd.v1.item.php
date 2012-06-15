<?php
class PHPDBItem {
	private $path;
	private $argv;
	public $data;
	
	
	public function __construct ($type,$path,$argv = Array("LIMIT 1")) {
		$this->path = $path;
		$this->argv = $argv;
		if($type == "direct") {
			if(file_exists(DATABASEPATH. $path . ".xml")) {
				$data = implode("", file(DATABASEPATH. $path . ".xml"));
				$p = xml_parser_create();
				xml_parse_into_struct($p, $data, $vals, $indexs);
				xml_parser_free($p);
				$i = 0;
				//print_r($vals);
				foreach($vals as $index) {
					if($index['type'] != 'cdata') {
						if($index['type'] == 'complete') {
							$this->data[$index['tag']] = $index['value'];
							$i++;
						} 
						if($index['type'] == 'open') {
							$this->data[$index['tag']."#open"] = "@".$index['tag']."#open";
							$i++;
							//if($index['tag'] == "FORMAT") echo "hi";
						} 
						if($index['type'] == 'close') {
							$this->data[$index['tag']."#close"] = "@".$index['tag']."#close";
							$i++;
							//if($index['tag'] == "FORMAT") echo "ho";
						} 
						
					}
				}
			} else {
				$this->data = Array('ERROR' => "File doesn't exist");
			}
		}
		if($type == "new") {
			if(file_exists(DATABASEPATH. $path . "/master.xml")) {
					$data = implode("", file(DATABASEPATH. $path . "/master.xml"));
					$p = xml_parser_create();
					xml_parse_into_struct($p, $data, $vals, $indexs);
					xml_parser_free($p);
					$i = 0;
					$indx = 0;
					$f = 0;
					$d;
					foreach($vals as $index) {
						if($index['type'] != 'cdata') {
							if($index['type'] == 'complete') {
								$this->data[$index['tag']] = $index['value'];
								$i++;
								if($index['tag'] == "INDEX") $indx = $index['value']+1;
								if($f) {
									$d[$index['tag']] = $index['value'];
									if($index['value'] == "#index") $d[$index['tag']] = $indx;
									if(isset($argv[$index['tag']])) $d[$index['tag']] = $argv[$index['tag']];
									
								}
							} 
							if($index['type'] == 'open') {
								$this->data[$index['tag']."#open"] = "@".$index['tag']."#open";
								$i++;
								if($index['tag'] == "FORMAT") $f = 1;
							} 
							if($index['type'] == 'close') {
								$this->data[$index['tag']."#close"] = "@".$index['tag']."#close";
								$i++;
								if($index['tag'] == "FORMAT") $f = 0;;
							} 
							
						}
					}
					if(isset($argv['ID'])) $indx = $argv['ID'];
					$dataHolder = "<?xml version =\"1.0\"?>\r\n <V1>\r\n	<dbver>1</dbver>\r\n";
					foreach($d as $key => $itt) {
						$dataHolder .= "	<$key>$itt</$key>\r\n";
					}
					$dataHolder .= "</V1>";
					$myFile = "database/data" . $path . "/$indx.xml";
					//echo 
					$fh = fopen($myFile, 'w') or die("can't open file");
					fwrite($fh, $dataHolder);
					fclose($fh);
					
					//echo $dataHolder;
					//print_r($d);
				} else {
					$this->data = Array('ERROR' => "File doesn't exist");
				}
		}
		
	}
	
	public function toArray() {
		return $this->data;
	}
	
}
?>