<?php
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagAttribute.php";
	require_once dirname(dirname(dirname(__FILE__)))."/compound/htmlTable.php";

	class bootstrapTable extends htmlTable {
		function __construct() {
			parent::__construct();

			$this->addTableAttribute("class", "table");
		}
	}
?>
