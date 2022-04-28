<?php
  include_once "main.php";
  require_once(ROOT . "/classes/User.php");
  require_once(ROOT . "/classes/Predict.php");
  /**
   *
   */
   if(isset($_POST['question'])){
     if(isset($_POST['user_id'])){
       $user_id = $_POST['user_id'];
       $user = new User("", $user_id);
       $newPredict = $user->MakePredict($_POST['question']);
       if($newPredict != null){
           echo json_encode(['answer' => $newPredict]);
       }
     }else {
       echo 0;
     }
  }else {
    echo 0;
  }
