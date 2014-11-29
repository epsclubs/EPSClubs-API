<?php

class Shift{
  public $code;
  public $eventID;
  public $listVolunteers;

  public function toArray()
  {
    return array(
      'id' => $this->id,
      'code' => $this->code,
      'eventID' => $this->eventID,
      'listVolunteers' => $this->listVolunteers
    );
  }
}
