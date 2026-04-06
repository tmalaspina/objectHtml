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
		is_null($v) ? $this->values[0]= NULL : array_push($this->values, $v);
	}

	function getName() {
		return $this->name;
	}

	function getValues() {
		return is_null($this->values[0]) ? NULL : implode(' ', $this->values);
	}

	function get() {
		$v= $this->getValues();

		return is_null($v) ? $this->name : $this->name . '="' . $v . '"';
	}
}
?>
