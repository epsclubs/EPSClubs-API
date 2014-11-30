<?php
/**
* class EventController
*
* This is a controller for the Club object.
*
* called using controller 'ClubController'
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class EventController{
  /**
  * Parameters passed to the controller
  *
  * @access private
  * @var array
  */
  private $_params;

  /**
  * Constructor for EventController, sets up _params
  *
  * @param array $params
  */
  public function __construct($params)
  {
    $this->_params = $params;
  }

  /**
  * function createAction()
  *
  * called using action 'create'
  *
  * sets up Event object (database)
  *
  * @param string $params['username']
  * @param string $params['userpass']
  * @param string $params['code']
  * @param string $params['name']
  * @param string $params['description']
  * @param string $params['location']
  * @param string $params['start_date_time']
  * @param string $params['end_date_time']
  *
  * @return array of the Event object
  *
  * @todo database, username and password auth, permission
  */
  public function createAction()
  {
    $event = new Event();
    $event->code = $this->_params['code'];
    $event->name = $this->_params['name'];
    $event->description = $this->_params['description'];
    $event->location = $this->_params['location'];
    $event->start_date_time = $this->_params['start_date_time'];
    $event->end_date_time = $this->_params['end_date_time'];
  }

  public function readAction()
  {
    // Read an event
  }

  public function upateAction()
  {
    // Update an event
  }

  public function deleteAction()
  {
    // Delete an event
  }
}
