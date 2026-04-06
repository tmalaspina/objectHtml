<?php
require_once "tag.php";
require_once "tagAttribute.php";

class tagInput extends tag {
	function __construct($type, $id, $name){
		parent::__construct("input", false);

		$a= new tagAttribute("type", $type, $this);
		$b= new tagAttribute("id", $id, $this);
		$c= new tagAttribute("name", $name, $this);
	}
}
