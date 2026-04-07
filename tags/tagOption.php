<?php
require_once "tag.php";

class tagOption extends tag {
	function __construct(){
		parent::__construct("option", true);
	}
}
