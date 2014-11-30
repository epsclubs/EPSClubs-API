<?php
/**
* class ClubController
*
* This is a controller for the Club object.
*
* called using controller 'ClubController'
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class ClubController{
  /**
  * Parameters passed to the controller
  *
  * @access private
  * @var array
  */
  private $_params;

  /**
  * Constructor for ClubController, sets up _params
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
  * sets up Club object (database)
  *
  * @param string $params['username']
  * @param string $params['userpass']
  * @param string $params['code']
  * @param string $params['name']
  * @param string $params['description']
  *
  * @return array of the Club object
  *
  * @todo username and password auth, permission
  */
  public function createAction()
  {
    $club = new Club();
    $club->code = $this->_params['code'];
    $club->name = $this->_params['name'];
    $club->description = $this->_params['description'];
    // $club->list_execs = $this->_params['list_execs'];
    // $club->list_members = $this->_params['list_members'];

    $club->save(/*username and userpass*/);

    return $club->toArray();
  }

  /**
  * function readAction()
  *
  * called using action 'read'
  *
  * reads a Club object from database
  *
  * @param string $params['code']
  * @param string optional $params['scope'] = [list_execs][,list_members][,list_events]
  *
  * @return array of the Club object
  */
  public function readAction()
  {
    if(isset($this->_params['code'])){
      $club_code = $this->_params['code'];
      $mysqli = DBConnector::connectMySQL();

      // Basic Info
      if(!($result = $mysqli->query("SELECT * FROM `clubs` WHERE code='$club_code'"))){
        throw new Exception('Failed to read club: ['.$mysqli->errno.'] '.$mysqli->error);
      }
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if(!$row['code']) throw new Exception('Failed to read club: Club with code "'.$this->_params['code'].'" cannot be found.');
      $club = new Club();
      $club->code = $row['code'];
      $club->name = $row['name'];
      $club->description = $row['description'];

      // Extra scope info: list_execs, list_members, list_events
      if(isset($this->_params['scope'])){
        $scope = explode(',',$this->_params['scope']);
        if(in_array('list_execs',$scope)){
          if(!($result = $mysqli->query("SELECT user_student_number FROM `club_user` WHERE club_code='$club_code' AND user_role='0'"))){
            throw new Exception('Failed to read executive list: ['.$mysqli->errno.'] '.$mysqli->error);
          }
          $execs = array();
          while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $execs[] = $row['user_student_number'];
          }
          $club->list_execs = implode(',',$execs);
        }
        if(in_array('list_members',$scope)){
          if(!($result = $mysqli->query("SELECT user_student_number FROM `club_user` WHERE club_code='$club_code' AND user_role='1'"))){
            throw new Exception('Failed to read member list: ['.$mysqli->errno.'] '.$mysqli->error);
          }
          $members = array();
          while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $members[] = $row['user_student_number'];
          }
          $club->list_members = implode(',',$members);
        }
        if(in_array('list_events',$scope)){
          if(!($result = $mysqli->query("SELECT event_code FROM `club_event` WHERE club_code='$club_code'"))){
            throw new Exception('Failed to read event list: ['.$mysqli->errno.'] '.$mysqli->error);
          }
          $events = array();
          while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $events[] = $row['club_event'];
          }
          $club->list_events = implode(',',$events);
        }
      }

      return $club->toArray();
    }else{
      throw new Exception('No \'code\' parameter passed for read event function');
    }
  }

  /**
  * function updateAction()
  *
  * called using action 'update'
  *
  * updates a Club object in database
  *
  * @param string $params['username']
  * @param string $params['userpass']
  * @param string $params['code']
  * @param string optional $params['name']
  * @param string optional $params['description']
  *
  * @param string optional $params['user_student_number']
  * @param string optional $params['user_role']
  *
  * @return array of the Club object
  *
  * @todo everything
  */
  public function updateAction()
  {
    if(isset($this->_params['code'])){
      // Getting data from DB
      $clubArr = $this->readAction();
      $club = new Club();
      $club->code = $clubArr['code'];
      $club->name = $clubArr['name'];
      $club->description = $clubArr['description'];

      // Updating info
      if(isset($this->_params['name'])){
        $club->name = $this->_params['name'];
      }

      if(isset($this->_params['description'])){
        $club->description = $this->_params['description'];
      }

      $club->save(/*username and userpass*/true);

      return $club->toArray();
    }else{
      throw new Exception('No \'code\' parameter passed for update event function');
    }
  }

  /**
  * function deleteAction()
  *
  * called using action 'delete'
  *
  * deletes a Club object in database
  *
  * @param string $params['username']
  * @param string $params['userpass']
  * @param string $params['code']
  *
  * @return bool
  *
  * @todo username and password auth
  */
  public function deleteAction()
  {
    if(isset($this->_params['code'])){
      $club_code = $this->_params['code'];
      $mysqli = DBConnector::connectMySQL();
      if(!($result = $mysqli->query("DELETE FROM `clubs` WHERE code='$club_code'"))){
        throw new Exception('Failed to delete club: ['.$mysqli->errno.'] '.$mysqli->error);
      }
      return true;
    }
  }
}
