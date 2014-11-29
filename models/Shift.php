<?php

class Shift{
  public $code;
  public $event_id;
  public $list_volunteers;

  public function save()
  {

  }

  public function toArray()
  {
    return array(
      'code' => $this->code,
      'event_id' => $this->event_id,
      'list_volunteers' => $this->list_volunteers
    );
  }
}
