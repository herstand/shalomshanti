<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
            "`id`",
            "`Household name`",
            "`Has RSVPed`",
            "(`Ceremony adults invited` + `Ceremony children invited`) as `ceremony invited`",
            "(`Reception adults invited` + `Reception children invited`) as `reception invited`",
            "(`Havdalah adults invited` + `Havdalah children invited`) as `havdalah invited`"
          ),
          "WHERE" => "`password` = '".$password."' AND (`Ceremony adults invited` > 0 or `Ceremony children invited` or `Reception adults invited` > 0 OR `Reception children invited` > 0 or `Havdalah adults invited` > 0 or `Havdalah children invited` > 0)"
        )
      )
    );
  }

  public function getRSVPDueDate($userId) {
    return new DateTime($this->query(
      DBService::SELECT,
      "guests",
      array(
        "COLUMNS" => array(
          "`RSVP due date`"
        ),
        "WHERE" => "`id` = {$userId}"
      )
    )['RSVP due date']);
  }

   // Call with GuestService::getInstance()->getUser($id)
  public function getTrustedUser($id) {
    return $this->loadUser(
      $this->query(
        DBService::SELECT,
        "guests",
        array(
          "COLUMNS" => array(
            "`id`",
            "`Household name`",
            "`Has RSVPed`",
            "(`Ceremony adults invited` + `Ceremony children invited`) as `ceremony invited`",
            "(`Reception adults invited` + `Reception children invited`) as `reception invited`",
            "(`Havdalah adults invited` + `Havdalah children invited`) as `havdalah invited`"
          ),
          "WHERE" => "`id` = {$id} AND (`Ceremony adults invited` > 0 or `Ceremony children invited` or `Reception adults invited` > 0 OR `Reception children invited` > 0 or `Havdalah adults invited` > 0 or `Havdalah children invited` > 0)"
        )
      )
    );
  }

  // Call with GuestService::getInstance()->saveRSVP($guestId, $rsvp)
  public function saveRSVP($guestId, $rsvp) {
    $this->rsvpUser($guestId);
    return $this->saveAttendants($guestId, $rsvp);
  }

  private function rsvpUser($guestId) {
    $this->query(
      DBService::UPDATE,
      "guests",
      array(
        "SET" => array(
          "Has RSVPed" => true
        ),
        "WHERE" => "`id` = {$guestId}"
      )
    );
  }

  private function idInAttendantsOf($attendant_id, $rsvpEvent) {
    foreach ($rsvpEvent->attendants as $attendant) {
      if (!isset($attendant->id)) continue;
      if ($attendant->id === $attendant_id) {
        return true;
      }
    }
    return false;
  }

  private function removeAttendantFrom($attendantId, $guestId, $event) {
    $this->query(
      DBService::DELETE,
      $event."_guest_attendants",
      array(
        "WHERE" => "`attendant_id` = {$attendantId} and `guest_id` = {$guestId}"
      )
    );
  }

  private function removeDeletedAttendants($guestId, $rsvpEvent) {
    foreach ($this->getAttendantIds($rsvpEvent->event_name, $guestId) as $attendant_id) {
      if (!$this->idInAttendantsOf($attendant_id, $rsvpEvent)) {
        $this->removeAttendantFrom($attendant_id, $guestId, $rsvpEvent->event_name);
      }
    }
  }

  private function saveAttendants($guestId, $rsvp) {
    foreach ($rsvp->rsvpEvents as $rsvpEvent) {
      $this->removeDeletedAttendants($guestId, $rsvpEvent);
      $this->insertNewAttendantsFor($guestId, $rsvpEvent);
      $this->updateAttendantsFor($rsvpEvent);
      $rsvpEvent->attendants[0] = array();
    }
    $this->updateGuestAttendants($guestId, $rsvp);
    return $rsvp;
  }

  private function insertNewAttendantsFor($guestId, $rsvpEvent) {
    foreach ($rsvpEvent->attendants[0] as $new_attendant) {
      $attendant = $this->insertNewAttendant($guestId, $rsvpEvent->event_name, $new_attendant);
      $rsvpEvent->attendants[$attendant->id] = $attendant;
    }
  }

  private function canAcceptMoreAttendantsTo($guestId, $event_name) {
    $numberOf = $this->query(
        DBService::SELECT,
        "{$event_name}_guest_attendants, guests",
        array(
          "COLUMNS" => array(
            "COUNT(distinct `{$event_name}_guest_attendants`.`id`) as `attendants`",
            "(`".ucfirst($event_name)." adults invited` + `".ucfirst($event_name)." children invited`) as invited"
          ),
          "WHERE" => "`{$event_name}_guest_attendants`.`guest_id` = {$guestId} and `guests`.`id` = {$guestId}"
        )
      );
    return $numberOf['invited'] > $numberOf['attendants'];
  }

  private function insertNewAttendant($guestId, $event_name, $new_attendant) {
    $new_attendant_name = $this->validateInput("attendants", $new_attendant->name, "name");
    if ($this->canAcceptMoreAttendantsTo($guestId, $event_name)) {
      $new_id = $this->query(
        DBService::INSERT,
        "attendants",
        array(
          "COLUMNS" => array("`name`"),
          "VALUES" => array("\"{$new_attendant_name}\"")
        )
      );
      return new Attendant(
        $new_id,
        $new_attendant_name
      );
    } else {
      throw new Exception("Too many attendants.");
    }
  }

  private function updateAttendantsFor($rsvpEvent) {
    foreach ($rsvpEvent->attendants as $attendant) {
      if (!isset($attendant->id)) continue;
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

  private function attendantHasBeenMatchedWithGuest($event, $attendantId) {
    $matcher = $this->query(
      DBService::SELECT,
      $event."_guest_attendants",
      array(
        "COLUMNS" => array(
          "attendant_id"
        ),
        "WHERE" => "`attendant_id` = {$attendantId}"
      )
    );
    return $matcher != null && count($matcher) > 0;
  }

  private function updateAttendantMatcher($event, $guestId, $attendantIds) {
    foreach ($attendantIds as $attendantId) {
      if (!$this->attendantHasBeenMatchedWithGuest($event, $attendantId)) {
        $this->query(
          DBService::INSERT,
          $event."_guest_attendants",
          array(
            "COLUMNS" => array(
              "attendant_id",
              "guest_id"
            ),
            "VALUES" => array(
              $attendantId,
              $guestId
            )
          )
        );
      }
    }
  }
  private function updateGuestAttendants($guestId, $rsvp) {
    foreach ($this->getTrustedUser($guestId)->events as $event) {
      $this->updateAttendantMatcher(
        $event,
        $guestId,
        $rsvp->getAttendantIds($event)
      );
    }
  }

  private function loadUser($guest) {
    if ($guest['id'] === null) {
      throw new Exception("Unknown user.");
    }
    return new User(
      $guest['id'],
      $guest['Household name'],
      $this->loadRSVP($guest),
      $this->loadEvents($guest)
    );
  }

  private function createRSVPEvent(&$rsvpEvents, $guest, $eventName) {
    if (isset($guest[$eventName." invited"]) && $guest[$eventName." invited"] > 0) {
      $rsvpEvents[] = new RSVPEvent(
        $eventName,
        $guest[$eventName." invited"],
        ($guest['Has RSVPed'] ?
          $this->loadAttendants($this->getAttendantIds($eventName, $guest["id"])) :
          array())
      );
    }
  }

  private function getAttendantIds($eventName, $guestId) {
    $attendantIds = array();
    $attendantId_rows = $this->query(
      DBService::SELECT,
      "{$eventName}_guest_attendants",
      array(
        "COLUMNS" => array(
          "`attendant_id`"
        ),
        "WHERE" => "`guest_id` = {$guestId}"
      )
    );
    if ($attendantId_rows === null || count($attendantId_rows) === 0) {
      return $attendantIds;
    } else if (!isset($attendantId_rows->num_rows) && count($attendantId_rows) === 1) {
        $attendantIds[] = $attendantId_rows['attendant_id'];
    } else {
      while ($row = $attendantId_rows->fetch_assoc()) {
        $attendantIds[] = $row['attendant_id'];
      }
    }
    return $attendantIds;
  }

  private function loadRSVP($guest) {
    $rsvpEvents = array();

    foreach (array("ceremony", "reception", "havdalah") as $event) {
      if (intval($guest[$event.' invited']) > 0) {
        $this->createRSVPEvent($rsvpEvents, $guest, $event);
      }
    }
    return new RSVP(
      $guest['Has RSVPed'],
      $rsvpEvents,
      $this->getRSVPDueDate($guest['id'])
    );
  }

  private function loadAttendants($attendant_ids) {
    if ($attendant_ids === null || $attendant_ids === "") {
      return array();
    }
    $attendants = array();
    foreach(array_map('intval', $attendant_ids) as $id) {
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
    foreach (array("ceremony", "reception", "havdalah") as $event) {
      if ($guest[$event.' invited'] > 0) {
        $events[] = $event;
      }
    }
    return $events;
  }

}

?>
