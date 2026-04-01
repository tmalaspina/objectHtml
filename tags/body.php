<?php
require_once "tag.php";

class tagBody extends tag {
	function __construct(){
		parent::__construct("body", true);
	}
}
