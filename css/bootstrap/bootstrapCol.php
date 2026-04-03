<?php
class bootstrapCol extends htmlComponent {
	protected tag $div;

	function __construct(){
		$this->div= new tagDiv();
		$this->div->addClass("col");

		$this->component= $this->div;
	}
}
?>
