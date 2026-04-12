<?php

/**
 * Classe base per la generazione di HTML.
 *
 * Definisce l'interfaccia comune a tutti gli elementi della libreria objectHtml.
 * Le classi figlie devono implementare il metodo {@see build()} per popolare
 * la proprietà {@see $html} con il markup generato.
 *
 * @package objectHtml
 */
class html {

	/**
	 * Stringa contenente l'HTML generato da {@see build()}.
	 *
	 * Viene popolata dalle classi figlie all'interno del metodo {@see build()}.
	 *
	 * @var string|null
	 */
	protected $html;

	/**
	 * Esegue la build e restituisce l'HTML generato come stringa.
	 *
	 * Invoca {@see build()} per assicurarsi che {@see $html} sia aggiornato,
	 * poi restituisce il risultato. Se {@see $html} è null, restituisce
	 * una stringa vuota.
	 *
	 * @return string L'HTML generato, oppure una stringa vuota.
	 */
	function get(): string {
		$this->build();
		return is_null($this->html) ? "" : $this->html;
	}

	/**
	 * Stampa in output l'HTML generato.
	 *
	 * Equivale a fare `echo $this->get()`.
	 *
	 * @return void
	 */
	function show() {
		echo $this->get();
	}
}
?>
