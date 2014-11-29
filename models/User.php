<?php

class User{
  public $username;
  public $email;
  public $first_name;
  public $last_name;
  public $student_number;
  public $classOf;
  public $volunteer_hours;
  public $list_clubs;
  public $list_shifts;

  public function save()
  {

  }

  public function toArray()
  {
    return array(
      'username' => $this->username,
      'email' => $this->email,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'student_number' => $this->student_number,
      'classOf' => $this->classOf,
      'volunteer_hours' => $this->volunteer_hours,
      'list_clubs' => $this->list_clubs,
      'list_shifts' => $this->list_shifts
    );
  }
}
