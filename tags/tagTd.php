<?php
require_once "tag.php";

class tagTd extends tag {
	function __construct(){
		parent::__construct("td", true);
	}
}
