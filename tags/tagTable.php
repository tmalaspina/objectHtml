<?php
require_once "tag.php";

class tagTable extends tag {
	function __construct(){
		parent::__construct("table", true);
	}
}
