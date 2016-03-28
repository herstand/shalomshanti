<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/RSVPEvent.php";

class RSVP {
  public $hasRSVPed, $rsvpEvents;

  public function __construct($hasRSVPed, $rsvpEvents) {
    $this->hasRSVPed = !!$hasRSVPed;
    $this->rsvpEvents = $rsvpEvents;
  }

  public function updateAttendant($event, $id, $name) {
    $this->rsvpEvents[$event]->attendants[$id] = $name;
  }

  public function addAttendant($name) {
    $this->rsvpEvents[$event]->attendants[0][] = $name;
  }

  public function isComing() {
    if ($this->hasRSVPed) {
      foreach ($this->rsvpEvents as $rsvpEvent) {
        if (isset($rsvpEvent->attendants) && $rsvpEvent->attendants > 0) {
          return true;
        }
      }
    }
    return false;
  }

}

?>
