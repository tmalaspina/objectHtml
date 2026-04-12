<?php
require_once dirname(__FILE__)."/tags/tagTitle.php";
require_once dirname(__FILE__)."/tags/tagHtml.php";
require_once dirname(__FILE__)."/tags/tagMeta.php";

require_once "tags/tagHead.php";
require_once "tags/tagBody.php";
require_once "tags/tag.php";

require_once dirname(__FILE__)."/html.php";

/**
 * Rappresenta una pagina HTML completa.
 *
 * Estende {@see html} e gestisce l'intera struttura di una pagina web:
 * doctype, tag `<html>` con attributo lingua, `<head>` con charset e titolo,
 * e `<body>` con il contenuto principale. Supporta anche l'inserimento di
 * elementi a fine `<body>`, utile ad esempio per i tag `<script>`.
 *
 * @package objectHtml
 */
class htmlPage extends html {

	/**
	 * Il tag radice `<html>` della pagina.
	 *
	 * @var tagHtml
	 */
	protected $tagHtml;

	/**
	 * Il tag `<head>` della pagina.
	 *
	 * @var tagHead
	 */
	protected $tagHead;

	/**
	 * Il tag `<body>` della pagina.
	 *
	 * @var tagBody
	 */
	protected $tagBody;

	/**
	 * Elementi da accodare alla fine del `<body>`.
	 *
	 * Vengono inseriti nel body durante la {@see build()},
	 * dopo tutti gli altri elementi.
	 *
	 * @var array
	 */
	protected $bodyEnd = [];

	/**
	 * Inizializza la pagina HTML con lingua e charset.
	 *
	 * @param string $l Valore dell'attributo `lang` del tag `<html>` (es. `"it"`, `"en"`).
	 * @param string $c Charset della pagina (es. `"UTF-8"`).
	 */
	function __construct($l, $c) {
		$this->tagHtml = new tagHtml();
		$this->tagHead = new tagHead();
		$this->tagBody = new tagBody();

		$this->setLanguage($l);
		$this->setCharset($c);
	}

	/**
	 * Inserisce un elemento nel `<body>` della pagina.
	 *
	 * @param mixed $o L'oggetto HTML da inserire nel body.
	 * @return void
	 */
	function insert($o) {
		$this->tagBody->insert($o);
	}

	/**
	 * Accoda un elemento alla fine del `<body>`.
	 *
	 * Gli elementi aggiunti con questo metodo vengono inseriti nel body
	 * durante la {@see build()}, dopo tutti quelli aggiunti con {@see insert()}.
	 * Utile per i tag `<script>` da caricare a fondo pagina.
	 *
	 * @param mixed $o L'oggetto HTML da accodare a fine body.
	 * @return void
	 */
	function insertBodyEnd($o) {
		array_push($this->bodyEnd, $o);
	}

	/**
	 * Imposta il titolo della pagina nel `<head>`.
	 *
	 * @param string $t Il testo del titolo.
	 * @return void
	 */
	function setTitle($t) {
		$title = new tagTitle();
		$title->addInnerHtml($t);

		$this->tagHead->insert($title);
	}

	/**
	 * Aggiunge il meta tag charset nel `<head>`.
	 *
	 * @param string $c Il charset da impostare (es. `"UTF-8"`).
	 * @return void
	 */
	function setCharset($c) {
		$m = new tagMeta();
		$a = new tagAttribute("charset", $c, $m);

		$this->tagHead->insert($m);
	}

	/**
	 * Imposta l'attributo `lang` sul tag `<html>`.
	 *
	 * @param string $l Il codice lingua (es. `"it"`, `"en"`).
	 * @return void
	 */
	function setLanguage($l) {
		$a = new tagAttribute("lang", $l, $this->tagHtml);
	}

	/**
	 * Assembla l'intera pagina HTML.
	 *
	 * Inserisce gli elementi di {@see $bodyEnd} nel body, poi compone
	 * la stringa HTML completa a partire dal doctype, annidando
	 * `<head>` e `<body>` all'interno del tag `<html>`.
	 * Il risultato viene salvato in {@see $html}.
	 *
	 * @return void
	 */
	function build() {
		foreach ($this->bodyEnd as $i => $be) {
			$this->tagBody->insert($be);
		}

		$this->html = "<!DOCTYPE html>";

		$this->tagHtml->addInnerHtml($this->tagHead->get());
		$this->tagHtml->addInnerHtml($this->tagBody->get());
		$this->html .= $this->tagHtml->get();
	}
}
?>
