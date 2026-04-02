<?php
	require_once dirname(dirname(dirname(__FILE__)))."/htmlPage.php";
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagMeta.php";
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagAttribute.php";
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagScript.php";
	require_once dirname(dirname(dirname(__FILE__)))."/tags/tagLink.php";


	class bootstrapPage extends htmlPage {
		function __construct($l, $c) {
			parent::__construct($l, $c);

			$m= new tagMeta();
			$a= new tagAttribute("name", "viewport", $m);
			$a1= new tagAttribute("content", "width=device-width, initial-scale=1", $m);

			$link= new tagLink();
			$link_a= new tagAttribute("href", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css", $link);

			$script= new tagScript();
			$script_a= new tagAttribute("src", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js", $script);

			$this->tagHead->insert($m);
			$this->tagHead->insert($link);
			$this->insertBodyEnd($script);
		}
	}
?>
