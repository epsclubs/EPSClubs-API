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
    $event->start_date_time = $this->_params['start_date_time'];
    $event->end_date_time = $this->_params['end_date_time'];
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
