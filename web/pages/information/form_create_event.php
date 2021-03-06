<?php 
    include_once('../../authen.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Report</title>

  <!-- stylesheet -->
  <link rel="stylesheet" href="../../assets/vendor/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
  <link rel="stylesheet" href="../../assets/vendor/plugins/summernote/summernote-bs4.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- include Sidebar -->
        <!-- <div id="sidebar"></div> -->
        <?php include_once('../include/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                            <h5 class="m-0 text-dark">เพิ่มข้อมูล</h5>
                        </div> -->
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
                                    <h3 class="card-title" style="line-height: 2.1rem;">เพิ่มข่าวสาร</h3>
                                    <a href="index.php" class="btn btn-warning float-right">กลับ</a>
                                </div>
                                <form id="formData" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-sm-6">
                                                <label for="building">Title</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="floor">ประเภท</label>
                                                <select class="form-control" name="floor" id="event_type" required>
                                                    <option value disabled selected>เลือกประเภท</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="owner">รายละเอียด</label>
                                                <span style="color: red;">
                                                    (100 ตัวอักษร)
                                                    </span>
                                                    <span id="total-characters"></span>
                                                    <!-- <span>/100</span> -->
                                                <textarea id="details" class="textarea" name="details" required>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="customFile">รูปภาพ
                                                    <span style="color: red; font-size:10px;">
                                                    (สามารถอัพโหลดได้ 1 รูปภาพ ไม่เกิน 2 MB เฉพาะไฟล์ .jpg,.png.gif)
                                                    </span>
                                                </label>
                                                    <div class="dropzone" id="mydropzone">
                                                        <div class="dz-default dz-message">
                                                            <span>เลือกรูปภาพ</span>
                                                        </div>
                                                    </div>
                                            </div>

                                            <!-- <div class="form-group col-sm-6">
                                                <label for="customFile">วิดิโอ 
                                                    <span style="color: red; font-size:10px;">
                                                    (สามารถอัพโหลดได้ 1 วิดิโอ ไม่เกิน 10 MB เฉพาะไฟล์ .mp4)
                                                    </span>
                                                </label>
                                                    <div class="dropzone video" id="mydropzone_video">
                                                        <div class="dz-default dz-message"><span>เลือกวิดิโอ</span></div>
                                                    </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">บันทึกข้อมูล</button>
                                    </div> -->
                                    <div class="container">
                                                <div class="row">
                                                    <div class="col-sm"></div>
                                                    <div class="col-sm" style="padding:10px;">
                                                        <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">บันทึกข้อมูล</button>
                                                    </div>
                                                    <div class="col-sm"></div>
                                                </div>
                                            </div>
                                    <!-- <div class="col-2 text-center" style="padding:10px;">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">บันทึกข้อมูล</button>
                                </div> -->
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
<!-- Summernote -->
<script src="../../assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<script src="../../assets/js/information/form_create_event.js"></script>
<!-- <script>

    $(document).ready(function(){
        $("#sidebar").load("../include/sidebar.html"); 
    });
</script> -->
</body>
</html>
