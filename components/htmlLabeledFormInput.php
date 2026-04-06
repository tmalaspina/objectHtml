<?php
require_once dirname(__FILE__)."/htmlInlineComponent.php";
require_once dirname(dirname(__FILE__))."/tags/tagLabel.php";
require_once dirname(dirname(__FILE__))."/tags/tagInput.php";

class htmlLabeledFormInput extends htmlInlineComponent {
	protected $label, $input;

	function __construct($t, $id, $n, $labelText) {
		$this->label= new tagLabel($n);
		$this->input= new tagInput($t, $id, $n);

		$this->label->addInnerHTml($labelText);

		$this->insert($this->label);
		$this->insert($this->input);
	}
}
?>
