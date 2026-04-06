<?php
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tagButton.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/tags/tag.php";
require_once dirname(dirname(dirname(dirname(__FILE__))))."/htmlComponent.php";


class bootstrapButton extends htmlComponent {
	protected tag $btn;

	function __construct($t, $type="button"){
		$this->btn= new tagButton();
		$this->btn->addType($type);
		$this->btn->addClass("btn");
		$this->btn->addInnerHtml($t);
		$this->component= $this->btn;
	}

	function primary() {
		$this->btn->addClass("btn-primary");
	}

	function secondary() {
                $this->btn->addClass("btn-secondary");
        }

	function success() {
                $this->btn->addClass("btn-success");
        }

	function danger() {
                $this->btn->addClass("btn-danger");
        }

	function warning() {
                $this->btn->addClass("btn-warning");
        }

	function info() {
                $this->btn->addClass("btn-info");
        }

	function light() {
                $this->btn->addClass("btn-light");
        }

	function dark() {
                $this->btn->addClass("btn-dark");
        }

	function link() {
                $this->btn->addClass("btn-link");
        }


	function outlinerimary() {
                $this->btn->addClass("btn-outline-primary");
        }

        function outlineSecondary() {
                $this->btn->addClass("btn-outline-secondary");
        }

        function outlineSuccess() {
                $this->btn->addClass("btn-outline-success");
        }

        function outlineDanger() {
                $this->btn->addClass("btn-outline-danger");
        }

        function outlineWarning() {
                $this->btn->addClass("btn-outline-warning");
        }

        function outlineInfo() {
                $this->btn->addClass("btn-outline-info");
        }

        function outlineLight() {
                $this->btn->addClass("btn-outline-light");
        }

        function outlineDark() {
                $this->btn->addClass("btn-outline-dark");
        }

        function oulineLink() {
                $this->btn->addClass("btn-outline-link");
        }

}
?>
