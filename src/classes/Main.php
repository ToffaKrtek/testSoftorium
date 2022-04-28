<?php
include_once('DB.php');
 /**
 *
 */
abstract class Main
{
  protected $db;
  protected $table_name;
  protected $user_id;
  public function __construct()
  {
    $dbClass = new DB();
    $this->db = $dbClass->getConnect();
  }

  public function Exec($sql)
  {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll();

			// return
			return $data;
  }
  public function getByUserId()
  {
    $sql = "SELECT * FROM $this->table_name WHERE user_id=$this->user_id;";
    return $this->Exec($sql);
  }
  public function GetAll()
  {
    $sql = "SELECT * FROM `$this->table_name`;";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();

    // return
    return $data;
  }

}
