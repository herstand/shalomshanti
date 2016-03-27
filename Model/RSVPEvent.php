<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Model/Attendant.php";

class RSVPEvent {
  public $event_name,
    $num_invited,
    $attendants;

  public function __construct($event_name, $num_invited, $attendants) {
    $this->num_invited = $num_invited;
    $this->attendants = $attendants;
  }

  public static function createRSVPEvent($rsvpEvent_array) {
    $attendants = array();
    foreach ($rsvpEvent_array["attendants"] as $attendant) {
      $attendants[] = new Attendant(0, $attendant["name"]);
    }
    return new RSVPEvent(
      $rsvpEvent_array["event_name"],
      $rsvpEvent_array["num_invited"],
      $attendants
    );
  }

}

?>
