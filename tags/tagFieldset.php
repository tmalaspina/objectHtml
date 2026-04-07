<?php
require_once "tag.php";

class tagFieldset extends tag {
	function __construct(){
		parent::__construct("fieldset", true);
	}
}
