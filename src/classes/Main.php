<?php
include_once('DB.php');
 /**
 *
 */
abstract class Main
{
  $db;
  $table_name;
  $user_id;
  public function __construct()
  {
    $this->db = new DB();
  }

  public function Exec($sql)
  {
    try {
      $dbc = $this->db->getConnect();
      $result = $dbc->query($sql);
    }  catch( Exception $e) {
               print_r($e);
               return $e;
    }
    return $result->fetchAll();
  }
  public function getByUserId()
  {
    $sql = "SELECT * FROM $this->table_name WHERE user_id=$this->user_id;";
    return $this->Exec($sql);
  }
}
