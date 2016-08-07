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
    $guest = $this->query(
        DBService::SELECT,
        "guests",
        array(
          "COLUMNS" => array(
            "`id`",
            "`Household name`",
            "`Has RSVPed`",
            "`Friend login` as `isFriend`"
          ),
          "WHERE" => "`password` = '".$password."'"
        )
      );
    $guest['id'] = intval($guest['id']);
    $guest['Has RSVPed'] = boolval($guest['Has RSVPed']);
    $guest['isFriend'] = boolval($guest['isFriend']);
    $invitations = $this->query(
      DBService::SELECT,
      "invitations, events, guests",
      array(
        "COLUMNS" => array(
          "`events`.`Event handle`",
          "`events`.`Event name`",
          "`events`.`Event start time`",
          "(`adults` + `children`) as `Number invited`"
        ),
        "WHERE" => "
          `events`.id = `invitations`.`event_id` AND
          `guests`.id = `invitations`.`guest_id` AND
          `guests`.`password` = '".$password."'
          ORDER BY `events`.`order` ASC
        "
      )
    );
    $user = $this->loadUser($guest, $invitations);
    return $user;
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
            "`Friend login` as `isFriend`"
          ),
          "WHERE" => "`id` = {$id}"
        )
      ),
      $this->query(
        DBService::SELECT,
        "invitations, events, guests",
        array(
          "COLUMNS" => array(
            "`events`.`Event handle`",
            "`events`.`Event name`",
            "`events`.`Event start time`",
            "(`adults` + `children`) as `Number invited`",
          ),
          "WHERE" => "
            `events`.id = `invitations`.`event_id` AND
            `guests`.id = `invitations`.`guest_id` AND
            `guests`.`id` = {$id}
            ORDER BY `events`.`order` ASC
          "
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
      "guest_attendants",
      array(
        "WHERE" => "`attendant_id` = {$attendantId} and `guest_id` = {$guestId}"
      )
    );
    $this->query(
      DBService::DELETE,
      "event_attendants",
      array(
        "WHERE" => "`attendant_id` = {$attendantId} and `event_id` = (SELECT `id` from `events` WHERE `Event handle` = \"{$event}\")"
      )
    );
  }

  private function removeDeletedAttendants($guestId, $rsvpEvent) {
    foreach ($this->getAttendantIds($rsvpEvent->event_handle, $guestId) as $attendant_id_obj) {
      $attendant_id = is_array($attendant_id_obj) ?
        intval($attendant_id_obj['attendant_id']) :
        intval($attendant_id_obj);
      if (!$this->idInAttendantsOf($attendant_id, $rsvpEvent)) {
        $this->removeAttendantFrom($attendant_id, $guestId, $rsvpEvent->event_handle);
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
      $attendant = $this->insertNewAttendant($guestId, $rsvpEvent->event_handle, $new_attendant);
      $rsvpEvent->attendants[$attendant->id] = $attendant;
    }
  }

  private function canAcceptMoreAttendantsTo($guestId, $event_handle) {
    $numberOfAttendants = $this->query(
        DBService::SELECT,
        "guest_attendants, event_attendants",
        array(
          "COLUMNS" => array(
            "COUNT(distinct `guest_attendants`.`id`) as \"attendants\"",
          ),
          "WHERE" => "
          `guest_attendants`.`attendant_id` = `event_attendants`.`attendant_id` AND
            `guest_attendants`.`guest_id` = {$guestId} AND
            `event_attendants`.`event_id` =
              (SELECT `id` FROM events WHERE `Event handle` = \"{$event_handle}\")
          "
        )
      );
    $numberInvited = $this->query(
        DBService::SELECT,
        "invitations",
        array(
          "COLUMNS" => array(
            "(`invitations`.`adults` + `invitations`.`children`) as \"invited\""
          ),
          "WHERE" => "
            `invitations`.`guest_id` = {$guestId} AND
            `invitations`.`event_id` =
              (SELECT `id` FROM events WHERE `Event handle` = \"{$event_handle}\")
          "
        )
      );
    return $numberInvited['invited'] > $numberOfAttendants['attendants'];
  }

  private function insertNewAttendant($guestId, $event_handle, $new_attendant) {
    $new_attendant_name = $this->validateInput("attendants", $new_attendant->name, "name");
    if ($this->canAcceptMoreAttendantsTo($guestId, $event_handle)) {
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

  private function attendantHasBeenMatchedWithGuestForThisEvent($eventHandle, $guestId, $attendantId) {
    $guestMatcher = $this->query(
      DBService::SELECT,
      "guest_attendants",
      array(
        "COLUMNS" => array(
          "attendant_id"
        ),
        "WHERE" => "`guest_id` = {$guestId} AND `attendant_id` = {$attendantId}"
      )
    );
    $eventMatcher = $this->query(
      DBService::SELECT,
      "event_attendants",
      array(
        "COLUMNS" => array(
          "attendant_id"
        ),
        "WHERE" => "`event_id` = (SELECT `id` from events WHERE `Event handle` = \"$eventHandle\") AND `attendant_id` = {$attendantId}"
      )
    );
    return $guestMatcher != null && count($guestMatcher) > 0;
  }

  private function updateAttendantMatcher($event, $guestId, $attendantIds) {
    foreach ($attendantIds as $attendantId) {
      if (is_array($attendantId)) {
        $attendantId = intval($attendantId['attendant_id']);
      }
      if (!$this->attendantHasBeenMatchedWithGuestForThisEvent($event, $guestId, $attendantId)) {
        $this->query(
          DBService::INSERT,
          "guest_attendants",
          array(
            "COLUMNS" => array(
              "guest_id",
              "attendant_id"
            ),
            "VALUES" => array(
              $guestId,
              $attendantId
            )
          )
        );
        $this->query(
          DBService::INSERT,
          "event_attendants",
          array(
            "COLUMNS" => array(
              "event_id",
              "attendant_id"
            ),
            "VALUES" => array(
              "(SELECT `id` from events WHERE `Event handle` = \"{$event}\")",
              $attendantId
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

  private function loadUser($guest, $invitations) {
    if ($guest['id'] === null) {
      throw new Exception("Unknown user.");
    }
    $rsvp = $this->loadRSVP($guest, $invitations);
    $events = $this->loadEvents($invitations);
    return new User(
      $guest['id'],
      $guest['isFriend'],
      $guest['Household name'],
      $rsvp,
      $events
    );
  }

  private function createRSVPEvent(&$rsvpEvents, $guest, $invitation) {
    if (isset($invitation["Number invited"]) && $invitation["Number invited"] > 0) {
      $rsvpEvents[] = new RSVPEvent(
        $invitation["Event handle"],
        $invitation["Event name"],
        $invitation["Event start time"],
        $invitation["Number invited"],
        (
          $guest['Has RSVPed'] ?
            $this->loadAttendants(
              $this->getAttendantIds(
                $invitation["Event handle"],
                $guest["id"]
              )
            ) :
            array()
        )
      );
    }
  }

  private function getAttendantIds($eventHandle, $guestId) {
    $attendantIds = array();
    $attendantId_rows = $this->query(
      DBService::SELECT,
      "attendants, guest_attendants, event_attendants",
      array(
        "COLUMNS" => array(
          "distinct(`guest_attendants`.`attendant_id`)"
        ),
        "WHERE" => "
          `attendants`.`id` = `guest_attendants`.`attendant_id` AND
          `attendants`.`id` = `event_attendants`.`attendant_id` AND
          `guest_attendants`.`guest_id` = {$guestId} AND
          `event_attendants`.`event_id` =
            (SELECT id FROM events WHERE `Event handle` = \"{$eventHandle}\")
        "
      )
    );
    if (isset($attendantId_rows['attendant_id'])) {
      $attendantIds[] = intval($attendantId_rows['attendant_id']);
    } else {
      for ($i = 0; $i < count($attendantId_rows); $i++) {
        $attendantIds[] = intval($attendantId_rows[$i]['attendant_id']);
      }
    }
    return $attendantIds;
  }

  private function loadRSVP($guest, $invitations) {
    $rsvpEvents = array();
    foreach ($invitations as $invitation) {
      if (intval($invitation['Number invited']) > 0) {
        $this->createRSVPEvent($rsvpEvents, $guest, $invitation);
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
    foreach($attendant_ids as $attendant_id) {
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
            $attendant_id,
            "id"
          )
        )
      );
      $attendants[] = new Attendant(
        intval($attendant['id']),
        $attendant['name']
      );
    }
    return $attendants;
  }

  private function loadEvents($invitations) {
    $events = array();
    foreach ($invitations as $invitation) {
      if ($invitation['Number invited'] > 0) {
        $events[] = $invitation['Event handle'];
      }
    }
    return $events;
  }

}

?>
