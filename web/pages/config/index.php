<?php 
    include_once('../../authen.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Config</title>

  <!-- stylesheet -->
  <link rel="stylesheet" href="../../assets/vendor/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="../../assets/vendor/bootstrap-table/bootstrap-table.css">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
    <!-- Header Content -->
    <!-- <div id="sidebar"></div> -->
    <div class="wrapper">
    <?php include_once('../include/sidebar.php') ?>
        <!-- include Sidebar -->
        <div id="sidebar"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h5 class="m-0 text-dark">Config</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height: 2.1rem">Config</h3>
                                    <!-- <button type="button" class="btn btn-danger float-right">??????????????????????????????</button> -->
                                    <button type="button" class="btn btn-info float-right" id="ReStart">
                                        <i class="fas fa-power-off"></i> Restart
                                    </button>
                                    <button type="button" class="btn btn-danger float-right" id="shut_down">
                                        <i class="fas fa-power-off"></i> Open
                                    </button>
                                    <button type="button" class="btn btn-success float-right" id="open">
                                        <i class="fas fa-power-off"></i> Shut down
                                    </button>
                                    <a href="theme.php" class="btn btn-primary float-right">????????????????????????</a>
                                </div>
                                <div class="card-body">
                                    <table  id="dataTable-event" 
                                            class="table table-hover table-bordered table-striped" 
                                            width="100%">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- SCRIPTS -->
<script src="../../assets/vendor/plugins/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../../assets/js/hamburger/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

<script src="../../assets/vendor/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>
<script src="../../assets/vendor/bootstrap-table/bootstrap-table-th-TH.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/export/export.js"></script>


<!-- <script src="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->


<!-- Create Me SCRIPTS -->
<script src="../../assets/js/config/index.js"></script>

</body>
</html>