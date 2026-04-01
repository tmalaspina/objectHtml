<?php
require_once "tag.php";

class tagH1 extends tag {
	function __construct(){
		parent::__construct("h1", true);
	}
}
