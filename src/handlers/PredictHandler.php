<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  include_once "main.php";
  require_once(ROOT . "/classes/User.php");
  /**
   *
   */

   if(isset($_GET['question'])){
     if(isset($_GET['user_id'])){
       $user_id = $_GET['user_id'];
       $user = new User("", $user_id);
       $newPredict = $user->MakePredict($_GET['question']);
       if($newPredict != null){
           echo json_encode(['answer' => $newPredict]);
       }
     }else {
       echo 0;
     }
  }else {
    echo 1;
  }
