<?php
  /**
   *
   */
  class DB
  {
    private $db;
    public function __construct()
    {
      try {
      $paramsPath = ROOT.'/config.php';
      $params = include($paramsPath);
      $this->db = new PDO($params['dsn'], $params['user'], $params['pass']);
      } catch(PDOException $e){
            echo $e->getMessage();
      }
    }
    public function getConnect(){
      if ($this->db instanceof PDO) {
            return $this->db;
      }
    }
}
 ?>
