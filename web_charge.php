
<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
//$vn = '621206090112';
$hn = empty(getHn($objCon, $token)) ? null : getHn($objCon, $token);
$vn = empty(getVn($objCon, $token)) ? null : getVn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'charge', date('Y-m-d H:i:s'));

$sql = "SELECT if(n.name is null or n.name = '', d.name,n.name) name,o.sum_price from opitemrece o
    LEFT JOIN nondrugitems n on n.icode = o.icode
		left join drugitems d on d.icode = o.icode
    where vn = '$vn' and o.sum_price <> '0' ORDER BY o.icode";
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
                width: 20%;
                min-height: 1px;
                padding-right: 5px;
                padding-left: 5px;
                padding-top: 5px;
            }
            .col-md-7 {
                position: relative;
                width: 80%;
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
            .container {
                width: 100%;
                padding-right: 10px;
                padding-left: 10px;
                margin-right: auto;
                margin-left: auto;
            }
            .tfooter {
                position: fixed;
                height: 50px;
                background-color: #71B500;
                bottom: 0px;
                left: 0px;
                right: 0px;
                margin-bottom: 0px;
                text-align: center;
                font-size: 16px;
            }
        </style>

        <title>จอค่าใช้จ่าย</title>
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

                <div class="row" style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 100px;">

                    <table class="table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"  style="text-align: left;font-size: 19px;">รายการ</th>
                                <th scope="col"   style="text-align: right;font-size: 19px;">ราคา(บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($objCon, $sql);
                            $i = 1;
                            $total_price = 0;
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $total_price = $total_price + $row['sum_price'];
                                ?>


                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td style="font-size: 17px;font-weight: normal"><?= $row['name']; ?></td>
                                    <td style="font-size: 17px;text-align: right"><?= number_format($row['sum_price'], 2); ?></td>

                                </tr>


                                <!--  <a class="list-group-item">
                                    <div class="bmd-list-group-col">
                                      <p class="list-group-item-heading"><?= number_format($row['name'], 2); ?></p>
                                      <p class="list-group-item-text"></p>
                                    </div>
                                  </a>-->
                                <?php
                                $i++;
                            }
                            ?>

    <!--                        <tr>
                                <th scope="row"></th>
                                <td style="font-size: 14px;text-align: right">รวมค่าใช้จ่ายทั้งหมด</td>
                                <td style="font-size: 12px;text-align: right"><?= number_format($total_price, 2); ?></td>

                            </tr>-->

                            <?php
                            mysqli_close($objCon);
                            ?>


                        </tbody>
                    </table>

                </div>

                <div class="tfooter">
                    <div style="margin-top: 11px">รวมค่าใช้จ่ายทั้งหมด <?= number_format($total_price, 2); ?> บาท </div>
                </div>


            </div>

        <?php } ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/vendor/jquery-slim.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/docs.min.js" ></script>

</body>
</html>

