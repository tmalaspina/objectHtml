<?php
require_once "tag.php";

class tagMeta extends tag {
	function __construct(){
		parent::__construct("meta", false);
	}
}
