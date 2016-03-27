<?php

// ID of 0, means unknown
class Attendant {
  public $id, $name;

  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
  }

}
