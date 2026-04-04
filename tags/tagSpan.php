<?php
require_once "tag.php";

class tagSpan extends tag {
	function __construct(){
		parent::__construct("span", true);
	}
}
