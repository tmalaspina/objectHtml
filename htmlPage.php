<?php
require_once dirname(__FILE__)."/tags/tagTitle.php";
require_once dirname(__FILE__)."/tags/tagHtml.php";
require_once dirname(__FILE__)."/tags/tagMeta.php";

require_once "tags/tagHead.php";
require_once "tags/tagBody.php";
require_once "tags/tag.php";

require_once dirname(__FILE__)."/html.php";

class htmlPage extends html {
	protected $tagHtml,
		$tagHead,
		$tagBody,

		$bodyEnd=[];

	function __construct($l, $c) {
		$this->tagHtml= new tagHtml();
		$this->tagHead= new tagHead();
		$this->tagBody= new tagBody();

		$this->setLanguage($l);
		$this->setCharset($c);
	}

	function insert($o) {
		$this->tagBody->insert($o);
	}

	function insertBodyEnd($o) {
		array_push($this->bodyEnd, $o);
	}

	function setTitle($t) {
		$title= new tagTitle();
		$title->addInnerHtml($t);

		$this->tagHead->insert($title);
	}

	function setCharset($c) {
		$m= new tagMeta();
		$a= new tagAttribute("charset", $c, $m);

		$this->tagHead->insert($m);
	}

	function setLanguage($l) {
		$a= new tagAttribute("lang", $l, $this->tagHtml);
	}

	function build() {
		foreach($this->bodyEnd as $i=>$be) {
			$this->tagBody->insert($be);
		}

		$this->html= "<!DOCTYPE html>";

		$this->tagHtml->addInnerHtml($this->tagHead->get());
		$this->tagHtml->addInnerHtml($this->tagBody->get());
		$this->html.= $this->tagHtml->get();
	}
}

?>
