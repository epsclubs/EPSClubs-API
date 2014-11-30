<?php
/**
* class DBConnector
*
* This is the database connector
*
* called by controllers
*
* @version development
* @author Ben Zhang
* @project EPSClubs-API
*/
class DBConnector{
  private static $host = 'wrssnewcomers.com';
  private static $db = 'newcomer_epsclubs';
  private static $user = 'newcomer_eps';
  private static $pass = 'epsclubs';

  /**
  * static function connectMySQL()
  *
  * returns a MySQL connect object (mysqli)
  *
  * @return mysqli
  */
  public static function connectMySQL(){
    $mysqli = new \mysqli(self::$host, self::$user, self::$pass, self::$db);
    if(mysqli_connect_errno()){
      throw new Exception('MysqliConnector','Connection failed: '.mysqli_connect_error());
    }
    return $mysqli;
  }
}
