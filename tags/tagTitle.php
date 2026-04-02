<?php
require_once "tag.php";

class tagTitle extends tag {
	function __construct(){
		parent::__construct("title", true);
	}
}
