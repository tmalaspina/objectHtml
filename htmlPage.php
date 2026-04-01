<?php

require_once dirname(__FILE__)."/tags/tagHtml.php";
require_once "tags/tagHead.php";
require_once "tags/body.php";
require_once "tags/tag.php";

require_once dirname(__FILE__)."/html.php";

class htmlPage extends html {
	private $tagHtml,
		$tagHead,
		$tagBody;

	function __construct() {
		$this->tagHtml= new tagHtml();
		$this->tagHead= new tagHead();
		$this->tagBody= new tagBody();
	}

	function insert($o) {
		$this->tagBody->insert($o);
	}

	function build() {
		$this->html= "<!DOCTYPE html>";
//var_dump($this->tagHead->get());
		$this->tagHtml->addInnerHtml($this->tagHead->get());
		$this->tagHtml->addInnerHtml($this->tagBody->get());
		$this->html.= $this->tagHtml->get();
	}
}

?>
