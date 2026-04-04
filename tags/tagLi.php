<?php
require_once "tag.php";

class tagLi extends tag {
	function __construct(){
		parent::__construct("li", true);
	}
}
