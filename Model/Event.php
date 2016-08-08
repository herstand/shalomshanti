<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

class Event {
  public $handle,
    $name,
    $start_datetime,
    $end_datetime,
    $time_icon_src,
    $dress_icon_src,
    $location;

  public function __construct(
    $event_handle,
    $event_name,
    $start_datetime,
    $end_datetime,
    $time_icon_src,
    $dress_icon_src,
    $location
  ) {
    $this->handle = $event_handle;
    $this->name = $event_name;
    $this->start_datetime = $start_datetime;
    $this->end_datetime = $end_datetime;
    $this->time_icon_src = $time_icon_src;
    $this->dress_icon_src = $dress_icon_src;
    $this->location = $location;
  }

}

?>
