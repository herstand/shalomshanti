<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Service/GuestService.php";
require_once "Model/RSVP.php";

class User {
  public $id, // TODO: This is their db primary key id now. It should be a session variable.
    $household_name,
    $rsvp,
    $events,
    $isFriend; //A friend is someone who can't rsvp, but can see all events

  public function __construct($id, $isFriend, $household_name, $rsvp = null, $events = null) {
    $this->id = $id;
    $this->isFriend = $isFriend;
    $this->household_name = $household_name;
    $this->rsvp = $rsvp;
    $this->events = $events;
  }

  public function isInvitedTo($event_handle) {
    return in_array($event_handle, $this->events);
  }

}

?>
