<?php
/**
* class User
*
* This is a model of the User object.
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class User{
  /**
  * Username for User
  * Ex: some_people
  * @access public
  * @var string
  */
  public $username;
  /**
  * Email Address for User
  * Ex: someone@somedomain.com
  * @access public
  * @var string
  */
  public $email;
  /**
  * First Name of User
  * Ex: Someone
  * @access public
  * @var string
  */
  public $first_name;
  /**
  * Last Name of User
  * Ex: SomePeople
  * @access public
  * @var string
  */
  public $last_name;
  /**
  * Student Number of User
  * Ex: 1111111
  * @access public
  * @var int
  */
  public $student_number;
  /**
  * Year of Graduation
  * Ex: 2015
  * @access public
  * @var int
  */
  public $class_of;
  /**
  * Number of volunteer hours the User have
  * Ex: 50
  * @access public
  * @var int
  */
  public $volunteer_hours;
  /**
  * List of Clubs the User is in
  * Ex: EPS_PROGRAMMING,EPS_CCYS
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_clubs;
  /**
  * List of Shifts the User has done/will be doing
  * Ex: EPS_PROGRAMMING_EVENT1_SHIFT1,EPS_PROGRAMMING_EVENT1_SHIFT2
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_shifts;

  /**
  * function save()
  *
  * This is a function that saves the User object into the database.
  *
  * @return array for the User object
  *
  * @todo Everything in this method
  */
  public function save()
  {

  }

  /**
  * function toArray()
  *
  * This is a function that converts the User object into an array.
  *
  * @return array for the User object
  */
  public function toArray()
  {
    return array(
      'username' => $this->username,
      'email' => $this->email,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'student_number' => $this->student_number,
      'class_of' => $this->class_of,
      'volunteer_hours' => $this->volunteer_hours,
      'list_clubs' => $this->list_clubs,
      'list_shifts' => $this->list_shifts
    );
  }
}
