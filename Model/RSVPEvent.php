<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/Attendant.php";

class RSVPEvent {
  public $event_name,
    $num_invited,
    $attendants;

  public function __construct($event_name, $num_invited, $attendants) {
    $this->event_name = $event_name;
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
      $rsvpEvent_array["event_name"],
      // TODO: Don't let people send a diff num_invited from client and up their guest count
      $rsvpEvent_array["num_invited"],
      $attendants
    );
  }

}

?>
