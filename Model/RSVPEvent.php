<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/Attendant.php";
require_once "Model/Location.php";

class RSVPEvent {
  public $event,
    $rsvp_due_date,
    $hasRSVPed,
    $num_invited,
    $attendants;

  public function __construct(
    $event,
    $rsvp_due_date,
    $hasRSVPed,
    $num_invited,
    $attendants
  ) {
    $this->event = $event;
    $this->rsvp_due_date = $rsvp_due_date;
    $this->$hasRSVPed = !!$hasRSVPed;
    $this->num_invited = $num_invited;
    $this->attendants = $attendants;
  }

  //TODO: Create this via GuestService, passing along only necessary user data
  public static function createRSVPEvent($rsvpEvent_array, $event) {
    $attendants = array();
    $attendants[0] = array();
    foreach ($rsvpEvent_array["attendants"] as $attendant) {
      if (isset($attendant["id"])) {
        $attendants[] = new Attendant($attendant["id"], $attendant["name"]);
      } else {
        foreach ($attendant as $a) {
          $attendants[0][] = new Attendant(0, $a["name"]);
        }
      }
    }

    return new RSVPEvent(
      $event,
      $rsvpEvent_array["rsvp_due_date"],
      $rsvpEvent_array["hasRSVPed"],
      // TODO: Don't let people send a diff num_invited from client and up their guest count
      $rsvpEvent_array["num_invited"],
      $attendants
    );
  }

}

?>
