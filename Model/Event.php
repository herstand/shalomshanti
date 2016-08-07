<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

class Event {
  public $event_handle,
    $event_name,
    $event_datetime;

  public function __construct($event_handle, $event_name, $event_datetime) {
    $this->event_handle = $event_handle;
    $this->event_name = $event_name;
    $this->event_datetime = $event_datetime;
  }

  public static function createEvent($event_array) {
    return new Event(
      $event_array["event_handle"],
      $event_array["event_name"],
      $event_array["event_datetime"]
    );
  }

}

?>
