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
