<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Model/GuestService.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Model/RSVP.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Model/Events.php";

class User {
  public $id,
    $household_name,
    $rsvp,
    $events;

  public function __construct($household_name, $rsvp, $events) {
    $this->household_name = $household_name;
    $this->rsvp = $rsvp;
    $this->events = $events;
  }

  public function isInvitedTo($event_name) {
    return in_array($event_name, $this->events);
  }

}

?>
