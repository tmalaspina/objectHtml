<?php
require_once "tag.php";

class tagOl extends tag {
	function __construct(){
		parent::__construct("ol", true);
	}
}
