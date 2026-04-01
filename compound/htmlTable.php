<?php
require_once dirname(dirname(__FILE__))."/tags/tagTable.php";
require_once dirname(dirname(__FILE__))."/tags/tagTHead.php";
require_once dirname(dirname(__FILE__))."/tags/tagTBody.php";
require_once dirname(dirname(__FILE__))."/tags/tagTFoot.php";
require_once dirname(dirname(__FILE__))."/tags/tagTd.php";
require_once dirname(dirname(__FILE__))."/tags/tagTr.php";



class htmlTable {
	protected $table, $head, $body, $foot, $tds=[];

	function __construct() {
		$this->table= new tagTable();
		$this->head= new tagTHead();
		$this->body= new tagTBody();
		$this->foot= new tagTFoot();
	}

	function addColName($n) {
		$col= new tagTh();
		$col->addInnerHtml($n);

		$this->head->insert($col);
	}

	function addRow($r) {
		$this->body->insert($r);
	}

	function addCell($r, $c, $t) {
		$td= new tagTd();
		$td->addInnerHtml($t);

		$this->addTd($r, $c, $td);
	}

	function addTd($r, $c, $td) {
		$this->tds[$r][$c]= $td;
	}

	function build() {
		$tagTr=[];
		foreach ($this->tds as $i=>$r) {
			$tagTr[$i]= new tagTr();
			foreach($r as $j=>$v) {
				$tagTr[$i]->insert($this->tds[$i][$j]);
			}
			$this->addRow($tagTr[$i]);
		}

		$this->table->insert($this->head);
                $this->table->insert($this->body);
                $this->table->insert($this->foot);
	}

	function get() {
		$this->build();
		return $this->table->get();
	}
}
?>
