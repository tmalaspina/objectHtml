<?php
require_once "tag.php";

class tagLink extends tag {
	function __construct(){
		parent::__construct("link", false);
	}
}
