<?php

class Event{
  public $code;
  public $name;
  public $description;
  public $location;
  public $startDateTime;
  public $endDateTime;
  public $listShifts;

  public function save()
  {

  }

  public function toArray()
  {
    return array(
      'code' => $this->code,
      'name' => $this->name,
      'description' => $this->description,
      'location' => $this->location,
      'startDateTime' => $this->startDateTime,
      'endDateTime' => $this->endDateTime,
      'listShifts' => $this->listShifts
    );
  }
}
