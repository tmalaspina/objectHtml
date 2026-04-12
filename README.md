# objectHtml

objectHtml è una piccola libreria PHP che permette di costruire pagine web in modo programmatico, trattando ogni elemento HTML come un oggetto. L'idea di fondo è semplice: invece di scrivere HTML a mano o mischiarlo con il codice PHP, si compone la pagina assemblando oggetti, ognuno dei quali sa come renderizzare se stesso.

## Come funziona

Al centro della libreria c'è una gerarchia di classi che rispecchia la struttura di una pagina HTML. Esiste una classe base (`html`) che definisce il comportamento comune — come ottenere o stampare il markup generato — e due classi principali che la estendono.

La prima è `htmlPage`, che rappresenta una pagina completa. Si occupa di tutto ciò che normalmente sta intorno al contenuto: il doctype, il tag `<html>` con la lingua, il `<head>` con charset e titolo, e il `<body>`. Per costruire una pagina basta istanziarla, configurarla con pochi metodi e inserire i componenti che si vogliono mostrare.

La seconda è `htmlComponent`, che serve a creare componenti riutilizzabili. Ogni componente incapsula una porzione di interfaccia e può essere inserito in una pagina (o in un altro componente) senza che il codice chiamante debba sapere come è fatto internamente.

## Perché usarla

Il vantaggio principale è la separazione tra logica e presentazione: ogni parte dell'interfaccia vive in una classe dedicata, è testabile in isolamento ed è facile da riutilizzare. Aggiungere un componente alla pagina è una questione di una riga, e l'ordine di inserimento (compreso quello degli script a fine pagina, gestito separatamente) è esplicito e controllato.

## Un esempio rapido

```php
$page = new htmlPage("it", "UTF-8");
$page->setTitle("Benvenuto");
$page->insert($header);
$page->insert($mainContent);
$page->insertBodyEnd($analytics);
$page->show();
```

In poche righe si ottiene una pagina HTML valida, con tutti i pezzi al posto giusto.
