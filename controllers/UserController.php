<?php

class UserController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function create()
  {
    $user = new User();
  }

  public function read()
  {
    // Read a user
  }

  public function upate()
  {
    // Update a user
  }

  public function delete()
  {
    // Delete a user
  }
}
