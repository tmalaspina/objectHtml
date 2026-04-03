<?php
require_once dirname(dirname(__FILE__)). "/db/mysql/mysqlTable.php";
require_once "htmlTable.php";

class htmlMysqlTable extends htmlTable {
	use mysqlTable;

	function createFromSql($sql) {
		$this->buildMySqlTable($sql, $this);
	}
}
?>
