<?php

class DBConnector{
  private static $host = 'wrssnewcomers.com';
  private static $db = 'newcomer_epsclubs';
  private static $user = 'newcomer_eps';
  private static $pass = 'epsclubs';

  public static function connectMySQL(){
    $mysqli = new \mysqli(self::$host, self::$user, self::$pass, self::$db);
    if(mysqli_connect_errno()){
      throw new Exception('MysqliConnector','Connection failed: '.mysqli_connect_error());
    }
    return $mysqli;
  }
}
