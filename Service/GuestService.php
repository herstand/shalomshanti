<?php

require_once $_SERVER['DOCUMENT_ROOT']."/db_access.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Service/PasswordHash.php";

require_once $_SERVER['DOCUMENT_ROOT']."/Model/Attendant.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Model/User.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Model/RSVPEvent.php";

class GuestService extends DBService {
  public $singleton;
  private $mysqli;

  public function __construct() {
    global $mysqli;
    $this->mysqli = $mysqli;
  }

  public static function getInstance() {
    if (!isset($this->singleton)) {
      $this->singleton = new GuestService();
    }
    return $this->singleton;
  }

  // Call with GuestService::getInstance()->getUserData($password)
  public function getUserData($password) {
    return $this->loadUser(
      $this->query(
        DBService::SELECT,
        "guest",
        array(
          "COLUMNS" => array(
            "`Household name`",
            "(`Ceremony adults invited` + `Ceremony children invited`) as `Ceremony invited`",
            "(`Reception adults invited` + `Reception children invited`) as `Reception invited`",
            "(`Havdalah adults invited` + `Havdalah children invited`) as `Havdalah invited`",
            "`Ceremony attendants`",
            "`Reception attendants`",
            "`Havdalah attendants`"
          ),
          "WHERE" => "`password` = ".PasswordHash::hashPassword(
            $this->validateInput(
              "guest"
              $password,
              "password"
            )
          )
        )
      );
    );
  }

  // Call with GuestService::getInstance()->saveRSVP($guestId, $rsvp)
  public function saveRSVP($guestId, $rsvp) {
    return $this->saveAttendants($guestId, $rsvp);
  }

  private function saveAttendants($guestId, $rsvp) {
    foreach ($rsvp->rsvpEvents as $rsvpEvent) {
      $this->insertNewAttendantsFor($rsvpEvent);
      $this->updateAttendantsFor($rsvpEvent);
      $rsvpEvent->attendants[0] = array();
    }
    $this->updateGuestAttendants($guestId, $rsvp);
    return $rsvp;
  }

  private function insertNewAttendantsFor($rsvpEvent) {
    foreach ($rsvpEvent->attendants[0] as $new_attendant) {
      $rsvpEvent->attendants[$new_id] =
        $this->insertNewAttendant($new_attendant);
    }
  }

  private function insertNewAttendant($new_attendant) {
    $new_attendant_name = $this->validateInput("attendants", $new_attendant->name, "name");
    $new_id = $this->query(
      DBService::INSERT,
      "attendants",
      array(
        "COLUMNS" => array("`name`"),
        "VALUES" => array("\"{new_attendant_name}\"")
      )
    );
    return new Attendant(
      $new_id,
      $new_attendant_name
    );
  }

  private function updateAttendantsFor($rsvpEvent) {
    foreach ($rsvpEvent->attendants as $id => $new_attendant) {
      if ($id === 0) continue;
      $this->updateAttendant($id, $new_attendant);
    }
  }

  private function updateAttendant($id, $new_attendant) {
    $new_attendant_name = $this->validateInput("attendants", $new_attendant->name, "name");
    $this->query(
      DBService::UPDATE,
      "attendants",
      array(
        "SET" => array(
          "name" => $new_attendant_name
        ),
        "WHERE" => "`id` = {$id}"
      )
    );
  }

  private function updateGuestAttendants($guestId, $rsvp) {
    $ceremony_attendants = $rsvp->getCeremonyAttendantIds();
    $reception_attendants = $rsvp->getReceptionAttendantIds();
    $havdalah_attendants = $rsvp->getHavdalahAttendantIds();
    $this->query(
      DBService::UPDATE,
      "guests",
      array(
        "SET" => array(
          "Ceremony attendants" => $ceremony_attendants,
          "Reception attendants" => $reception_attendants,
          "Havdalah attendants" => $havdalah_attendants
        ),
        "WHERE" => "`id` = {$guestId}"
      )
    );
  }

  private function loadUser($guest) {
    return new User(
      $guest['Household name'],
      $this->loadRSVP($guest),
      $this->loadEvents($guest)
    );
  }

  private function loadRSVP($guest) {
    return new RSVP(
      array(
        "Ceremony" => new RSVPEvent("Ceremony", $guest['Ceremony invited'], $this->loadAttendants($guest['Ceremony attendants'])),
        "Reception" => new RSVPEvent("Reception", $guest['Reception invited'], $this->loadAttendants($guest['Reception attendants'])),
        "Havdalah" => new RSVPEvent("Havdalah", $guest['Havdalah invited'], $this->loadAttendants($guest['Havdalah attendants']))
      )
    );
  }

  private function loadAttendants($attendant_ids) {
    $attendants = array();
    $attendants[0] = array();
    foreach ($attendant_ids as $id) {
      $attendant = $this->query(
        DBService::SELECT,
        "attendants",
        array(
          "COLUMNS" => array(
            "`id`",
            "`name`"
          ),
          "WHERE" => "`id` = ".$this->validateInput(
            "attendants",
            $id,
            "id"
          )
        )
      );
      $attendants[$attendant['id']] = new Attendant(
        $attendant['id'],
        $attendant['name']
      );
    }
    return $attendants;
  }

  private function loadEvents($guest) {
    $events = array();
    if ($guest['Ceremony invited'] > 0) {
      $events[] = "Ceremony";
    }
    if ($guest['Reception invited'] > 0) {
      $events[] = "Reception";
    }
    if ($guest['Havdalah invited'] > 0) {
      $events[] = "Havdalah";
    }
    return $events;
  }

}

?>
