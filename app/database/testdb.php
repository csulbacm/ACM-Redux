<?php
echo "hi";
include('./V1/phpdbd.v1.fm.php');
echo "hi";
$thhh = new PHPDBDFileManager();
echo "hi";
$thhh->parseFile("./data/Project/master.xml");
echo "hi";
include('./phpdbd.php');
echo "HI";
$tester = new PHPDBD();
echo "HI";
$theData = $tester->query(Array("type" => "direct", "path" => "/TestDB/Nai/master"));
echo "hi";
echo "<b>" . $theData['TITLE'] . "</b><br>";
echo "Posted on: " . $theData['TIME'] . " " . $theData['DATE'] . ", by: " . $theData['POSTER'] . "<br>";
echo nl2br($theData['TEXT']) . "<br>";



$theData = $tester->query(Array("type" => "new", "path" => "/TestDB/Nai", "args" => Array("TITLE" => "Hello")));
//echo "<br>" . $tester->infoHTML();
?>