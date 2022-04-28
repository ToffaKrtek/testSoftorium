<?php
  include_once "main.php";
  require_once(ROOT . "/classes/User.php");
  /**
   *
   */
   if(isset($_POST['name'])){
     $user = new User($_POST['name']);
     $user_id = $user->GetId();
     $_SESSION['user_id'] = $user_id;
     echo json_encode(['user_id' => $user_id, 'name' => $_POST['name']]);
   }else {
     echo 0;
   }
