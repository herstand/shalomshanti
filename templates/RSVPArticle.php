<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
    require_once "Controller/SessionController.php";
    $session = SessionController::getSession();
}

class RSVPArticle {

  public static function createRSVPArticle($event_name) {
    global $session;
    $dom = new DOMDocument('1.0', 'utf-8');

    $dom->appendChild(
      self::createTitle($dom, $event_name)
    );
    $dom->appendChild(
      self::createNumbers($dom, $event_name)
    );
    $dom->appendChild(
      self::createAttendantInputs($dom, $event_name)
    );
    if (
      $session->user->rsvp->numberInvitedTo($event_name) >
      $session->user->rsvp->numberOfAttendantsAt($event_name)
    ) {
      $dom->appendChild(self::createAddButton($dom));
    }
    return $dom->saveHTML();
  }

  private static function createTitle($dom, $event_name) {
    $title = $dom->createElement('h2');
    $title->setAttribute('class', 'typ-title');
    // TODO: Automate this
    if ($event_name === "havdalah") {
      $mehendi = $dom->createElement("span");
      $mehendi->appendChild($dom->createTextNode("Mehendi"));

      $ampersand = $dom->createElement("span");
      $ampersand->appendChild($dom->createTextNode("&"));
      $ampersand->setAttribute("class", "ampersand");

      $havdalah = $dom->createElement("span");
      $havdalah->appendChild($dom->createTextNode("Havdalah"));

      $title->appendChild($mehendi);
      $title->appendChild($ampersand);
      $title->appendChild($havdalah);

    } else if ($event_name === "nyc") {
      $openhouse = $dom->createElement("span");
      $openhouse->appendChild($dom->createTextNode("Open House Reception"));

      $title->appendChild($openhouse);

    } else {
      $title->appendChild($dom->createTextNode($event_name));
    }


    return $title;
  }

  private static function createNumbers($dom, $event_name) {
    global $session;
    $section = $dom->createElement('section');
    $section->setAttribute("class", "legend");

    $section->appendChild(
      self::createNumberFigure(
        $dom,
        $session->user->rsvp->numberOfAttendantsAt($event_name),
        $event_name,
        "attending"
      )
    );

    $of = $dom->createElement('span');
    $of->appendChild($dom->createTextNode("of"));
    $of->setAttribute('class', "typ-caption of");
    $section->appendChild($of);

    $section->appendChild(
      self::createNumberFigure(
        $dom,
        $session->user->rsvp->numberInvitedTo($event_name),
        $event_name,
        "invited"
      )
    );

    return $section;
  }

  private static function createNumberFigure($dom, $num, $event_name, $caption_label) {
    $figure = $dom->createElement('figure');
    $number = $dom->createElement('span');
    $number->appendChild(
      $dom->createTextNode(
        $num
      )
    );
    $number->setAttribute("class", "typ-number");
    $figure->appendChild($number);

    $caption = $dom->createElement('figcaption');
    $caption->appendChild($dom->createTextNode($caption_label));
    $caption->setAttribute("class", "typ-caption");

    $figure->appendChild($caption);

    return $figure;
  }

  public static function createAttendantFieldset($dom, $event_name, $i, $attendant = null) {
    if ($attendant === null) {
      $attendant = new Attendant(0, "");
    }
    $fieldset = $dom->createElement("fieldset");
    $fieldset->setAttribute("data-event-name", $event_name);
    $fieldset->setAttribute("data-attendant-index", $i);

    $input = $dom->createElement("input");
    $input->setAttribute("id", "{$event_name}_{$i}");
    $input->setAttribute("class", "typ-body");
    $input->setAttribute("type", "text");
    $input->setAttribute("required", "true");
    $input->setAttribute("placeholder", "Enter guest's first and last name");
    $input->setAttribute("value", $attendant->name);

    $removeFieldset = $dom->createElement("label");
    $removeFieldset->appendChild($dom->createTextNode("✕"));
    $removeFieldset->setAttribute("class", "removeFieldset");
    $removeFieldset->setAttribute("for", "{$event_name}_{$i}");

    $fieldset->appendChild($input);
    $fieldset->appendChild($removeFieldset);

    return $fieldset;
  }

  private static function createAttendantInputs($dom, $event_name) {
    global $session;
    $section = $dom->createElement("section");
    $section->setAttribute(
      "class",
      "attendants"
    );

    $attendant_inputs = array();
    for ($i = 0; $i < $session->user->rsvp->numberOfAttendantsAt($event_name); $i++) {
      $attendant = $session->user->rsvp->getNthAttendantFor($i, $event_name);
      $fieldset = self::createAttendantFieldset(
        $dom,
        $event_name,
        isset($attendant->id) ? $attendant->id : 0,
        $attendant
      );

      $section->appendChild($fieldset);
    }

    return $section;
  }

  public static function createAddButton($dom, $class = "") {
    $button = $dom->createElement("button");
    $button->appendChild($dom->createTextNode("+ Add an attendee"));
    $button->setAttribute("class", "typ-littleTitle add {$class}");
    $button->setAttribute("type", "button");
    return $button;
  }

}

?>