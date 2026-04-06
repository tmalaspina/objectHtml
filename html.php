<?php
 class html {
	protected $html;

	
	function get():string {
		$this->build();
		return is_null($this->html) ? "" : $this->html;
	}

	function show() {
//		$this->build();
//		var_dump($this->html);
		echo $this->get();
	}
}
?>
