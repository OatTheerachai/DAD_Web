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
                            <h5 class="m-0 text-dark">Profile</h5>
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
                                    <h3 class="card-title" style="line-height: 2.1rem">Profile</h3>
                                    <!-- <a href="form_create_event.html" class="btn btn-primary float-right">เพิ่มข้อมูล</a> -->
                                </div>
                                <form id="formData">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="building">Firstname</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="building">Lastname</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="building">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="building">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                                        </div>

                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm"></div>
                                            <div class="col-sm" style="padding:10px;">
                                                <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">บันทึกข้อมูล</button>
                                            </div>
                                        <div class="col-sm"></div>
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

<!-- <script src="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
<script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

<script> 
$(document).ready(function() {
    // $("#sidebar").load("../include/sidebar.html"); 
        $.ajax({
            url: "../../assets/lib/datareturn.php?i=1", 
            success: function(result){
                // console.log(result);
                $("#firstname").val(result[0].firstname); 
                $("#lastname").val(result[0].lastname); 
                $("#email").val(result[0].email); 
            }
        });

    $('#formData').on('submit', function (e) {
        e.preventDefault();
        $.post("../../assets/lib/datareturn.php", {
        i: 103,
        firstname: $("#firstname").val(),
        lastname:$("#lastname").val(),
        email:$("#email").val(),
        pass:$("#password").val(),
    }).done(function(resp) {
        // console.log("test");
        // console.log(resp);
        if(resp.data === "Success"){
            toastr.success('เเก้ไข้ข้อมูลเรียบร้อยเเล้ว')
            setTimeout(() => {
                window.location.reload();
            }, 800);
        }
        else {
            toastr.error('ข้อมูลไม่ถูกต้อง')
        }
    });
});
})
</script> 
</body>
</html>