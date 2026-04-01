<?php
require_once dirname(__FILE__)."/tag.php";

class tagHtml extends tag {
	function __construct(){
		parent::__construct("html", true);
	}
}
