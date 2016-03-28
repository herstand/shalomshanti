<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Service/GuestService.php";
require_once "Model/RSVP.php";

class User {
  public $id,
    $household_name,
    $rsvp,
    $events;

  public function __construct($id, $household_name, $rsvp, $events) {
    $this->id = $id;
    $this->household_name = $household_name;
    $this->rsvp = $rsvp;
    $this->events = $events;
  }

  public function isInvitedTo($event_name) {
    return in_array($event_name, $this->events);
  }

}

?>
