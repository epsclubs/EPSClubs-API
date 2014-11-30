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
  * @param string $params['club_code']
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
    if(!isset($this->_params['code'])||
        !isset($this->_params['club_code'])||
        !isset($this->_params['name'])||
        !isset($this->_params['description'])||
        !isset($this->_params['location'])||
        !isset($this->_params['start_date_time'])||
        !isset($this->_params['end_date_time'])
        ){throw new Exception('Cannot create Event: Parameter incomplete');}
    $event = new Event();
    $event->code = $this->_params['code'];
    $event->club_code = $this->_params['club_code'];
    $event->name = $this->_params['name'];
    $event->description = $this->_params['description'];
    $event->location = $this->_params['location'];
    $event->start_date_time = $this->_params['start_date_time'];
    $event->end_date_time = $this->_params['end_date_time'];

    $event->save();

    return $event->toArray();
  }

  public function readAction()
  {
    if(!isset($this->_params['code'])){
      throw new Exception('No \'code\' parameter passed for read event function');
    }
    $event_code = $this->_params['code'];
    $mysqli = DBConnector::connectMySQL();

    // Basic Info
    if(!($result = $mysqli->query("SELECT * FROM `events` WHERE code='$event_code'"))){
      throw new Exception('Failed to read event: ['.$mysqli->errno.'] '.$mysqli->error);
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if(!$row['code']) throw new Exception('Failed to read event: event with code "'.$event_code.'" cannot be found.');
    $event = new Event();
    $event->code = $row['code'];
    $event->club_code = $row['club_code'];
    $event->name = $row['name'];
    $event->description = $row['description'];
    $event->location = $row['location'];
    $event->start_date_time = $row['start_date_time'];
    $event->end_date_time = $row['end_date_time'];

    // Extra scope info: list_execs, list_members, list_events
    if(isset($this->_params['scope'])){
      $scope = explode(',',$this->_params['scope']);
      if(in_array('list_shifts',$scope)){
        if(!($result = $mysqli->query("SELECT code FROM `shifts` WHERE event_code='$event_code'"))){
          throw new Exception('Failed to read event list: ['.$mysqli->errno.'] '.$mysqli->error);
        }
        $shifts = array();
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
          $shifts[] = $row['code'];
        }
        $event->list_shifts = implode(',',$shifts);
      }
    }

    return $event->toArray();
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
