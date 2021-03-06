<?php 
    include_once('../../config/connect.php'); 
    include_once('../../authen.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dashboard</title>

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

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition sidebar-mini">
    
    <!-- Header Content -->
    <div class="wrapper">
        <!-- include Sidebar -->
        <?php include_once('../include/sidebar.php') ?>
        <!-- <div id="sidebar"></div> -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">หน้าหลัก</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <!-- <div class="content">
                <div class="container-fluid">
                    <div class="row"> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                หน่วยงานค้นห้าเยอะที่สุด
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">ร้านค้า/บริการ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <!-- </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                กิจกรรมที่มีการเข้าดูสูงสุด</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">โปรโมชั่นส่งท้ายปี</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                จำนวนการใช้งานในปัจจุบัน</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="row"> -->
                        <!-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">จำนวนผู้เข้าชม</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">2,188</span>
                                            <span>ผู้เข้าชมเมื่อเวลาผ่านไป</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> 12.5%
                                            </span>
                                            <span class="text-muted">ตั้งแต่สัปดาห์ที่ผ่านมา</span>
                                        </p>
                                    </div>
    
                                    <div class="position-relative mb-4">
                                        <canvas id="visitors-chart" height="200"></canvas>
                                    </div>
    
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> ในสัปดาห์นี้
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <!-- <div class="card-header"> -->
                                                <!-- <h3 class="card-title" style="line-height: 2.1rem">Report Event</h3> -->
                                                <!-- <h3></h3>
                                            </div> -->
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-5">
                                                        <input class="form-control" type="text" placeholder="วันที่" id="start_date1" autocomplete="off"/>
                                                    </div>

                                                    <div class="form-group d-flex align-items-center">
                                                        <span>ถึง</span>
                                                    </div>

                                                    <div class="form-group col-sm-5">
                                                        <input class="form-control" type="text" placeholder="วันที่" id="end_date1" autocomplete="off"/>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between">
                                                    <h3 class="card-title">จำนวนการเข้าชมร้านค้าสูงสุด 5 อันดับ</h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        <!-- <span class="text-bold text-lg">10,000 คน</span> -->
                                                        <span>จำนวนการเข้าชม</span>
                                                    </p>
                                                    <p class="ml-auto d-flex flex-column text-right">
                                                        <!-- <span class="text-success">
                                                        <i class="fas fa-arrow-up"></i> 33.1%
                                                        </span> -->
                                                        <!-- <span class="text-muted">ตั้งแต่เดือนที่แล้ว</span> -->
                                                    </p>
                                                </div>
                
                                                <div class="position-relative mb-4">
                                                    <canvas id="view-event-chart" height="200"></canvas>
                                                </div>
                
                                                <div class="d-flex flex-row justify-content-end">
                                                    <span class="mr-2">
                                                        <i class="fas fa-square text-primary"></i> ทั้งหมด
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <!-- <div class="card-header"> -->
                                                <!-- <h3 class="card-title" style="line-height: 2.1rem">Report Event</h3> -->
                                                <!-- <h3></h3>
                                            </div> -->
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-5">
                                                        <input class="form-control" type="text" placeholder="วันที่" id="start_date2" autocomplete="off"/>
                                                    </div>

                                                    <div class="form-group d-flex align-items-center">
                                                        <span>ถึง</span>
                                                    </div>

                                                    <div class="form-group col-sm-5">
                                                        <input class="form-control" type="text" placeholder="วันที่" id="end_date2" autocomplete="off"/>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-12">
                            <div class="card">
                            <!-- border-0 -->
                                <div class="card-header"> 
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">จำนวนการเข้าชมกิจกรรม/ข่าวสารสูงสุด 5 อันดับ</h3>
                                        <!-- <a href="javascript:void(0);">ดูรายงาน</a> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <!-- <span class="text-bold text-lg">10,000 คน</span> -->
                                            <span>จำนวนการเข้าชม</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <!-- <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 33.1%
                                            </span> -->
                                            <!-- <span class="text-muted">ตั้งแต่เดือนที่แล้ว</span> -->
                                        </p>
                                    </div>
    
                                    <div class="position-relative mb-4">
                                        <canvas id="view-agency-chart" height="200"></canvas>
                                    </div>
    
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> ทั้งหมด
                                        </span>
                                    </div>
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
<script src="../../assets/vendor/plugins/chart.js/Chart.min.js"></script>
<script src="../../assets/js/dashboard.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

<!-- <script src="../../assets/vendor/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
<script src="../../assets/vendor/plugins/toastr/toastr.min.js"></script>

<!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<!-- <script> 
      $("#sidebar").load("../include/sidebar.html"); 
</script>  -->

</body>
</html>