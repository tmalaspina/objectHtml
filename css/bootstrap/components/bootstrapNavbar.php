<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagNav.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagA.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagUl.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagButton.php";
require_once "bootstrapNavbarToggler.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/htmlComponent.php";


class bootstrapNavbar extends htmlComponent {
    protected $navId;
    protected $navbarName;
    protected $nav;

    protected $image;
    protected $toggler;
    protected $navbarItems;
    protected $searchBox=array();

function __construct($navId= "navBar", $hasToggler= true) {
	$this->image= null;
	$this->navId= $navId;

	$this->nav=new tagNav();
	$this->nav->addClass("navbar navbar-expand-lg bg-body-tertiary");

	$this->navbarName= new tagA();
	$this->navbarName->addClass("navbar-brand");

	if ($hasToggler){
		$this->toggler= new bootstrapNavbarToggler($navId);
	} else {
		$this->toggler= null;
	}
	$this->navbarItems= array();

	$this->component= $this->nav;
}

function addMenu($i){
	array_push($this->navbarItems, $i);
}
    
    function addSearchBox($f){
	if (is_array($f)){
		foreach($f as $a) {
			array_push($this->searchBox, $a);
		}
	} else {
        	array_push($this->searchBox, $f);
	}
    }
    

function setName($n, $p= "/"){
	$this->navbarName->addInnerHtml($n);
    $this->navbarName->addAttributeNV("href", $p);
}

function setNameHref($h="#"){
	$this->navbarName->addHref($h);
}

function build($c="", $style="", $cUl="me-auto", $styleUl=""){
	foreach ($this->navbarItems as $i=>$ni) {
		$ni->build();
	}

	$div= new tagDiv();
        $div->addClass("container-fluid");

	$divMenus= new tagDiv();
	$divMenus->addClass("collapse  navbar-collapse");
	$divMenus->addClass($c);
    	if (strcmp($style, "")){
        	$divMenus->addAttributeNV("style", $style);
    	}

	$divMenus->addId($this->navId);

	$divMenusUl= new tagUl();
	$divMenusUl->addClass("navbar-nav");

	if (strcmp($cUl,"")){
                $divMenusUl->addClass($cUl);
        }


	if (strcmp($styleUl,"")){
		$divMenusUl->addStyle($styleUl);
	}
	foreach ($this->navbarItems as $ni){
		$divMenusUl->addInner($ni);
	}

	if(!is_null($this->image)){
		$this->navbarName->addInner($img);
	}

	$div->addInner($this->navbarName);

	if (!is_null($this->toggler)){
		$div->addInner($this->toggler);
	}

	$divMenus->addInner($divMenusUl);
	foreach($this->searchBox as $sb){
    		$divMenus->addInner($sb);
	}
	$divMenus->build();
	$div->addInner($divMenus);
    	$this->nav->addInner($div);

	parent::build();
}

function setImage($src, $alt){
	$this->image= new tagImg();
        $this->image->addSrc($src);
        $this->image->addAlt($alt);
        $this->image->addClass("d-inline-block align-text-top");
}


}
?>
