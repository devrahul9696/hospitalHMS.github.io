<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Dashboard</title>
    <link href="http://fonts.googleapis.com/css?family=Times+New+Roman:400,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

    
    <style>
        body {
            font-family: 'Times New Roman', serif;
        }
        .app-content {
            background-color: #f8f9fa; 
        }
        .panel {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .panel-body {
            padding: 20px;
        }
        .panel-title {
            color: #333;
        }
        .panel .fa-stack {
            margin-bottom: 15px;
        }
        .panel .fa-stack-2x {
            color: #007bff; 
        }
        .panel .fa-inverse {
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .links a {
            color: #007bff;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .breadcrumb {
            background-color: #e9ecef;
            border-radius: 5px;
            padding: 10px;
        }
        .breadcrumb li {
            display: inline;
            margin-right: 5px;
        }
        .breadcrumb li+li:before {
            content: ">";
            margin-left: 5px;
            margin-right: 5px;
        }
		
.panel-body {
    background-color: #f5deb3; 
}


.app-content {
    background-color: #28a745; 
}
    </style>
</head>
<body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
               
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Dashboard</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Dashboard</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Users</h2>
                                        <p class="links cl-effect-1">
                                            <a href="manage-users.php">
                                                <?php 
                                                $result = mysqli_query($con, "SELECT * FROM users");
                                                $num_rows = mysqli_num_rows($result);
                                                ?>
                                                Total Users: <?php echo htmlentities($num_rows); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Doctors</h2>
                                        <p class="cl-effect-1">
                                            <a href="manage-doctors.php">
                                                <?php 
                                                $result1 = mysqli_query($con, "SELECT * FROM doctors");
                                                $num_rows1 = mysqli_num_rows($result1);
                                                ?>
                                                Total Doctors: <?php echo htmlentities($num_rows1); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Appointments</h2>
                                        <p class="links cl-effect-1">
                                            <a href="appointment-history.php">
                                                <?php 
                                                $sql = mysqli_query($con, "SELECT * FROM appointment");
                                                $num_rows2 = mysqli_num_rows($sql);
                                                ?>
                                                Total Appointments: <?php echo htmlentities($num_rows2); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Patients</h2>
                                        <p class="links cl-effect-1">
                                            <a href="manage-patient.php">
                                                <?php 
                                                $result = mysqli_query($con, "SELECT * FROM tblpatient");
                                                $num_rows = mysqli_num_rows($result);
                                                ?>
                                                Total Patients: <?php echo htmlentities($num_rows); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="ti-files fa-1x"></i>
                                            <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">New Queries</h2>
                                        <p class="links cl-effect-1">
                                            <a href="unread-queries.php">
                                                <?php 
                                                $sql = mysqli_query($con, "SELECT * FROM tblcontactus WHERE IsRead IS NULL");
                                                $num_rows22 = mysqli_num_rows($sql);
                                                ?>
                                                Total New Queries: <?php echo htmlentities($num_rows22); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        
        <?php include('include/footer.php');?>
        <?php include('include/setting.php');?>
        
    </div>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/main.js"></script>
 
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
</body>
</html>
