<?php
require_once "tag.php";

class tagTHead extends tag {
	function __construct(){
		parent::__construct("thead", true);
	}
}
