<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagButton.php";


class bootstrapSubmitButton extends htmlComponent {
	function __construct($txt, $itsClass) {
		$btn= new tagButton();

		$btn->addType("button");
		$btn->addClass("btn ".$itsClass);
		$btn->addInnerHtml($txt);

		$this->component= $btn;
	}
}

?>
