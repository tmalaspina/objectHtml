<?php
class tagAttribute {
	protected $name, $values= array();

	function __construct($n, $v, $t) {
		$this->setName($n);
		$this->addValue($v);
		$t-> addAttribute($this);
	}

	function setName($n){
		$this->name= $n;
	}

	function addValue($v) {
		array_push($this->values, $v);
	}

	function getName() {
		return $this->name;
	}

	function getValues() {
		return implode(' ', $this->values);
	}

	function get() {
		return $this->name . '="' . $this->getValues() . '"';
	}
}
?>
