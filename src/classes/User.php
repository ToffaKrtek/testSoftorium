<?php
  require_once('Main.php');
  /**
   *
   */
  class User extends Main
  {
    string $name;
    int $id;
    public $table_name = "users";
    public function __construct($name)
    {
      parent::__construct();
      $this->name = $name;
      if(){}
    }

    protected function CheckName()
    {
      $sql = "SELECT * FROM $this->table_name WHERE user_name='$this->name';";
      $result = $this->Exec($sql);
      if(isset($result[0]['user_id'])){
        return $result[0]['user_id'];
      }
      return $this->CreateUser();
    }
    protected function CreateUser()
    {
      $sql = "INSERT INTO $this->table_name (user_name) VALUES('$this->name'); SELECT LAST_INSERT_ID();";
      $result = $this->Exec($sql);
      return $result[0][0];
    }
  }

 ?>
