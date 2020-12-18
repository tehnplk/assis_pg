<?php
require "db.php";
require "lib.php";
$token = empty($_GET['token']) ? null : $_GET['token'];
$hn = getHn($objCon, $token);

mylog($objCon, $hn, 'media', date('Y-m-d H:i:s'));
$sql = "SELECT * FROM smart_assis_media";

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

        <title>จอมีเดีย </title>
        <style>
            .col-md-5 {
                position: relative;
                width: 40%;
                min-height: 1px;
                padding-right: 5px;
                padding-left: 5px;
                padding-top: 5px;
            }
            .col-md-7 {
                position: relative;
                width: 60%;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }
        </style>
    </head>

    <body style="font-family:Anokotmai;background-color:#E0E0E0;">
        <div class="container" style="margin-top:10px">
            <div class="col-xs-12" >
                <h2>สื่อความรู้</h2>
            </div>
            <?php
            if (mysqli_num_rows($result) == 0) {
                ?>
                <div style="background-color:white;margin-left: 0px;margin-right: 2px;border-radius: 7px;margin-top: 5px;margin-bottom: 20px;">
                    <div style="text-align: center; width: 100%;height: 50px;">
                        <div style="padding-top: 15px">ไม่มีสื่อความรู้</div>
                    </div>
                </div>


                <?php
            } else {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <div class="row" style="background-color:white;margin-top: 5px">
                        <div class="row" style="background-color:white;">
                            <div class="col-md-5 ">
                                <iframe width="100%" height="100" 
                                        src="<?= $row["url_youtube"] ?>" 
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                                </iframe>
                            </div>
                            <div class="col-md-7 ">
                                <p style="font-size: 12px;margin-top: 10px;font-weight: 100px"><?= $row["topic"] ?></p>
                                <p style="font-size: 11px;margin-top: -10px;color: #818a91">โพสเมื่อ <?= $row["post_date"] ?></p>
                                <button onclick="window.location.href = '<?= $row["url_youtube"] ?>';" style="margin-top:-10px" type="button" class="btn btn-outline-danger btn-sm">ดูรายการ</button>
                            </div>

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