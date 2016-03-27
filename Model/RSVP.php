<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Model/RSVPEvent.php";

class RSVP {
  public $rsvpEvents;

  public function __construct($rsvpEvents) {
    $this->rsvpEvents = $rsvpEvents;
  }

  public function updateAttendant($event, $id, $name) {
    $this->rsvpEvents[$event]->attendants[$id] = $name;
  }

  public function addAttendant($name) {
    $this->rsvpEvents[$event]->attendants[0][] = $name;
  }

}

?>
