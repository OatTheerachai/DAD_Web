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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.css">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />

    <!-- <style type="text/css">
      .thumbnails li img{
          width: 200px;
          height: 200px;
      }
  </style> -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Header Content -->
    <div class="wrapper">
        <!-- include Sidebar -->
        <?php include_once('../include/sidebar.php') ?>
        <!-- <div id="sidebar"></div> -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h5 class="m-0 text-dark">Theme</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height: 2.1rem">Theme</h3>
                                    <a href="index.php" class="btn btn-warning float-right">????????????</a>
                                </div>
                                <form id="formData" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <!-- <select class="image-picker show-html">
                                        <option data-img-src="../../assets/img/bg1.jpg" width="200" height="200" value="1">  Page 1  </option>
                                        <option data-img-src="https://source.unsplash.com/pWkk7iiCoDM/200x200" value="2">  Page 2  </option>
                                        <option data-img-src="https://source.unsplash.com/pWkk7iiCoDM/200x200" value="12"> Page 12 </option>
                                      </select> -->
                                      <div class="form-group col-sm-10">
                                                <label for="customFile">??????????????????
                                                    <span style="color: red; font-size:10px;">
                                                    (???????????????????????????????????????????????? 5 ?????????????????? ????????????????????? 2 MB ??????????????????????????? .jpg,.png)
                                                    </span>
                                                </label>
                                                    <div class="dropzone" id="mydropzone">
                                                        <div class="dz-default dz-message">
                                                            <span>?????????????????????????????????</span>
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                                <!-- <div class="col-2 text-center" style="padding:10px;">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">????????????????????????????????????</button>
                                </div> -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm"></div>
                                        <div class="col-sm text-center" style="padding:10px;">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">????????????????????????????????????</button>
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height: 2.1rem">??????????????? Theme</h3>
                                    <!-- <a href="index.php" class="btn btn-warning float-right">????????????</a> -->
                                </div>
                                <form id="formtheme" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <select class="image-picker show-html" id="theme">
                                        <!-- <option data-img-src="../../assets/img/bg1.jpg" width="200" height="200" value="1"></option> -->
                                      </select>
                                </div>
                                <!-- <div class="col-2 text-center" style="padding:10px;">
                                    <button type="button" class="btn btn-primary btn-block" name="submit_theme" id="submit_theme">????????????????????????????????????</button>
                                </div> -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm"></div>
                                        <div class="col-sm text-center" style="padding:10px;">
                                    <button type="button" class="btn btn-primary btn-block" name="submit_theme" id="submit_theme">????????????????????????????????????</button>
                                </div>
                                        <div class="col-sm"></div>
                                    </div>
                                </div>
                                </div>
                                </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

<script src="../../assets/vendor/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>
<script src="../../assets/vendor/bootstrap-table/bootstrap-table-th-TH.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/export/export.js"></script>
<!-- <script src="image-picker.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<!-- <script src="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
<!-- Create Me SCRIPTS -->
<script src="../../assets/js/config/theme.js"></script>

<!-- <script> 
$(document).ready(function() {
    $("#sidebar").load("../include/sidebar.html"); 
})
</script>  -->
</body>
</html>