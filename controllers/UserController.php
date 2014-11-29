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
    $user->username = $this->_params['username'];
    $user->email = $this->_params['email'];
    $user->first_name = $this->_params['first_name'];
    $user->last_name = $this->_params['last_name'];
    $user->student_number = $this->_params['student_number'];
    $user->classOf = $this->_params['classOf'];
    $user->volunteer_hours = $this->_params['volunteer_hours'];
    $user->list_clubs = $this->_params['list_clubs'];
    $user->list_shifts = $this->_params['list_shifts'];
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
