<?php
require_once "tags/tag.php";

class htmlComponent extends tag {
	protected tag $component;
/*
	function build(){
		parent::build();
	}
*/
	function get(): string {
		$this->build();
		return $this->component->get();
	}
}
?>
