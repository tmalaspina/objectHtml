<?php
require_once "tag.php";

class tagColgroup extends tag {
	function __construct(){
		parent::__construct("colgroup", true);
	}
}
