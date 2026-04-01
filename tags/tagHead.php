<?php
require_once "tag.php";

class tagHead extends tag {
	function __construct(){
		parent::__construct("head", true);
	}
}
