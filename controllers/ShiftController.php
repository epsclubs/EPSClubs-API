<?php

class ShiftController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function createAction()
  {
    $shift = new Shift();
    $shift->code = $this->_params['code'];
    $shift->event_code = $this->_params['event_code'];
    $shift->list_volunteers = $this->_params['list_volunteers'];
    $shift->status = $this->_params['status'];
  }

  public function readAction()
  {
    // Read a shift
  }

  public function upateAction()
  {
    // Update a shift
  }

  public function deleteAction()
  {
    // Delete a shift
  }
}
