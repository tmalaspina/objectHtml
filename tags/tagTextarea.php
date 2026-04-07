<?php
require_once "tag.php";

class tagTextarea extends tag {
	function __construct(){
		parent::__construct("textarea", true);
	}
}
