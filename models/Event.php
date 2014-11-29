<?php

class Event{
  public $code;
  public $name;
  public $description;
  public $location;
  public $start_date_time;
  public $end_date_time;
  public $list_shifts;

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
      'start_date_time' => $this->start_date_time,
      'end_date_time' => $this->end_date_time,
      'list_shifts' => $this->list_shifts
    );
  }
}
