<?php
require_once "tag.php";

class tagForm extends tag {
	function __construct(){
		parent::__construct("form", true);
	}
}
