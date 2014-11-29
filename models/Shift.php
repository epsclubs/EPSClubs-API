<?php

class Shift{
  public $code;
  public $event_code;
  public $list_volunteers;
  public $status;

  public function save()
  {

  }

  public function toArray()
  {
    return array(
      'code' => $this->code,
      'event_code' => $this->event_code,
      'list_volunteers' => $this->list_volunteers,
      'status' => $this->status
    );
  }
}
