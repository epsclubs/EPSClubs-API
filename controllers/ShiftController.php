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
    $shift->eventID = $this->_params['eventID'];
    $shift->listVolunteers = $this->_params['listVolunteers'];
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
