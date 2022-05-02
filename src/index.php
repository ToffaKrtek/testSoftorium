<?php
  define('ROOT', dirname(__FILE__));
  //require_once(ROOT. '/db/DB.php');
  require_once(ROOT . "/classes/User.php");
  require_once(ROOT . "/classes/Predict.php");


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

    <noscript>You need to enable JavaScript to run this app.</noscript><div id="root"></div>
    <script defer="defer" src="/main.js"></script>

  </body>

</html>
