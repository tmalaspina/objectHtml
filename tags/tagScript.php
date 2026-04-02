<?php
require_once "tag.php";

class tagScript extends tag {
	function __construct(){
		parent::__construct("script", true);
	}
}
