<?php
  define('ROOT', dirname(__FILE__));
  //require_once(ROOT. '/db/DB.php');
  require_once(ROOT . "/classes/User.php");
  require_once(ROOT . "/classes/Predict.php");
  session_start();
  $values = "Задать вопрос";
  if(isset($_POST['question'])){
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'][0];
      $user = new User("", $user_id);

    }
    $newPredict = $user->MakePredict($_POST['question']);
    if($newPredict != null){
      ?>
        <script >alert("<?= $newPredict;?>")</script>
      <?php
    }
  }
  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'][0];
    $user = new User("", $user_id);
    $predict_class = new Predict();
    $predicts = $predict_class->GetQuestionAndCount();
  }else{
    $values = "Создать пользователя";
  }

  if(isset($_POST['name'])){
    $user = new User($_POST['name']);
    $user_id = $user->GetId();
    $_SESSION['user_id'] = $user_id;
    $values = "Задать вопрос";

  }

?>
<!DOCTYPE html>
<html>
<style>
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  text-align: center;
}
</style>
<head>
  <meta charset="utf-8" />
  <title>HTML5</title>
  <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
  <div class="center">
  <h1><?=$values;?></h1>
  <?php
    if(!isset($_SESSION['user_id'])){
   ?>
   <p><?= $values;?> </p>
      <form method="post"> <input type="text" name="name" value=""><input type="submit"></form>
  <?php
    }else{
     ?>
      <p><?= $values;?> </p>
       <form method="post"> <input type="text" name="question" value=""><input type="submit"></form>
<?php
    if(count($predicts) > 0){
      foreach ($predicts as  $predict) {
       ?><p><b>Вопрос: </b> <?= $predict['question'];?> ----- <small>Был задан  <?= $predict['count'];?> раз </small></p>
      <?php
    }
}
}
   ?>
</div>
</body>

</html>
