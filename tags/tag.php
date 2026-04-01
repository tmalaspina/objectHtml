<?php
require_once dirname(dirname(__FILE__))."/html.php";

class tag extends html {
	private $name,
		$hasClosingTag,
		$innerHtml;

	function __construct($tagName, $hasClosingTag) {
		$this->name = $tagName;
		$this->hasClosingTag = $hasClosingTag;
		$this->innerHtml= "";
	}

	function get(): string {
		$this->build();
		return parent::get();
	}

	function insert(tag $o) {
		$this->setInnerHtml($o->get());
	}

	function setInnerHtml(string $innerHtml) {
		$this->innerHtml .= $innerHtml;
	}

	function build() {
		if ($this->hasClosingTag) {
			$this->html= "<".$this->name.">".$this->innerHtml."</".$this->name.">";
		}
		else {
			$this->html= "<".$this->name.">";
		}
	}
}
?>
