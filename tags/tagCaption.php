<?php
require_once "tag.php";

class tagCaption extends tag {
	function __construct(){
		parent::__construct("caption", true);
	}
}
