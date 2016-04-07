<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/RSVPEvent.php";

class RSVP {
  public $hasRSVPed, $rsvpEvents;

  public function __construct($hasRSVPed, $rsvpEvents) {
    $this->hasRSVPed = !!$hasRSVPed;
    $this->rsvpEvents = $rsvpEvents;
  }

  public function getAttendantIds($event_name) {
    $attendantIds = array();
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->event_name === $event_name) {
        foreach ($rsvpEvent->attendants as $attendant) {
          if (isset($attendant->id)) { //attendants[0] is an array of attendants without ids yet
            $attendantIds[] = $attendant->id;
          }
        }
      }
    }
    return $attendantIds;
  }

  public function updateAttendant($event, $id, $name) {
    $this->rsvpEvents[$event]->attendants[$id] = $name;
  }

  public function addAttendant($name) {
    $this->rsvpEvents[$event]->attendants[0][] = $name;
  }

  public function getAttendantsFor($event_name) {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->event_name === $event_name) {
        return $rsvpEvent->attendants;
      }
    }
    return array();
  }

  public function getNthAttendantFor($n, $event_name) {
    $attendants = $this->getAttendantsFor($event_name);
    if (count($attendants) > 0) {
      return $this->getAttendantsFor($event_name)[$n]->name;
    } else {
      return "";
    }
  }

  public function numberOfAttendantsAt($event_name) {
    if ($this->hasRSVPed) {
      foreach ($this->rsvpEvents as $rsvpEvent) {
        if ($rsvpEvent->event_name === $event_name) {
          return count($rsvpEvent->attendants);
        }
      }
    }
    return 0;
  }

  public function numberInvitedTo($event_name) {
    foreach ($this->rsvpEvents as $rsvpEvent) {
        if ($rsvpEvent->event_name === $event_name) {
          return $rsvpEvent->num_invited;
        }
    }
    return 0;
  }

  public function isComing() {
    if ($this->hasRSVPed) {
      foreach ($this->rsvpEvents as $rsvpEvent) {
        if (isset($rsvpEvent->attendants) && count($rsvpEvent->attendants) > 0) {
          return true;
        }
      }
    }
    return false;
  }

}

?>
