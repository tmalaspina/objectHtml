<?php
require_once "tag.php";

class tagOptgroup extends tag {
	function __construct(){
		parent::__construct("optgroup", true);
	}
}
