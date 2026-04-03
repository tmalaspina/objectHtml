<?php
require_once "tags/tag.php";

class htmlComponent extends tag {
	protected tag $component;

	function insert($o) {
		$o->build();
                $this->component->insert($o);
        }

        function get(): string{
                return $this->component->get();
        }

}
?>
