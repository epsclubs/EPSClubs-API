<?php
/**
* class Shift
*
* This is a model of the Shift object.
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class Shift{
  /**
  * Shift Code
  * Ex: EPS_PROGRAMMING_EVENT1_SHIFT1
  * @access public
  * @var string
  */
  public $code;
  /**
  * Event Code for the corresponding event
  * Ex: EPS_PROGRAMMING_EVENT1
  * @access public
  * @var string
  */
  public $event_code;
  /**
  * Shift Name
  * Ex: Money collection
  * @access public
  * @var string
  */
  public $name;
  /**
  * Shift Description
  * Ex: This money collection shift manages money.
  * @access public
  * @var string
  */
  public $description;
  /**
  * List of Shift Volunteers (Student Numbers)
  * Ex: 1111111,1111112,9012934
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_volunteers;
  /**
  * Maximum number of volunteers that can volunteer for this shift
  * Ex: 5
  * @access public
  * @var int
  */
  public $volunteer_limit;
  /**
  * Shift Status
  *
  * 0 = Open to Everyone,
  * 1 = Open to Club Members,
  * 2 = Closed/Only execs can add volunteers
  *
  * Ex: 0
  * @access public
  * @var int
  */
  public $status;

  /**
  * function save()
  *
  * This is a function that saves the Shift object into the database.
  *
  * @return array for the Shift object
  *
  * @todo Everything in this method
  */
  public function save()
  {

  }

  /**
  * function toArray()
  *
  * This is a function that converts the Shift object into an array.
  *
  * @return array for the Shift object
  */
  public function toArray()
  {
    return array(
      'code' => $this->code,
      'event_code' => $this->event_code,
      'name' => $this->name,
      'description' => $this->description,
      'list_volunteers' => $this->list_volunteers,
      'volunteer_limit' => $this->volunteer_limit,
      'status' => $this->status
    );
  }
}
