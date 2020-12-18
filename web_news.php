<?php
    
  require "db.php";
  require "lib.php";

  $token = empty($_GET['token'])?null:$_GET['token'];

  $hn = getHn($objCon, $token);
  mylog($objCon, $hn, 'star', date('Y-m-d H:i:s'));


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Material Design for Bootstrap fonts and icons -->
  <link rel="stylesheet" href="assets/webfont/anokotmai.css">

  <!-- Material Design for Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/docs.min.css">

  <title>จอข่าวสาร</title>
</head>

<body style="font-family:Anokotmai;background-color:#E0E0E0;">
  <div class="container" style="margin-top:10px">
    <div class="col-xs-12">
    <h1>news</h1>
    </div>
    
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/vendor/jquery-slim.min.js"></script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="assets/js/docs.min.js"></script>

</body>

</html>