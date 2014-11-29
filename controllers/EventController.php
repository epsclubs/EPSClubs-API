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
    $event->code = $this->_params['code'];
    $event->name = $this->_params['name'];
    $event->description = $this->_params['description'];
    $event->location = $this->_params['location'];
    $event->startDateTime = $this->_params['startDateTime'];
    $event->endDateTime = $this->_params['endDateTime'];
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
