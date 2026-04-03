<?php
require_once dirname(dirname(__FILE__))."htmlComponent.php";

class bootstrapNavbarToggler extends htmlComponent {
function __construct($navId){
	$this->component= new tagButton();
	$this->component->addClass("navbar-toggler");
	$this->component->addType("button");
	$this->component->addAttributeNV("data-bs-toggle", "collapse");
	$this->component->addAttributeNV("data-bs-target", "#".$navId);
	$this->component->addAttributeNV("aria-controls", $navId);
	$this->component->addAttributeNV("aria-expanded", "false");
	$this->component->addAttributeNV("aria-label", "Toggle Navigation");

	$s= new tagSpan();
	$s->addClass("navbar-toggler-icon");

	$this->component->addInner($s);
}
}

?>
