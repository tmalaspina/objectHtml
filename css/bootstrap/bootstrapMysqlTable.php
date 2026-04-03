<?php
require_once dirname(dirname(dirname(__FILE__))). "/db/mysql/mysqlTable.php";
require_once "bootstrapTable.php";

class bootstrapMysqlTable extends bootstrapTable {
        use mysqlTable;

        function createFromSql($sql) {
                $this->buildMySqlTable($sql, $this);
        }
}
?>
