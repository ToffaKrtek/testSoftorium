<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  include_once "main.php";
  require_once(ROOT . "/classes/User.php");
  /**
   *
   */
  $body = file_get_contents('php://input');
  $_POST = json_decode($body, true);
  if(isset($_POST['name'])){
     $user = new User($_POST['name']);
     $user_id = $user->GetId();
     $_SESSION['user_id'] = $user_id;

     echo json_encode(['user_id' => $user_id, 'name' => $_POST['name']]);
  }else {
     echo 0;
  }
