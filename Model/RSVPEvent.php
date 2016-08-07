<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/Attendant.php";

class RSVPEvent {
  public $event_handle,
    $event_name,
    $start_datetime,
    $num_invited,
    $attendants;

  public function __construct($event_handle, $event_name, $start_datetime, $num_invited, $attendants) {
    $this->event_handle = $event_handle;
    $this->event_name = $event_name;
    $this->start_datetime = $start_datetime;
    $this->num_invited = $num_invited;
    $this->attendants = $attendants;
  }

  public static function createRSVPEvent($rsvpEvent_array) {
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
      $rsvpEvent_array["Event handle"],
      $rsvpEvent_array["Event name"],
      $rsvpEvent_array["Event start time"],
      // TODO: Don't let people send a diff num_invited from client and up their guest count
      $rsvpEvent_array["num_invited"],
      $attendants
    );
  }

}

?>
