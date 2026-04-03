<?php
require_once dirname(dirname(__FILE__))."/tags/tagTable.php";
require_once dirname(dirname(__FILE__))."/tags/tagTHead.php";
require_once dirname(dirname(__FILE__))."/tags/tagTBody.php";
require_once dirname(dirname(__FILE__))."/tags/tagTFoot.php";
require_once dirname(dirname(__FILE__))."/tags/tagTd.php";
require_once dirname(dirname(__FILE__))."/tags/tagTr.php";
require_once dirname(dirname(__FILE__))."/tags/tagTh.php";
require_once dirname(dirname(__FILE__))."/tags/tagAttribute.php";
require_once dirname(dirname(__FILE__))."/htmlComponent.php";


class htmlTable extends htmlComponent {
	protected $table, $head, $body, $foot, $ths=[], $tds=[], $tfs=[], $bodyRows=[];

	function __construct() {
		$this->table= new tagTable();
		$this->head= new tagTHead();
		$this->body= new tagTBody();
		$this->foot= new tagTFoot();

		$this->component= $this->table;
	}

	function addHeaderCell($c, $t) {
		$col= new tagTh();
		$col->addInnerHtml($t);

		$this->ths[$c]= $col;
	}

	function addHeaderRow($r) {
		$this->head->insert($r);
	}

	function addBodyRow($r) {
		$this->body->insert($r);
	}

	function addFooterRow($r) {
		$this->foot->insert($r);
	}

	function addBodyCell($r, $c, $t) {
		$td= new tagTd();
		$td->addInnerHtml($t);

		$this->addBodyTd($r, $c, $td);
	}

	function addTableAttribute($n, $v) {
		$a= new tagAttribute($n, $v, $this->table);
	}

	function addBodyRowAttribute($r, $n, $v) {
		if (is_null($this->bodyRows[$r])) {
			$this->bodyRows[$r]= new tagTr();
		}

		$a= new tagAttribute($n, $v, $this->bodyRows[$r]);
	}

	function addHeaderCellAttribute($c, $n, $v) {
		if (is_null($this->ths[$c])) {
                        $this->ths[$c]= new tagTh();
                }

                $a= new tagAttribute($n, $v, $this->ths[$c]);
	}

	function addBodyCellAttribute($r, $c, $n, $v) {
		if (is_null($this->tds[$r][$c])) {
			$this->tds[$r][$c]= new tagTd();
		}

		$a= new tagAttribute($n, $v, $this->tds[$r][$c]);
	}

       function addFooterCellAttribute($c, $n, $v) {
                if (is_null($this->tfs[$c])) {
                        $this->tfs[$c]= new tagTd();
                }

                $a= new tagAttribute($n, $v, $this->tfs[$c]);
        }


	function addFooterCell($c, $t) {
		$tfd= new tagTd();
		$tfd->addInnerHtml($t);

		$this->addFooterTd($c, $tfd);
	}

	function addTh($c, $th) {
		$this->ths[$c]= $th;
	}

	function addBodyTd($r, $c, $td) {
		$this->tds[$r][$c]= $td;
	}

	function addFooterTd($c, $td) {
		$this->tfs[$c]= $td;
	}

	/*function get(): string{
		return $this->table->get();
	}*/

	function build() {
		$tagTrh=new tagTr();

		foreach($this->ths as $i=>$c) {
			if (!array_key_exists($i, $this->ths)) {
				$this->ths[$i]= new tagTh();
			}
			$tagTrh->insert($this->ths[$i]);
		}
		$this->addHeaderRow($tagTrh);

		$tagTr=[];
		foreach ($this->tds as $i=>$r) {
			if (array_key_exists($i, $this->bodyRows)) {
				$tagTr[$i]= $this->bodyRows[$i];
			} else {
				$tagTr[$i]= new tagTr();
			}

			foreach($r as $j=>$v) {
				$tagTr[$i]->insert($this->tds[$i][$j]);
			}
			$this->addBodyRow($tagTr[$i]);
		}

		$tagTrf= new tagTr();

		foreach($this->tfs as $i=>$c) {
			if (!array_key_exists($i, $this->tfs)) {
				$this->tfs[$i]= new tagTd();
			}
			$tagTrf->insert($this->tfs[$i]);
		}
		$this->addFooterRow($tagTrf);

		$this->table->insert($this->head);
                $this->table->insert($this->body);
                $this->table->insert($this->foot);

		//$this->component->build();
		//$this->component= $this->table;
	}
}
?>
