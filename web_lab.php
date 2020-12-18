<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
////$vn = '630103081519';
$hn = empty(getHn($objCon, $token)) ? null : getHn($objCon, $token);
$vn = empty(getVn($objCon, $token)) ? null : getVn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'lab', date('Y-m-d H:i:s'));

//    $sql = "SELECT
//    li.lab_items_name
//   FROM
//       ovst_queue_server ql
//       inner JOIN lab_head l ON ql.vn = l.vn 
//       left join lab_order lo on lo.lab_order_number = l.lab_order_number
//       left join lab_items li on li.lab_items_code = lo.lab_items_code
//   WHERE
//       ql.vn = '$vn' and ql.date_visit = curdate()";
$sql = "SELECT i.lab_items_name,if(confirm_report = 'Y','ผลออกแล้ว','รอผล') as t1
    FROM lab_head h 
    LEFT JOIN lab_order o ON o.lab_order_number = h.lab_order_number
    LEFT JOIN lab_items i ON i.lab_items_code = o.lab_items_code
    WHERE vn='$vn'";

$result = mysqli_query($objCon, $sql);
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/style.css">
        <link rel="stylesheet" href="assets/webfont/anokotmai.css">

        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/docs.min.css" >
        <style>
            .col-md-5 {
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 5px;
                padding-left: 5px;
                padding-top: 5px;
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
            .bg-confirm{
                background: linear-gradient(90deg, rgba(255,255,255,1) 42%, rgba(0,212,255,1) 100%);
            }
        </style>
        <title>จอแล็ป</title>
    </head>

    <body style="font-family:Anokotmai;background-color:#E0E0E0;">

        <div class="container">
            <div class="row" style="margin-top:10px;">
                <span  style="margin-left:15px"><div style="background-color: #1FA363;border-radius: 10px;color: white;font-size: 16px;font-weight: normal;width:20px;height:20px"></div></span> <span style="margin-left:5px"> ผลออกแล้ว</span>
                <span style="margin-left:10px"><div style="background-color: #FD6D48;border-radius: 10px;color: white;font-size: 16px;font-weight: normal;width:20px;height:20px"></div></span> <span style="margin-left:5px"> รอผล</span>
            </div>
            <div class="row" style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">

                <?php if ($vn == '') { ?>
                    <div style="text-align: center; width: 100%;height: 50px;">
                        <div style="margin-top: 15px">วันนี้ท่านไม่ได้เข้ารับบริการ </div>
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
                    $row_num = mysqli_num_rows($result);
                    if ($row_num > 0) {
                        ?>
                        <table class="table">
                            <thead >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"  style="text-align: left;font-size: 20px;">รายการตรวจ</th>
                                    <th scope="col"  style="text-align: cente;font-size: 20px;">ผล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $result_color = $row['t1'] == 'รอผล' ? '#FF4500' : '#C7EA46';
                                    ?>
                                    <tr>
                                        <th scope="row"  style="font-size: 20px;font-weight: normal"><?= $i ?></th>
                                        <td style="font-size: 20px;font-weight: normal"><?= $row['lab_items_name']; ?></td>
                                        <td style="font-size: 20px;text-align: right"><div style="background-color: <?= $result_color ?>;border-radius: 10px;color: white;font-size: 16px;font-weight: normal;width:20px;height:20px"></div></td>

                                    </tr>


                                    <?php
                                    $i++;
                                }
                                ?>                     
                                <?php
                                mysqli_close($objCon);
                                ?>


                            </tbody>
                        </table>
    <?php }
} ?>






            </div>


        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="dist/js/jquery-slim.min.js"></script>
        <script src="dist/js/popper.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    </body>

</html>