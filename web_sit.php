<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
//$vn = '630203081254';
$vn = getVn($objCon, $token);
$hn = getHn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'sit', date('Y-m-d H:i:s'));

$sql = "select p.name ,v.pttypeno,v.pttype_begin,v.pttype_expire

  from vn_stat v
  left outer join pttype p on p.pttype = v.pttype
  
  where v.vn = '$vn'";
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/docs.min.css">

        <title>จอดูสิทธิ์</title>
    </head>

    <body style="font-family:Anokotmai;background-color:#E0E0E0;">
        <div class="container" style="margin-top:10px">
            <div class="card-deck mb-3 text-center">
                <?php if ($vn == '') { ?>
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">วันนี้ท่านไม่ได้เข้ารับบริการ
                            </h4>
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
                                <h4 class="my-0 font-weight-normal"><i class="fa fa-check-square-o" style="color:green" ></i> <?= $row["name"]; ?>
                                </h4>
                            </div>

                            <div class="card-body">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li style="font-size:1.3em;">เลขที่สิทธิ์ <?= $row["pttypeno"]; ?></li>
                                    <li style="font-size:1.3em;">วันเริ่มใช้ <?= DateThai($row["pttype_begin"]); ?>
                                    </li>
                                    <li style="font-size:1.3em;">วันหมดอายุ <?= DateThai($row["pttype_expire"]); ?>
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