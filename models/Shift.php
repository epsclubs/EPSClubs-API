<?php

class Shift{
  public $code;
  public $eventID;
  public $listVolunteers;

  public function save()
  {

  }

  public function toArray()
  {
    return array(
      'code' => $this->code,
      'eventID' => $this->eventID,
      'listVolunteers' => $this->listVolunteers
    );
  }
}
