<?php
require_once "tag.php";

class tagA extends tag {
	function __construct(){
		parent::__construct("a", true);
	}
}
