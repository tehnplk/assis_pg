
<?php
    
    require "db.php";
    require "lib.php";
  
    $token = empty($_GET['token'])?null:$_GET['token'];
    //$vn = '621215090215';
    $vn = getVn($objCon, $token);
    //$hn = '000094711';
    $hn = getHn($objCon, $token);
    mylog($objCon,$hn,'info',date('Y-m-d H:i:s'));
    //$dep = '010';
    $dep = getDep($objCon, $vn);
    $sql = "SELECT
    k.department,
    si.text1,
    si.text2,
    si.text3 
  FROM
    smart_assis_info si
    left join kskdepartment k on  k.depcode = si.dep
  WHERE
    dep = '$dep'";
  $result = mysqli_query($objCon, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
      <link rel="stylesheet" href="assets/css/docs.min.css" >
  
      <title>จอแนะนำบริการ</title>
    </head>
    <body style="font-family:Anokotmai;background-color:#E0E0E0;">
    <div class="container" style="margin-top:10px">
    <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <!-- <h5 class="card-title">คำแนะนำในการรับบริการ</h5> -->
        <p class="card-text" style="font-size:1.4em;font-family:Anokotmaibold">ขณะนี้คุณอยู่ที่ <?=$row['department'];?> กรุณาปฏิบัติามขั้นตอน ดังนี้</p>
        <p class="card-text" style="font-size:1.4em"><?=$row['text1'];?></p>
        <p class="card-text" style="font-size:1.4em"><?=$row['text2'];?></p>
        <p class="card-text" style="font-size:1.4em"><?=$row['text3'];?></p>
      </div>
    </div>
  </div>



      
  </div>

 

  </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="assets/js/vendor/jquery-slim.min.js"></script>
      <script src="assets/js/vendor/popper.min.js"></script>
      <script src="assets/js/docs.min.js" ></script>

    </body>
  </html>




