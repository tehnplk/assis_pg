<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
//$hn = '000008403';
$hn = empty(getHn($objCon, $token)) ? null : getHn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'appoint', date('Y-m-d H:i:s'));

$sql = "SELECT
    o.nextdate,
    o.nexttime,
    c.NAME AS clinic_name,
    d.NAME AS doctor_name,
    o.app_cause 
  FROM
    oapp o
  
    LEFT OUTER JOIN clinic c ON o.clinic = c.clinic
    LEFT OUTER JOIN doctor d ON o.doctor = d.CODE 
  WHERE  o.hn = '$hn' AND nextdate > CURDATE()   ";
$result = mysqli_query($objCon, $sql);
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

        <title>จอนัด</title>
    </head>

    <body style="font-family:Anokotmai;background-color:#E0E0E0;">
        <div class="container" style="margin-top:10px">
            <div class="card-deck mb-3 text-center">
                <?php
                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <div style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">
                        <div style="text-align: center; width: 100%;height: 50px;">
                            <div style="padding-top: 15px">ไม่มีนัด</div>
                        </div>
                    </div>

                <?php } else if ($approved != 'yes') { ?>
                    <div style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">
                        <div style="text-align: center; width: 100%;height: 100px;">
                            <div style="padding-top: 15px">ยังไม่ได้อนุมัติให้เข้าใช้ระบบ</div>
                            <div style="padding-top: 15px">กรุณาติดต่อเจ้าหน้าที่</div>
                        </div>
                    </div>
                    <?php
                } else {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal"><?= DateThai($row["nextdate"]); ?>
                                </h4>
                            </div>

                            <div class="card-body">
                                <h1 class="card-title"><?= $row["clinic_name"]; ?>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li style="font-size:1.3em;">นัดเวลา <?= date('H:i', strtotime($row["nexttime"])); ?> น.</li>
                                    </li>
                                    <li style="font-size:1.3em;">แพทย์ผู้นัด <?= $row["doctor_name"]; ?>
                                    </li>
                                    <li style="font-size:1.3em;">เหตุที่นัด <?= $row["app_cause"]; ?>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <?php
                    }
                }
                mysqli_close($objCon);
                ?>

            </div>




        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/vendor/jquery-slim.min.js"></script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="assets/js/docs.min.js"></script>

    </body>

</html>