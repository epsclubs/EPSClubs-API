<?php

class ShiftController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function create()
  {
    $shift = new Shift();
    $shift->code = $this->_params['code'];
    $shift->event_id = $this->_params['event_id'];
    $shift->list_volunteers = $this->_params['list_volunteers'];
  }

  public function read()
  {
    // Read a shift
  }

  public function upate()
  {
    // Update a shift
  }

  public function delete()
  {
    // Delete a shift
  }
}
