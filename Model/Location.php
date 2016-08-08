<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

class Location {
  public $name,
    $address_line_1,
    $address_line_2,
    $city,
    $state,
    $zip,
    $country,
    $map_link,
    $icon_link;

  public function __construct(
    $name,
    $address_line_1,
    $address_line_2,
    $city,
    $state,
    $zip,
    $country,
    $map_link,
    $icon_link
  ) {
    $this->name = $name;
    $this->address_line_1 = $address_line_1;
    $this->address_line_2 = $address_line_2;
    $this->city = $city;
    $this->state = $state;
    $this->zip = $zip;
    $this->country = $country;
    $this->map_link = $map_link;
    $this->icon_link = $icon_link;
  }
}