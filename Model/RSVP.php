<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/RSVPEvent.php";

class RSVP {
  public $rsvpEvents;

  public function __construct($rsvpEvents) {
    $this->rsvpEvents = $rsvpEvents;
  }

  public function hasRSVPedForAllFutureEvents() {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if (
        (new DateTime($rsvpEvent->event->start_datetime))->getTimestamp() > time() &&
        !$rsvpEvent->hasRSVPed
      ) {
          return false;
      }
    }
    return true;
  }

  public function getNextDueDate() {
    $nextDueDate = INF;
    foreach ($this->rsvpEvents as $rsvpEvent) {
      $dueDate = (new DateTime($rsvpEvent->rsvp_due_date))->getTimestamp();
      if ($dueDate > time() && $dueDate < $nextDueDate) {
          $nextDueDate = $dueDate;
      }
    }
    if ($nextDueDate === INF) {
      throw new Exception ("RSVP due date not set for current user.");
    }
    return new DateTime("@".$nextDueDate);
  }

  public function getAttendantIds($event_handle) {
    $attendantIds = array();
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->event->handle === $event_handle) {
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

  public function getAttendantsFor($event_handle) {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->event->handle === $event_handle) {
        return $rsvpEvent->attendants;
      }
    }
    return array();
  }

  public function getNthAttendantFor($n, $event_handle) {
    $attendants = $this->getAttendantsFor($event_handle);
    if (count($attendants) > 0) {
      return $this->getAttendantsFor($event_handle)[$n];
    } else {
      return "";
    }
  }

  public function numberOfAttendantsAt($event_handle) {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->hasRSVPed && $rsvpEvent->event->handle === $event_handle) {
        return count($rsvpEvent->attendants);
      }
    }
    return 0;
  }

  public function numberInvitedTo($event_handle) {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->event->handle === $event_handle) {
        return $rsvpEvent->num_invited;
      }
    }
    return 0;
  }

  public function isComing() {
    foreach ($this->rsvpEvents as $rsvpEvent) {
      if ($rsvpEvent->hasRSVPed && isset($rsvpEvent->attendants) && count($rsvpEvent->attendants) > 0) {
        return true;
      }
    }
    return false;
  }

}

?>
