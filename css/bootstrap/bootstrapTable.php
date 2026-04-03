<?php
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagAttribute.php";
	require_once dirname(dirname(dirname(__FILE__)))."/compound/htmlTable.php";

	class bootstrapTable extends htmlTable {
		function __construct() {
			parent::__construct();

			$this->addTableAttribute("class", "table");
		}

		function striped(){
			$this->addTableAttribute("class", "table-striped");
		}

                function stripedColumns(){
                        $this->addTableAttribute("class", "table-striped-columns");
                }

		function dark() {
			$this->addTableAttribute("class", "table-dark");
		}

		function hoverable() {
			$this->addTableAttribute("class", "table-hover");
		}

		function bordered(){
			$this->addTableAttribute("class", "table-bordered");
		}

		function borderless(){
			$this->addTableAttribute("class", "table-borderless");
		}

		function small() {
			$this->addTableAttribute("class", "table-sm");
		}
	}
?>
