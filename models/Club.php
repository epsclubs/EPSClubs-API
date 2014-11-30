<?php

class Club{
  public $code;
  public $name;
  public $description;
  public $list_execs;
  public $list_members;
  public $list_events;

  public function save(/* username and password*/)
  {
    if(isset($this->code) && isset($this->name)){
      $mysqli = DBConnector::connectMySQL();
      if(!($result = $mysqli->query("INSERT INTO clubs (code,name,description) VALUES('$this->code','$this->name','$this->description')"))){
        throw new Exception('Failed to save club: ['.$mysqli->errno.'] '.$mysqli->error);
      }
      return $this->toArray();
    }
  }

  public function toArray()
  {
    return array(
      'code' => $this->code,
      'name' => $this->name,
      'description' => $this->description,
      'list_execs' => $this->list_execs,
      'list_members' => $this->list_members,
      'list_events' => $this->list_events
    );
  }
}
