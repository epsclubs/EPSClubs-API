<?php
/**
* class Event
*
* This is a model of the Event object.
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class Event
{
  /**
  * Event Code
  * @example EPS_PROGRAMMING_EVENT1
  * @access public
  * @var string
  */
  public $code;
  /**
  * Event Name
  * @example The Awesome Donut Sale Event
  * @access public
  * @var string
  */
  public $name;
  /**
  * Event Description
  * @example This donut sale event is proposed with the goal of eating donuts.
  * @access public
  * @var string
  */
  public $description;
  /**
  * Event Location
  * @example 10000 Unicorn Land or School
  * @access public
  * @var string
  */
  public $location;
  /**
  * Event Starting Time
  * @example 1417325086
  * @access public
  * @var timestamp
  */
  public $start_date_time;
  /**
  * Event Ending Time
  * @example 1417325100
  * @access public
  * @var timestamp
  */
  public $end_date_time;
  /**
  * List of Event Shifts (Shift Codes)
  * @example EPS_PROGRAMMING_EVENT1_SHIFT1,EPS_PROGRAMMING_EVENT1_SHIFT2
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_shifts;

  /**
  * function save()
  *
  * This is a function that saves the Event object into the database.
  *
  * @return array for the Event object
  *
  * @todo Everything in this method
  */
  public function save()
  {

  }

  /**
  * function toArray()
  *
  * This is a function that converts the Event object into an array.
  *
  * @return array for the Event object
  */
  public function toArray()
  {
    return array(
      'code' => $this->code,
      'name' => $this->name,
      'description' => $this->description,
      'location' => $this->location,
      'start_date_time' => $this->start_date_time,
      'end_date_time' => $this->end_date_time,
      'list_shifts' => $this->list_shifts
    );
  }
}
