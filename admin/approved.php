<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Smart Assis</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
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
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <?php
    require "../db.php";


    $sql = "SELECT cid,hn,CONCAT(pname,fname,' ',lname) AS tname,sex,approved,token,dupdate FROM smart_assis_client";
    ?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">

                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>

                            <div class="dropdown-divider"></div>

                            <div class="dropdown-divider"></div>

                        </div>
                    </li>


                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="../assets/img/nurse.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Smart Assis Backend</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Admin</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a href="approved.php" class="nav-link">
                                    <i class="nav-icon fas  fa-address-card"></i>
                                    <p>
                                        Approve
                                        <!--<span class="right badge badge-danger">New</span>-->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="media.php" class="nav-link">
                                    <i class="nav-icon fas  fa-caret-square-right"></i>
                                    <p>
                                        สื่อความรู้
                                        <!--<span class="right badge badge-danger">New</span>-->
                                    </p>
                                </a>
                            </li>
                            <hr />
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">
                                    <i class="nav-icon fas  fa-caret-square-right"></i>
                                    <p>
                                        ออกจากระบบ
                                        <!--<span class="right badge badge-danger">New</span>-->
                                    </p>
                                </a>
                            </li>







                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Approve</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">รายชื่อผมขอใช้ App Smart Assis</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-hover ">
                                    <thead class="thead-ligth">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"  style="text-align: left;font-size: 19px;">cid</th>
                                            <th scope="col"   style="text-align: left;font-size: 19px;">hn</th>
                                            <th scope="col"   style="text-align: left;font-size: 19px;">ชื่อ-สกุล</th>
                                            <th scope="col"   style="text-align: left;font-size: 19px;">เพศ</th>
                                            <th scope="col"   style="text-align: left;font-size: 19px;">วันที่ลงทะเบียน</th>
                                            <th scope="col"   style="text-align: left;font-size: 19px;">approved</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $result = mysqli_query($objCon, $sql);
                                        $i = 1;
                                        $total_price = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $tcheck = $row['approved'] == 'yes' ? 'checked' : '';
                                            $tid = "myCheck" + $i;
                                            ?>


                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td ><?= $row['cid']; ?></td>
                                                <td><?= $row['hn']; ?></td>
                                                <td ><?= $row['tname']; ?></td>
                                                <td ><?= $row['sex'] == 1 ? 'ชาย' : 'หญิง'; ?></td>
                                                <td ><?= $row['dupdate']; ?></td>
                                                <td >
                                                    <div class="icheck-primary d-inline">
                                                         <!--<input type="checkbox" id="myCheck" onclick="myFunction(<?= $row['cid'] ?>,<?= $tid ?>)"  <?= $tcheck ?> >-->
                                                        <input type="checkbox" id="<?= $tid ?>" onclick="myFunction(<?= $row['cid'] ?>,<?= $tid ?>)" <?= $tcheck ?>>
                                                        <label for="<?= $tid ?>">
                                                        </label>
                                                    </div>

                                                    <?= $row['approved']; ?>
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
                        </div>



                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020 <a href="http://www.smartqplk.com">Smart Queue</a>.</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../dist/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../dist/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
                                                                $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../dist/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="../dist/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="../dist/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../dist/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../dist/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../dist/plugins/moment/moment.min.js"></script>
        <script src="../dist/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../dist/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <script>
                                                                $(document).ready(function () {
                                                                    $('body').bootstrapMaterialDesign();
                                                                });

                                                                function myFunction(cid, id) {
                                                                    // Get the checkbox
                                                                    var tapprove = 'no'
                                                                    var checkBox = document.getElementById(id);
                                                                    console.log(cid)
                                                                    console.log(checkBox.checked)


                                                                    // If the checkbox is checked, display the output text
                                                                    if (checkBox.checked == true) {
                                                                        tapprove = "yes"
                                                                    } else {
                                                                        tapprove = "no"
                                                                    }

                                                                    $.ajax({
                                                                        type: 'POST', url: 'post_approve.php', dataType: 'json',
                                                                        data: {
                                                                            cid: cid,
                                                                            approved: tapprove
                                                                        }, success: function (se) {
                                                                            window.location = "approved.php"
                                                                        }, err() {
                                                                            console.log('ddd');
                                                                        }
                                                                    });






                                                                }
        </script>
    </body>
</html>
