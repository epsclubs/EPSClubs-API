<?php

class ClubController{
  private $_params;

  public function __construct($params)
  {
    $this->_params = $params;
  }

  public function createAction()
  {
    $club = new Club();
    $club->code = $this->_params['code'];
    $club->name = $this->_params['name'];
    $club->description = $this->_params['description'];
    // $club->list_execs = $this->_params['list_execs'];
    // $club->list_members = $this->_params['list_members'];

    $club->save();

    return $club->toArray();
  }

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

  public function upateAction()
  {
    // Update a club
  }

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
