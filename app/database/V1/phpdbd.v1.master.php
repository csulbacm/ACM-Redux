<?php
class PHPDBMaster
{

	public function hi() {
		echo "sup dude";
	}
	public function query($queryArray) {
		if($queryArray['type'] == "getall") {
			//echo "hi";
			include_once(INCPATH."/database/V1/phpdbd.v1.dataitem.php");
			//echo "hiiiii";
			$handle = opendir(DATABASEPATH. $queryArray['DATABASE'] . "/" . $queryArray['USER'] );
			//echo DATABASEPATH. $queryArray['DATABASE'];
			$dataOut = new PHPDBDItem($queryArray['DATABASE'], $queryArray['USER'],0);
			$highest = 0;
			if ($handle) {
				while (false !== ($entry = readdir($handle))) {
				//echo "including";
					$filePath = DATABASEPATH. $queryArray['DATABASE']. '/'.$entry;
					//echo $filePath;
					if(!is_dir($filePath)) {
						//echo $filePath."\r\n";
						$kadh = split("\.",$entry,2);
						//if(intval($kadh[0]) > $highest) $highest = $kadh[0];
						$dataOut->addFile($queryArray['DATABASE'],$queryArray['USER'],intval($kadh[0]));
					}
				}
			}
			return $dataOut;
		}
		if($queryArray['type'] == "get") {
			//echo "hi";
			include_once(INCPATH."/database/V1/phpdbd.v1.dataitem.php");
			//echo "hiiiii";
			return new PHPDBDItem($queryArray['DATABASE'], $queryArray['USER'],$queryArray['ID']);
		}
		if($queryArray['type'] == "list") {
			include_once(INCPATH."/database/V1/phpdbd.v1.dataitem.php");
			//echo "hiiiii";
			$dataHolder = new PHPDBDItem($queryArray['DATABASE']);
			//var_dump($dataHolder);
			$handle = opendir(DATABASEPATH. $queryArray['DATABASE']);
			//echo DATABASEPATH. $queryArray['DATABASE'];
			if ($handle) {
				while (false !== ($entry = readdir($handle))) {
				//echo "including";
					$filePath = DATABASEPATH. $queryArray['DATABASE']. '/'.$entry;
					//echo $filePath;
					if(is_dir($filePath)) {
						//echo $filePath."\r\n";
						//echo $entry."\r\n";
						if($entry != ".")$dataHolder->addFile($queryArray['DATABASE'],$entry,"globals",$entry);
						//include_once($filePath);
						//echo $filePath.'\r\n';
					}
				}
			}
			//var_dump($dataHolder);
			closedir($handle);
			unset($dataHolder->names['globals']);
			unset($dataHolder->names['master']);
			return $dataHolder;
		}
		if($queryArray['type'] == "write") {
			$handle = opendir(DATABASEPATH. $queryArray['DATABASE'] . "/" . $queryArray['USER'] );
			//echo DATABASEPATH. $queryArray['DATABASE'];
			$highest = 0;
			if ($handle) {
				while (false !== ($entry = readdir($handle))) {
				//echo "including";
					$filePath = DATABASEPATH. $queryArray['DATABASE']. '/'.$entry;
					//echo $filePath;
					if(!is_dir($filePath)) {
						//echo $filePath."\r\n";
						$kadh = split("\.",$entry,2);
						if(intval($kadh[0]) > $highest) $highest = $kadh[0];
						//print_r($kadh);
						//echo intval($kadh[0]). $kadh[0]."\r\n";
						//if($entry != ".")$dataHolder->addFile($queryArray['DATABASE'],$entry,"globals",$entry);
						//include_once($filePath);
						//echo $filePath.'\r\n';
					}
				}
			}
			$highest++;
			$dataOut = "<?xml version =\"1.0\"?>\r\n<DATA>\r\n";
			if(!isset($queryArray['DATA']['ID'])) {
				$dataOut .= "\t<id>". ($highest)."</id>\r\n";
			} else {
				$highest = $queryArray['DATA']['ID'];
			}
			foreach($queryArray['DATA'] as $i => $iData) {
				$dataOut .= "\t<".$i.">". $iData."</".$i.">\r\n";
			}
			$dataOut .= "</DATA>";
			//echo $dataOut;
			//echo $highest;
			//echo DATABASEPATH. $queryArray['DATABASE'] . "/" . $queryArray['USER'] . "/" . $highest . ".xml";
			$myFile = DATABASEPATH. $queryArray['DATABASE'] . "/" . $queryArray['USER'] . "/$highest.xml";
			//echo 
			$fh = fopen($myFile, 'w') or die("can't open file");
			fwrite($fh, $dataOut);
			fclose($fh);
		}
	}
}
?>