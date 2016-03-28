<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "db_access.php";
require_once "Service/DBService.php";
require_once "Service/PasswordHash.php";

require_once "Model/Attendant.php";
require_once "Model/User.php";
require_once "Model/RSVPEvent.php";


class GuestService extends DBService {
  public static $singleton;
  protected $mysqli;

  public function __construct() {
    global $mysqli;
    $this->mysqli = $mysqli;
  }

  public static function getInstance() {
    if (!isset(self::$singleton)) {
      self::$singleton = new GuestService();
    }
    return self::$singleton;
  }

  // Call with GuestService::getInstance()->getUserData($password)
  public function getUserData($password) {
    $password = PasswordHash::hashPassword(
      $this->validateInput(
        "guests",
        $password,
        "password"
      )
    );

    return $this->loadUser(
      $this->query(
        DBService::SELECT,
        "guests",
        array(
          "COLUMNS" => array(
            "`hashedId` as `id`",
            "`Household name`",
            "`Has RSVPed`",
            "(`Ceremony adults invited` + `Ceremony children invited`) as `Ceremony invited`",
            "(`Reception adults invited` + `Reception children invited`) as `Reception invited`",
            "(`Havdalah adults invited` + `Havdalah children invited`) as `Havdalah invited`",
            "`Ceremony attendants`",
            "`Reception attendants`",
            "`Havdalah attendants`"
          ),
          "WHERE" => "`password` = '".$password."'"
        )
      )
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
    foreach ($rsvpEvent->attendants as $attendant) {
      if ($attendant->id === 0) continue;
      $this->updateAttendant($attendant->id, $attendant->name);
    }
  }

  private function updateAttendant($attendant_id, $new_attendant_name) {
    $new_attendant_name = $this->validateInput("attendants", $new_attendant_name, "name");
    $this->query(
      DBService::UPDATE,
      "attendants",
      array(
        "SET" => array(
          "name" => $new_attendant_name
        ),
        "WHERE" => "`id` = {$attendant_id}"
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
      $guest['id'],
      $guest['Household name'],
      $this->loadRSVP($guest),
      $this->loadEvents($guest)
    );
  }

  private function createRSVPEvent(&$rsvpEvents, $guest, $eventName) {
    if (isset($guest["{$eventName} invited"]) && $guest["{$eventName} invited"] > 0) {
      return new RSVPEvent(
        $eventName,
        $guest[$eventName.' invited'],
        ($guest['Has RSVPed'] ?
          $this->loadAttendants($guest[$eventName.' attendants']) :
          array())
      );
    }
  }

  private function loadRSVP($guest) {
    $rsvpEvents = array();
    $this->createRSVPEvent($rsvpEvents, $guest, "Ceremony");
    $this->createRSVPEvent($rsvpEvents, $guest, "Reception");
    $this->createRSVPEvent($rsvpEvents, $guest, "Havdalah");
    return new RSVP($guest['Has RSVPed'], $rsvpEvents);
  }

  private function loadAttendants($attendant_ids) {
    if ($attendant_ids === null) {
      return array();
    }
    $attendants = array();
    foreach (
      array_map(
        'intval',
        explode(
          ",",
          $attendant_ids
        )
      ) as $id
    ) {
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
      $attendants[] = new Attendant(
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
