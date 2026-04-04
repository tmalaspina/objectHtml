<?php
require_once dirname(dirname(dirname(__FILE__)))."/htmlComponent.php";
require_once dirname(dirname(dirname(__FILE__)))."/tags/tagLi.php";

class bootstrapNavbarDropdownMenuItem extends htmlComponent{
	protected $title;
	protected $href;

	function setHref($h){
        	$this->href= $h;
    	}

    	function setTitle($t){
	        $this->title= $t;
    	}

	function __construct(){
		$this->component= new tagLi();
	}

	function build() {
		$a= new tagA();
		$a->addClass("dropdown-item");
		$a->addHref($this->href);
		$a->addInnerHtml($this->title);
		$this->component->addInner($a);

		parent::build();
	}
}
?>
