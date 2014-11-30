<?php

class UserController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function createAction()
  {
    $user = new User();
    $user->username = $this->_params['username'];
    $user->email = $this->_params['email'];
    $user->first_name = $this->_params['first_name'];
    $user->last_name = $this->_params['last_name'];
    $user->student_number = $this->_params['student_number'];
    $user->class_of = $this->_params['class_of'];
    $user->volunteer_hours = $this->_params['volunteer_hours'];
    $user->list_clubs = $this->_params['list_clubs'];
    $user->list_shifts = $this->_params['list_shifts'];
  }

  public function readAction()
  {
    // Read a user
  }

  public function upateAction()
  {
    // Update a user
  }

  public function deleteAction()
  {
    // Delete a user
  }
}
