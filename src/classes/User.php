<?php
  require_once('Main.php');

  require_once(ROOT . "/classes/Predict.php");
  /**
   *
   */
  class User extends Main
  {
    public $table_name = "users";
    public function __construct($name, $id=null)
    {
      parent::__construct();
      if($id != null){
        $this->id = $id;
        $this->name = $this->NameById();
      }else {
        $this->name = $name;
        $this->id = $this->CheckName();
      }

    }

    protected function CheckName()
    {
      $sql = "SELECT * FROM `$this->table_name` WHERE name='$this->name';";
      $result = $this->Exec($sql);
      if(!isset($result['user_id'])){
        $result = $this->CreateUser();
      }
      return $result[0];
    }
    protected function CreateUser()
    {
      $sql = "INSERT INTO `$this->table_name`(`name`) VALUES( '$this->name' );";
      $result = $this->Exec($sql);
      $sql = "SELECT LAST_INSERT_ID();";
      $result = $this->Exec($sql);
      return $result[0];
    }

    protected function NameById()
    {
      $sql = "SELECT `name` FROM `$this->table_name` WHERE id='$this->id';";
      $result = $this->Exec($sql);
      return $result['id'];
    }

    public function MakePredict($question)
    {
      $predict = new Predict();
      $result = $predict->AddPredict($question, $this->id);
      return $result;
    }
    public function GetId()
    {
      return $this->id;
    }
    public function ListPredicts()
    {
      $predict_class = new Predict();
      $predicts = $predict_class->GetQuestionAndCount();
      return $predicts;
    }
  }

 ?>
