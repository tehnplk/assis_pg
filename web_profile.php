<?php
require "db.php";
require "lib.php";

$token = empty($_GET['token']) ? null : $_GET['token'];
//$vn = '000008403';
$vn = getVn($objCon, $token);
$hn = getHn($objCon, $token);
$approved = getApproved($objCon, $token);
mylog($objCon, $hn, 'sit', date('Y-m-d H:i:s'));

$sql = "SELECT hn,cid,CONCAT(p.pname,p.fname,' ',p.lname) AS tname,
birthday,YEAR(CURDATE()) - YEAR(birthday) AS tage,bloodgrp
FROM patient p 
WHERE hn ='$hn'";
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

        <style>
            body{
                background:#DCDCDC;
                margin-top:20px;
            }
            .card-box {
                padding: 20px;
                border-radius: 3px;
                margin-bottom: 30px;
                background-color: #fff;
            }

            .social-links li a {
                border-radius: 50%;
                color: rgba(121, 121, 121, .8);
                display: inline-block;
                height: 30px;
                line-height: 27px;
                border: 2px solid rgba(121, 121, 121, .5);
                text-align: center;
                width: 30px
            }

            .social-links li a:hover {
                color: #797979;
                border: 2px solid #797979
            }
            .thumb-lg {
                height: 88px;
                width: 88px;
            }
            .img-thumbnail {
                padding: .25rem;
                background-color: #fff;
                border: 1px solid #dee2e6;
                border-radius: .25rem;
                max-width: 100%;
                height: auto;
            }
            .text-pink {
                color: #ff679b!important;
            }
            .btn-rounded {
                border-radius: 2em;
            }
            .text-muted {
                color: #98a6ad!important;
            }
            h4 {
                line-height: 22px;
                font-size: 18px;
            }
        </style>

        <title>จอดูสิทธิ์</title>
    </head>

    <body style="font-family:Anokotmai;background-color:#E0E0E0;">
        <div class="content">
            <div class="container">
<?php  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto"><img src="https://cdn1.iconfinder.com/data/icons/social-object-set-5-3/74/15-512.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                                <div style="margin-top:15px" class="">
                                    <h4><?= $row["tname"]; ?></h4>
                                    <p class="text-muted">HN : <?= $row["hn"]; ?> <span>| </span><span><a href="#" class="text-pink"> cid : <?= $row["cid"]; ?></a></span></p>
                                    <p class="text-muted">วันเกิด <?= $row["birthday"]; ?> </p>
                                    <p class="text-muted" style="margin-top:-10px">อายุ <?= $row["tage"]; ?> ปี </p>
                                    <p class="text-muted">หมู่เลือด <?= $row["bloodgrp"]; ?> </p>
                                    <p class="text-muted">สถานะ : <?= $approved =='yes' ? 'อนุมัติ':'ไม่อนุมัติ'; ?> </p>

                                </div>
                               
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
<?php } ?>
                <!-- end row -->
            </div>
            <!-- container -->
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/vendor/jquery-slim.min.js"></script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="assets/js/docs.min.js"></script>

    </body>

</html>