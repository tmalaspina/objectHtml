<?php
class bootstrapRow extends htmlComponent {
	protected tag $div;

	function __construct(){
		$this->div= new tagDiv();
		$this->div->addClass("row");

		$this->component= $this->div;
	}
}
?>
