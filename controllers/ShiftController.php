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
