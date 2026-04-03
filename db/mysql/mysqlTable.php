<?php
require_once "mysql.php";

trait mysqlTable {
	private function buildMysqlTable($sql, $t) {
		$db= new mysql();
		$db->connect();
		$db->select($sql);
		$db->close();

		$result= $db->getResult();

		$row_num= 0;
		while ($row= $result->fetch_assoc()) {
			$col_num=0;
			foreach($row as $c=>$v) {
				if ($row_num==0) {
					$t->addHeaderCell($col_num, $c);
				}

				$t->addBodyCell($row_num, $col_num, $v);
				$col_num++;
			}
			$row_num++;
		}
	}
}
?>
