<?php
/**
* class Club
*
* This is a model of the Club object.
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class Club
{
  /**
  * Club Code
  * Ex: EPS_PROGRAMMING
  * @access public
  * @var string
  */
  public $code;
  /**
  * Club Name
  * Ex: Elgin Park Computer Programming Club
  * @access public
  * @var string
  */
  public $name;
  /**
  * Club Description
  * Ex: Elgin Park Computer Programming Club is a club where people learn about programming.
  * @access public
  * @var string
  */
  public $description;
  /**
  * List of Club Executives (Student Numbers)
  * Ex: 1111111,1111112,9012934
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_execs;
  /**
  * List of Club Members (Student Numbers)
  * Ex: 1111111,1111112,9012934
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_members;
  /**
  * List of Club Events (Event Codes)
  * Ex: EPS_PROGRAMMING_EVENT1,EPS_PROGRAMMING_EVENT2
  * @access public
  * @var comma-separated string (can be converted to array with explode(',',$arr))
  */
  public $list_events;

  /**
  * function save()
  *
  * This is a function that saves the Club object into the database.
  *
  * @param string $username
  * @param string $userpass
  * @return array for the Club object
  *
  * @todo username and userpass params for authentication
  */
  public function save(/* username and userpass*/)
  {
    if(isset($this->code) && isset($this->name)){
      $mysqli = DBConnector::connectMySQL();
      if(!($result = $mysqli->query("INSERT INTO clubs (code,name,description) VALUES('$this->code','$this->name','$this->description')"))){
        throw new Exception('Failed to save club: ['.$mysqli->errno.'] '.$mysqli->error);
      }
      return $this->toArray();
    }
  }

  /**
  * function toArray()
  *
  * This is a function that converts the Club object into an array.
  *
  * @return array for the Club object
  */
  public function toArray()
  {
    return array(
      'code' => $this->code,
      'name' => $this->name,
      'description' => $this->description,
      'list_execs' => $this->list_execs,
      'list_members' => $this->list_members,
      'list_events' => $this->list_events
    );
  }
}
