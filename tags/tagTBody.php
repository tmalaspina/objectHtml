<?php
require_once "tag.php";

class tagTBody extends tag {
	function __construct(){
		parent::__construct("tbody", true);
	}
}
