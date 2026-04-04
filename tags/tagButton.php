<?php
require_once "tag.php";

class tagButton extends tag {
	function __construct(){
		parent::__construct("button", true);
	}
}
