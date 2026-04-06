<?php
require_once dirname(dirname(__FILE__)). "/tags/tagForm.php";

class htmlForm extends htmlComponent {
	protected $form;

	function __construct($method= null, $action= null){
		$this->form= new tagForm();
		$a= new tagAttribute("method", $method, $this->form);
		$a1= new tagAttribute("action", $action, $this->form);

		$this->component= $this->form;
	}
}
?>
