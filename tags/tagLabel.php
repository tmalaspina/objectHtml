<?php
require_once "tag.php";
require_once "tagAttribute.php";

class tagLabel extends tag {
	function __construct($fo){
		parent::__construct("label", true);

		$a= new tagAttribute("for", $fo, $this);
	}
}
