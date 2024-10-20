<?php
session_start();

include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic|Times New Roman">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="vendor/switchery/switchery.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color">
    <style>
    #page-title {
        background-color: #003366;
        color: #ffffff;  
    }
    #page-title .page-title {
        font-size: 2.2em;
        font-weight: bold; 
        color: #ffffff; 
        margin: 0;
        line-height: 1.2em;
    }
    body {
        font-family: 'Times New Roman', serif;
        background-color: #f4f7f6;
        color: #2c3e50;
    }
    .sidebar {
        width: 250px;
        height: 100%;
        background-color: #34495e;
        color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    }
    .sidebar-header {
        margin-bottom: 20px;
    }
    .sidebar-title {
        font-size: 2em;
        font-weight: 700;
        color: #ecf0f1;
        margin: 0;
        text-align: center;
        border-bottom: 1px solid #ecf0f1;
        padding-bottom: 10px;
    }
    .sidebar-menu {
        list-style: none;
        padding: 0;
    }
    .sidebar-item {
        margin: 15px 0;
    }
    .sidebar-link {
        display: flex;
        align-items: center;
        color: #ecf0f1;
        text-decoration: none;
        padding: 12px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
        background-color: rgba(255, 255, 255, 0.1);
    }
    .sidebar-link:hover {
        background-color: #1abc9c;
        color: #fff;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
    }
    .sidebar-link i {
        margin-right: 15px;
        font-size: 1.5em;
    }
    .main-content {
        margin-left: 270px;
        padding: 20px;
    }
    .page-title {
        margin-bottom: 20px;
        font-size: 2.5em;
        color: #2980b9;
        font-weight: 600;
        text-align: center;
    }
    .welcome-message {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .welcome-message:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .panel-white {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        transition: all 0.3s;
    }
    .panel-white:hover {
        background-color: #ecf0f1;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .panel-body {
        background-color: #f5e6da; 
        border-radius: 10px;
        padding: 20px;
        transition: background-color 0.3s;
    }
    .StepTitle {
        font-size: 1.8em;
        font-weight: 600;
        color: #34495e;
        margin-top: 10px;
    }
    .links a {
        color: #1abc9c;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }
    .links a:hover {
        color: #16a085;
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Dashboard</h2>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="edit-profile.php" class="sidebar-link">
                        <i class="fa fa-user"></i> My Profile
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="appointment-history.php" class="sidebar-link">
                        <i class="fa fa-calendar"></i> Appointments
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="book-appointment.php" class="sidebar-link">
                        <i class="fa fa-calendar-plus"></i> Book Appointment
                    </a>
                </li>
            
            </ul>
        </nav>
        <div class="main-content">
            <?php include('include/header.php'); ?>
            <div class="container">
                
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="page-title">Patients | Dashboard</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>User</span>
                            </li>
                            <li class="active">
                                <span>Dashboard</span>
                            </li>
                        </ol>
                    </div>
                </section>
               
                <div class="container-fluid container-fullw bg-white">
                    <div class="welcome-message">
                        <h2>Welcome to Patients Dashboard</h2>
                        <p>Here you can manage your profile, view appointments, and book new appointments.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">My Profile</h2>
                                    <p class="links cl-effect-1">
                                        <a href="edit-profile.php">Update Profile</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">My Appointments</h2>
                                    <p class="cl-effect-1">
                                        <a href="appointment-history.php">View Appointment History</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">Book Appointment</h2>
                                    <p class="links cl-effect-1">
                                        <a href="book-appointment.php">Book New Appointment</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
        $(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
</body>
</html>
