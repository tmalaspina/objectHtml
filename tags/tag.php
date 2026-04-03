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
		$done= false;

		foreach($this->attributes as $i=>$attribute) {
			if ($a->getName()==$attribute->getName()) {
				$attribute->addValue($a->getValues());
				$done= true;
				break;
			}
		}

		if (!$done) {
			array_push($this->attributes, $a);
		}
	}

	function addInnerHtml(string $innerHtml) {
		$this->innerHtml .= $innerHtml;
	}

	function build() {
		$str_attributes="";
		$n_attributes= count($this->attributes);

		foreach ($this->attributes as $i=>$a){
			if ($i==$n_attributes-1){
				$str_attributes.= $a->get();
			} else {
				$str_attributes.= $a->get(). " ";
			}
		}

		if (strlen($str_attributes)>0) {
			$str_attributes= " ".$str_attributes;
		}

		if ($this->hasClosingTag) {
			$this->html= "<".$this->name . $str_attributes.">".$this->innerHtml."</".$this->name.">";
		}
		else {
			$this->html= "<".$this->name . $str_attributes.">";
		}
	}
}
?>
