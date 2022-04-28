<?php
  include_once "main.php";
  require_once(ROOT . "/classes/Predict.php");

  if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $user = new User("", $user_id);
    $predicts = $user->ListPredicts();
    echo json_encode($predicts);
  }else {
    echo 0;
  }
