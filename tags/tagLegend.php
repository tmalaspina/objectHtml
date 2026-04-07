<?php
require_once "tag.php";

class tagLegend extends tag {
	function __construct(){
		parent::__construct("legend", true);
	}
}
