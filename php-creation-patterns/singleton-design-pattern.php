<?php
// PHP Singleton OOP Design Pattern
class DatabaseSingleton
{
  private static $connection = null;
  private function __construct()
  {
  }
  public static function get_instance()
  {
    if (self::$connection == null) {
      try {
        $host = "";
        $db = "";
        $user = "";
        $pass = "";
        $connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      } catch (PDOException $pe) {
        throw new Exception("Error :" . $pe->getMessage());
      }
    }
    return self::$connection;
  }
}
$conn = DatabaseSingleton::get_instance();
