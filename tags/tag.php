<?php
require_once dirname(dirname(__FILE__))."/html.php";

class tag extends html {
	private $name,
		$hasClosingTag,
		$innerHtml,
		$attributes= array();

	function __construct($tagName, $hasClosingTag) {
		$this->name = $tagName;
		$this->hasClosingTag = $hasClosingTag;
		$this->innerHtml= "";
	}

	function get(): string {
		$this->build();
		return parent::get();
	}

	function insert($o) {
		$this->addInnerHtml($o->get());
	}

	function addAttribute($a) {
		array_push($this->attributes, $a);
	}

	function addInnerHtml(string $innerHtml) {
		$this->innerHtml .= $innerHtml;
	}

	function build() {
		if ($this->hasClosingTag) {
			$str_attributes="";
			foreach ($this->attributes as $a){
				$str_attributes.= $a->get(). " ";
			}

			$this->html= "<".$this->name ." ". $str_attributes.">".$this->innerHtml."</".$this->name.">";
		}
		else {
			$this->html= "<".$this->name.">";
		}
	}
}
?>
