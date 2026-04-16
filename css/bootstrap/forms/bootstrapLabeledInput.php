<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagDiv.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagLabel.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagAttribute.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagInput.php";


class bootstrapLabeledInput extends htmlComponent {
	function __construct($id, $type,  $l_txt, $h_id= null, $h_txt= null) {
		$c= new tagDiv();
		$c->addClass("mb-3");

		$label= new tagLabel($id);
		$label->addClass("form-label");
		$label->addInnerHtml($l_txt);

		$input= new tagInput($type, $id, $id);
		$input->addClass("form-control");

		if (!is_null($h_id)) {
			$helper= new tagDiv();
			$helper->addId($h_id);
			$helper->addClass("form-text");
			$helper->addInnerHtml($h_txt);
		}

		$c->insert($label);
		$c->insert($input);

		if(!is_null($h_id)) {
			$c->insert($helper);
		}

		$this->component= $c;
	}
}

?>
