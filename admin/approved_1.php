
<?php
require "../db.php";


$sql = "SELECT cid,hn,CONCAT(pname,fname,' ',lname) AS tname,sex,approved FROM smart_assis_client";
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



        <div class="container" style="margin-top:10px">

            <div class="row" style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 100px;">

                <table class="table">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"  style="text-align: left;font-size: 19px;">cid</th>
                            <th scope="col"   style="text-align: right;font-size: 19px;">hn</th>
                            <th scope="col"   style="text-align: right;font-size: 19px;">ชื่อ-สกุล</th>
                            <th scope="col"   style="text-align: right;font-size: 19px;">เพศ</th>
                            <th scope="col"   style="text-align: right;font-size: 19px;">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($objCon, $sql);
                        $i = 1;
                        $total_price = 0;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                           
                            ?>


                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td style="font-size: 17px;font-weight: normal"><?= $row['cid']; ?></td>
                                <td style="font-size: 17px;text-align: right"><?= $row['hn']; ?></td>
                                <td style="font-size: 17px;font-weight: normal"><?= $row['tname']; ?></td>
                                <td style="font-size: 17px;text-align: right"><?= $row['sex'] == 1 ? 'ชาย' : 'หญิง'; ?></td>
                                <td style="font-size: 17px;font-weight: normal"><?= $row['approved']; ?></td>

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

            </div>



        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/vendor/jquery-slim.min.js"></script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="assets/js/docs.min.js" ></script>

    </body>
</html>

