<?php
include 'config/config.php';
/**
 *
 */
class Database
{


  private $dbhost = DB_HOST;
  private $dbuser = DB_USER;
  private $dbpass = DB_PASS;
  private $dbname = DB_NAME;
  public $link;


  function __construct()
  {
      $this->Connect();
  }

  private function Connect()
  {
      $this->link = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
      if ($this->link->connect_error) {
        die("connection error");
      }
  }

     public function selectDB($sql){
      $result =  $this->link->query($sql);
        if ($result) {
            return $result;
        } else {
          return false;
        }
     }

}



 ?>
