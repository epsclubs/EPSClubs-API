<?php

class EventController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function create()
  {
    $event = new Event();
  }

  public function read()
  {
    // Read a event
  }

  public function upate()
  {
    // Update a event
  }

  public function delete()
  {
    // Delete a event
  }
}
