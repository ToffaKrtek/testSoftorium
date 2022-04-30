<?php
  define('ROOT', dirname(__FILE__));
  //require_once(ROOT. '/db/DB.php');
  require_once(ROOT . "/classes/User.php");
  require_once(ROOT . "/classes/Predict.php");
  session_start();
  $values = "Задать вопрос";
  print_r($_SESSION);
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
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Шар предсказаний</title>

  <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

<div id="reacter" data-user="<?php echo $user_id ? $user_id : 'null'; ?>"></div>
<noscript>You need to enable JavaScript to run this app.</noscript><div id="root"></div>
<script defer="defer" src="/main.js"></script>

</body>

</html>
