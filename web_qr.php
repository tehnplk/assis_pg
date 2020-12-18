<?php
    
    require "db.php";
    require "lib.php";
  
    $token = empty($_GET['token'])?null:$_GET['token'];
    //$vn = '621204141114';
    $vn = getVn($objCon, $token);
    $hn = getHn($objCon, $token);

    mylog($objCon, $hn, 'qr', date('Y-m-d H:i:s'));
  
  
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

  <title>จอqr</title>
</head>

<body style="font-family:Anokotmai;background-color:#E0E0E0;">
  <div class="container" style="margin-top:10px">
    <div class="col-12">
      <div class="text-center">
        <img
          src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=<?=$vn?>"
          class="img-thumbnail">
          <div style="padding-bottom:5%"></div>
        <p style="font-size:1.3em;margin-tom:2%">ใช้สแกนก่อนวัดความดัน</p>
        <p style="font-size:1.3em;">หรือยื่นให้เจ้าหน้าที่ลงทะเบียน</p>
      </div>
    </div>

  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/vendor/jquery-slim.min.js"></script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="assets/js/docs.min.js"></script>

</body>

</html>