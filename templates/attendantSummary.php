<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
  if (
    date_create_from_format(
      "Y-m-d H:i:s",
      $rsvpEvent->event->start_datetime
    )->getTimestamp()
    <
    time()
  ) {
    continue;
  }
  $dom = new DOMDocument('1.0', 'utf-8');
  $eventAttendants = $dom->createElement("article");
  $eventAttendants->setAttribute("data-event-name", $rsvpEvent->event->handle);
  $title_label = $rsvpEvent->event->name;
  $title_label .= ": ".count($rsvpEvent->attendants)." attending";
  $title = $dom->createElement('h3');
  $title->setAttribute("class", "typ-categoryTitle");
  $title->appendChild($dom->createTextNode($title_label));
  $eventAttendants->appendChild($title);

  $attendantList = $dom->createElement("ul");
  $attendantList->setAttribute("class", "attendants");
  if (count($rsvpEvent->attendants) > 0) {
    foreach ($rsvpEvent->attendants as $attendant) {
      $attendantEl = $dom->createElement("li");
      $attendantEl->setAttribute("class", "typ-body");
      $attendantEl->appendChild($dom->createTextNode($attendant->name));
      $attendantList->appendChild($attendantEl);
    }
    $eventAttendants->appendChild($attendantList);
  }
  $dom->appendChild($eventAttendants);
  echo $dom->saveHTML();
}
?>