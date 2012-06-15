<?php
class PHPDBDItem {
	public $names;
	public $elements = -1;
	private $tag;
	private $fileOpen;
	function __construct($db,$user,$filename = "master") {
		$tag = 0;
		$this->fileOpen = "master";
		$this->addFile($db);
		$this->addFile($db,$user,"globals");
		$this->addFile($db,$user,$filename);
	}
	
	function addFile($db,$user = NULL,$filename = "master",$name = NULL) {
		$tag = 0;
		//echo "hi";
		$this->fileOpen = $name;
		if($name == NULL) $this->fileOpen = $filename;
		$data = implode("", file(DATABASEPATH."$db/$user/$filename.xml"));
		//echo "database/data/$db/$user/$filename.xml";
		
		$parser = xml_parser_create();

        //This is the RIGHT WAY to set everything inside the object.
        xml_set_object ( $parser, $this );
        xml_set_element_handler ( $parser, 'tagStart', 'tagEnd' );
        xml_set_character_data_handler ( $parser, 'tagContent' ); 	
		//$this->ltholder = &$this->tester[];
        xml_parse ( $parser, $data );
		//print_r($this->names);
	}
	
	function getAllDataFromID($id) {
		return $this->names[$id];
	}
	
	function getGlobals() {
		return $this->names["globals"];
	}
	
	function getMaster($id) {
		return $this->names[$id];
	}
	
	function tagStart ( $parser, $tagName, $attributes = NULL )
    {

        $this->elements++;
        $this->tag = $tagName;
		$this->names[$this->fileOpen][$tagName] = "";
		
		//$this->tholder = &$this->ltholder[$tagName];
		//$this->tholder = &$this->ltholder[$tagName];
		//$this->ltholder = $this->tholder;
		//echo $attributes;
		//$this->{$this->names[$this->elements]}[] = $tagName;
		//echo $tagName;
    }

    function tagEnd ( $parser, $tagName )
    {

        $this->tag = NULL;
    }

    function tagContent ( $parser, $content )
    {

        //This WILL NOT work as you intended. $this->tag will do strange, mysterious things, but it won't be the tag name like you expected.
	//	echo ( " {$this->names[$this->fileOpen][$this->tag]} : $content" );
		//var_dump($this->names[$this->fileOpen][$this->tag]);
		//$this->tholder .= $content;
		//if($content != "\n" && $content != "\n\t" && $content != "\r\v") $this->{$this->names[$this->fileOpen][$this->tag]}[] = $content;
		if($content != "\n" && $content != "\n\t" && $content != "\r\v") $this->names[$this->fileOpen][$this->tag] .= $content;

    }

}
?>