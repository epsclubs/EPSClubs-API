<?php

class Authenticator{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function login()
  {
    // $this->_params['username'],$this->_params['userpass']
    // SQL Stuff to authenticate, returns bool
  }

  public function checkPermission()
  {
    // $this->_params['action'], $this->_params['actionScope']
  }
}
