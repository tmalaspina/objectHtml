<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/htmlComponent.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagLi.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagUl.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagA.php";



class bootstrapNavbarDropdownMenu extends htmlComponent{
	protected $title, $active, $menuItems;

	function __construct(){
		$this->active= true;
		$this->menuItems= array();
		$this->component= new tagLi();
	}

    	function setTitle($t){
        	$this->title= $t;
    	}

	function addMenuItem($mi){
		array_push($this->menuItems, $mi);
	}

	function addDropDownItem($isDivider, $href="#", $title=""){
        	if ($isDivider){
            		$d= new bsNavbarDropdownDivider();
            		$d->build();
            		$this->addMenuItem($d);
        	} else {
            		$mi= new bsNavbarDropdownItem();
            		$mi->setHref($href);
            		$mi->setTitle($title);
            		$mi->build();

           		$this->addMenuItem($mi);
        	}
    	}

	function build(){
		foreach($this->menuItems as $i=>$m) {
			$m->build();
		}

		$this->component->addClass("nav-item dropdown");

		$a= new tagA();
		if ($this->active) {
			$a->addClass("nav-link dropdown-toggle active");
		} else {
			$a->addClass("nav-link dropdown-toggle");
		}
		$a->addHref("#");
		$a->addAttributeNV("role", "button");
		$a->addAttributeNV("data-bs-toggle", "dropdown");
		$a->addAttributeNV("aria-expanded", "false");
		$a->addInnerHtml($this->title);

		$ul= new tagUl();
		$ul->addClass("dropdown-menu");

		$this->component->addInner($a);
		foreach($this->menuItems as $i) {
			$ul->addInner($i);
		}
		$this->component->addInner($ul);

		parent::build();
	}
}
?>
