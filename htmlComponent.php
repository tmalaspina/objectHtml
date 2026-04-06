<?php
require_once "tags/tag.php";

class htmlComponent extends tag {
	protected tag $component;

	function insert($o) {
		$o->build();
                $this->component->insert($o);
        }

	function build(){
		$this->component->build();
	}

        function get(): string{
                return $this->component->get();
        }

}
?>
