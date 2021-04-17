<?php
include_once('../../authen.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Information</title>


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

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">

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
                                <h5 class="m-0 text-dark">Information</h5>
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
                                        <h3 class="card-title" style="line-height: 2.1rem">Event</h3>
                                        <a href="form_create_event.php" class="btn btn-primary float-right">เพิ่มข้อมูล</a>
                                    </div>
                                    <div class="card-body">
                                        <table id="dataTable-event" class="table table-hover table-bordered table-striped stripe row-border order-column" width="100%">
                                        </table>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="line-height: 2.1rem">ความเร็วตัวอักษรวิ่ง</h3>
                                    </div>
                                    <!-- <hr/> -->
                                    <form id="formData" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="building">ข้อมูล</label>
                                                    <span style="color:red;">(ไทย)</span>
                                                    <input type="text" class="form-control" name="title" id="title_th" placeholder="Title">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="building">ข้อมูล</label>
                                                    <span style="color:red;">(อังกฤษ)</span>
                                                    <input type="text" class="form-control" name="title" id="title_eng" placeholder="Title">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="building">ข้อมูล</label>
                                                    <span style="color:red;">(จีน)</span>
                                                    <input type="text" class="form-control" name="title" id="title_ch" placeholder="Title">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="front-size">ขนาดตัวอักษร</label>
                                                    <select class="form-control" name="front-speed" id="front-size" required>
                                                        <option value disabled selected>เลือกประเภท</option>
                                                        <option value="1">เล็ก</option>
                                                        <option value="2">ปกติ</option>
                                                        <option value="3">ใหญ่</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="front-speed">ความเร็วตัวอักษร</label>
                                                    <select class="form-control" name="front-speed" id="front-speed" required>
                                                        <option value disabled selected>เลือกประเภท</option>
                                                        <option value="1">ช้า</option>
                                                        <option value="2">ปกติ</option>
                                                        <option value="3">เร็ว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm"></div>
                                                    <div class="col-sm" style="padding:10px;">
                                                        <button type="button" class="btn btn-primary btn-block" name="submit" id="submit">บันทึกข้อมูล</button>
                                                    </div>
                                                    <div class="col-sm"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="line-height: 2.1rem">Link Streaming</h3>
                                    </div>
                                    <!-- <hr/> -->
                                    <form id="formData" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <input type="text" class="form-control" name="title" id="link" placeholder="กรุณาใส่ URL" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="number" class="form-control" name="title" id="minute" placeholder="กรุณาใส่เวลา (นาที)" required>
                                                </div>
                                            </div>
                                            <!-- <div class="col-3 text-center" style="padding:10px;">
                                                <input type="button" class="btn btn-primary btn-block" name="submit" id="submit_link">บันทึกข้อมูล</input>
                                            </div> -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm"></div>
                                                    <div class="col-sm" style="padding:10px;">
                                                        <button type="button" class="btn btn-primary btn-block" name="submit" id="submit_link">บันทึกข้อมูล</button>
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

        <!-- <script src="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
        <script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

        <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

        <script src="../../assets/vendor/bootstrap-table/bootstrap-table.min.js"></script>
        <script src="../../assets/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>
        <script src="../../assets/vendor/bootstrap-table/bootstrap-table-th-TH.js"></script>
        <!-- <script src="../../assets/vendor/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<script src="../../assets/vendor/bootstrap-table/extensions/export/export.js"></script> -->


        <!-- Create Me SCRIPTS -->
        <script src="../../assets/js/information/index.js"></script>

</body>

</html>