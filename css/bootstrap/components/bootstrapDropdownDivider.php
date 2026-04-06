<?php
require_once dirname(dirname(__FILE__))."htmlComponent.php";
require_once dirname(dirname(dirname(__FILE__)))."/tags/tagLi.php";

class bootstrapNavbarDropdownDivider extends htmlComponent{
	protected $title;
	protected $href;

	function __construct(){
		$this->component= new tagLi();

		$a= new tagHr();
		$a->addClass("dropdown-divider");
		$this->component->addInner($a);
	}
}
?>
