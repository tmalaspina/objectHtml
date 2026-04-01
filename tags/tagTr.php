<?php
require_once "tag.php";

class tagTr extends tag {
	function __construct(){
		parent::__construct("tr", true);
	}
}
