<?php
require_once dirname(dirname(__FILE__))."/tags/tag.php";

class htmlInlineComponent extends html {
	protected  $components= array();

	function insert($o) {
                array_push($this->components, $o);
        }


	function build() {
	}

        function get(): string{
		$this->html= "";
                foreach($this->components as $c) {
			$this->html.= $c->get();
		}

		return $this->html;
        }

}
?>
