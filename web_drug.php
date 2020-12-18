
<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
//$vn = '621204141114';
$hn = getHn($objCon, $token);
$vn = getVn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'drug', date('Y-m-d H:i:s'));

$sql = "SELECT
	n.name , CONCAT(d.name1,' ',d.name2,' ',d.name3) drugusage,n.therapeutic,o.qty,n.units
FROM
	opitemrece o
INNER JOIN drugitems n ON n.icode = o.icode
LEFT JOIN drugusage d on d.drugusage = n.drugusage
WHERE
vn = '$vn'
ORDER BY
	o.icode";
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
        <style>
            .col-md-5 {
                position: relative;
                width: 15%;
                min-height: 1px;
                padding-right: 5px;
                padding-left: 5px;
                padding-top: 5px;
            }
            .col-md-7 {
                position: relative;
                width: 85%;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }
            .img-drug {
                display: block;
                margin-left: auto;
                margin-right: auto 
            }
            p {
                margin-top: 0;
                margin-bottom: 0.2rem;
            }
            .col-md-9 {
                position: relative;
                width: 70%;
                min-height: 1px;
                padding-right: 0px;
                padding-left: 0px;
            }
            .col-md-12 {
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 0px;
                padding-left: 0px;
            }
            .col-3 {
                text-align: right;
                padding-right: 5px;
                padding-left: 0px;
            }
        </style>

        <title>จอรายการยา</title>
    </head>
    <body style="font-family:Anokotmai;background-color:#E0E0E0;">



        <?php if ($vn == '') { ?>
            <div style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">
                <div style="text-align: center; width: 100%;height: 50px;">
                    <div style="padding-top: 15px">วันนี้ท่านไม่ได้เข้ารับบริการ</div>
                </div>
            </div>
        <?php } else if ($approved != 'yes') { ?>
            <div style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">
                <div style="text-align: center; width: 100%;height: 100px;">
                    <div style="padding-top: 15px">ยังไม่ได้อนุมัติให้เข้าใช้ระบบ</div>
                    <div style="padding-top: 15px">กรุณาติดต่อเจ้าหน้าที่</div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container" style="margin-top:10px">
                <div class="col-xs-12" >
                    <h5>รายการยาที่ได้รับ</h5>
                    <p style="font-size: 13px;margin-top: 0px;color: #818a91" >วันที่ <?= date('Y-m-d H:i:s') ?></p>
                </div>





                <ul class="list-group bmd-list-group-sm">
                    <?php
                    $result = mysqli_query($objCon, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <div class="row" style="background-color:white;margin-left: 2px;margin-right: 2px;border-radius: 7px;margin-top: 5px">
                            <div class="col-md-5 align-items-center " style="text-align: center">

                                <img src="assets/new/drug2.png" width="40" height="40" class="img-drug">

                            </div>
                            <div class="col-md-7 ">
                                <div class="row">
                                    <div class="col-9">
                                        <span style="font-size: 12px;margin-top: 5px;font-weight: 100px"><?= $count . '. ' . $row['name']; ?></span>

                                    </div>
                                    <div class="col-3">
                                        <span style="font-size: 10px"><?= $row['qty']; ?> <?= $row['units']; ?></span>
                                    </div>
                                </div>

                                <p style="font-size: 11px;margin-top: 0px;color: #818a91"><?= $row['therapeutic']; ?></p>
                                <p style="font-size: 11px;margin-top: 0px;color: #818a91"><?= $row['drugusage']; ?></p>
                            </div>

                        </div>
                        <?php
                        $count++;
                    }
                    mysqli_close($objCon);
                    ?>
                </ul>




            </div>
        <?php } ?>
        <!-- <div class="fixed-bottom text-center" style="background-color:whitesmoke;height:7%">
             <div class="float-left" style="margin-top:3%">โรงพยาบาลปากชม</div>
             <div style="margin-top: 3%;margin-right:25%">©SmartQueue</div>
             <div class="float-right" style="margin-top: -6%;">date('Y-m-d'); ?></div>
           </div> -->


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/vendor/jquery-slim.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/docs.min.js" ></script>

</body>
</html>

