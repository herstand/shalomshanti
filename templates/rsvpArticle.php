<?php
  function createRSVPArticle($event_name) {
    $dom = new DOMDocument('1.0', 'utf-8');
    $title = $dom->createElement('h2');
    $title->setAttribute('class', 'typ-title');
    $title->appendChild($dom->createTextNode($event_name));
    $dom->appendChild($title);

    return $dom->saveHTML();
  }
?>