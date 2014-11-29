<?php

class ClubController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function create()
  {
    $club = new Club();
    $club->code = $this->_params['code'];
    $club->name = $this->_params['name'];
    $club->description = $this->_params['description'];
    $club->listExecs = $this->_params['listExecs'];
    $club->listMembers = $this->_params['listMembers'];
  }

  public function read()
  {
    // Read a club
  }

  public function upate()
  {
    // Update a club
  }

  public function delete()
  {
    // Delete a club
  }
}
