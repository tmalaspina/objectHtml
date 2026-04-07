<?php
require_once "tag.php";

class tagSelect extends tag {
	function __construct(){
		parent::__construct("select", true);
	}
}
