<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="HR Promote">
        <meta name="author" content="Phanupong Dongyen">

        <meta name="theme-color" content="#ffffff">
        <!-- Material Design for Bootstrap fonts and icons -->
        <link rel="stylesheet" href="../assets/webfont/anokotmai.css">
        
        <link rel="stylesheet" href="../dist/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="../dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../dist/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../dist/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../dist/plugins/summernote/summernote-bs4.css">

        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/docs.css">
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <title>ระบบหลังบ้าน Smart Assis</title>
        <style>
       

        </style>
    </head>
    <?php
    require "../db.php";


    $sql = "SELECT cid,hn,CONCAT(pname,fname,' ',lname) AS tname,sex,approved,token FROM smart_assis_client";
    ?>

    <body style="font-family: 'Anokotmai', sans-serif;">

        <header>

            <div class="navbar navbar-dark bg-dark box-shadow" style="margin-top:'">
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <img src="../assets/img/nurse.png" height="40" width="40" alt="">
                        <strong style="margin-left:10px">Smart Assis Backend</strong>
                    </a>

                </div>
            </div>
        </header>

        <main role="main" style="margin-top:30px">

            <div class="container">
                <table class="table table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"  style="text-align: left;font-size: 19px;">cid</th>
                            <th scope="col"   style="text-align: left;font-size: 19px;">hn</th>
                            <th scope="col"   style="text-align: left;font-size: 19px;">ชื่อ-สกุล</th>
                            <th scope="col"   style="text-align: left;font-size: 19px;">เพศ</th>
                            <th scope="col"   style="text-align: left;font-size: 19px;">approved</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = mysqli_query($objCon, $sql);
                        $i = 1;
                        $total_price = 0;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $tcheck  =  $row['approved'] == 'yes' ? 'checked' : '';
                            $tid = "myCheck" + $i;
                            ?>


                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td ><?= $row['cid']; ?></td>
                                <td><?= $row['hn']; ?></td>
                                <td ><?= $row['tname']; ?></td>
                                <td ><?= $row['sex'] == 1 ? 'ชาย' : 'หญิง'; ?></td>
                                <td >
                                 <div class="icheck-primary d-inline">
                                      <!--<input type="checkbox" id="myCheck" onclick="myFunction(<?=$row['cid']?>,<?=$tid?>)"  <?=$tcheck?> >-->
                                    <input type="checkbox" id="<?=$tid?>" onclick="myFunction(<?=$row['cid']?>,<?=$tid?>)" <?=$tcheck?>>
                                    <label for="<?=$tid?>">
                                   </label>
                                  </div>
                                    
                                    <?=$row['approved']; ?>
                                </td>

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


        </main>

        <footer class="text-muted">
            <div class="container fixed-bottom">

                <p>Smart Assis &copy;2019 Smart Queue</p>

            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../assets/js/vendor/popper.min.js"></script>
        <script src="../assets/js/docs.min.js"></script>
        <script>
            $(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });
            
            function myFunction(cid,id) {
  // Get the checkbox
            var tapprove = 'no'
            var checkBox = document.getElementById(id);
             console.log(cid)
             console.log(checkBox.checked)
            

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
              tapprove  = "yes"
            } else {
               tapprove  = "no"
            }
            
            $.ajax({
                type: 'POST', url: 'post_approve.php', dataType: 'json',
                    data: {
                        cid: cid, 
			approved: tapprove
                    }, success: function(se) {
                        window.location ="approved.php"        
                     },err(){
                        console.log('ddd');
                }
            }); 
            
            
            
  
	
            
          }
        </script>
    </body>

</html>