<?php

class Club{
  public $code;
  public $name;
  public $description;
  public $list_execs;
  public $list_members;
  public $list_events;

  public function toArray()
  {
    return array(
      'id' => $this->id,
      'code' => $this->code,
      'name' => $this->name,
      'description' => $this->description,
      'listExecs' => $this->listExecs,
      'listMembers' => $this->listMembers,
      'listEvents' => $this->listEvents
    );
  }
}
