<?php
require_once "tags/tag.php";

/**
 * Classe base per i componenti HTML riutilizzabili.
 *
 * Estende {@see tag} e funge da contenitore per componenti compositi.
 * Delega la costruzione e il rendering a un tag interno {@see $component},
 * che le classi figlie devono inizializzare nel proprio costruttore.
 *
 * @package objectHtml
 */
class htmlComponent extends tag {

	/**
	 * Il tag HTML interno che rappresenta la struttura del componente.
	 *
	 * Deve essere inizializzato dalle classi figlie nel costruttore.
	 *
	 * @var tag
	 */
	protected tag $component;

	/**
	 * Inserisce un elemento all'interno del componente.
	 *
	 * Invoca {@see build()} sull'oggetto passato prima di inserirlo,
	 * in modo che il suo HTML sia già pronto.
	 *
	 * @param mixed $o L'oggetto HTML da inserire nel componente.
	 * @return void
	 */
	function insert($o) {
		$o->build();
		$this->component->insert($o);
	}

	/**
	 * Costruisce il componente delegando al tag interno.
	 *
	 * Invoca {@see build()} su {@see $component}.
	 *
	 * @return void
	 */
	function build() {
		$this->component->build();
	}

	/**
	 * Restituisce l'HTML generato dal componente interno.
	 *
	 * @return string L'HTML del componente.
	 */
	function get(): string {
		return $this->component->get();
	}
}
?>
