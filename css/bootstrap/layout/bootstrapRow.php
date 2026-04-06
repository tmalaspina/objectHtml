<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagDiv.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tag.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/htmlComponent.php";


class bootstrapRow extends htmlComponent {
	protected tag $div;

	function __construct(){
		$this->div= new tagDiv();
		$this->div->addClass("row");

		$this->component= $this->div;
	}
}
?>
