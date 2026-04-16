<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagDiv.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagLabel.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagAttribute.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagInput.php";

require_once dirname(__FILE__)."/bootstrapLabeledInput.php";

class bootstrapLabeledInputEmail extends bootstrapLabeledInput {
	function __construct($id, $l_txt, $h_id, $h_txt) {
		parent::__construct($id, "email", $l_txt, $h_id, $h_txt);
	}
}

?>
