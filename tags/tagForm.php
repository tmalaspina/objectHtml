<?php
require_once "tag.php";
require_once "tagAttribute.php";

class tagForm extends tag {
	function __construct($m=null, $act= null){
		parent::__construct("form", true);

		if (!is_null($m)) {
			$this->addMethod($m);
		}

		if (!is_null($act)) {
			$this->addAction($act);
		}
	}

	function addMethod($m) {
		$a= new tagAttribute("method", $m, $this);
	}

	function addAction($act){
		$a= new tagAttribute("action", $act, $this);
	}
}
