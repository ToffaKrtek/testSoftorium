<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  include_once "main.php";
  require_once(ROOT . "/classes/User.php");
  if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $user = new User("", $user_id);
    $predicts = $user->ListPredicts();
    echo json_encode($predicts);
  }else {
    echo 0;
  }
