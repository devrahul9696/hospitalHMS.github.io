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
    <title>Doctor | Dashboard</title>
    
    <!-- Google Fonts for Times New Roman -->
    <link href="https://fonts.googleapis.com/css?family=Times+New+Roman:400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS -->
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
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    
    <!-- Custom Styles -->
    <style>
        /* Global Font Setting */
        body, h1, h2, h3, h4, h5, h6, p, a, span, li, ol, ul, .breadcrumb {
            font-family: 'Times New Roman', Times, serif !important;
        }
		body{
			background-image: url('https://churamanihospital.com/data/765d573d-5fd4-48b4-82ab-921c08e587c1.jpg');
    	background-size: cover; /* Cover the entire section */
   		 background-position: center; /* Center the image */
    	background-repeat: no-repeat; 
		}
        /* Sidebar styles */
        #sidebar {
            background-color: #343a40; /* Dark background */
            color: #fff; /* Text color */
            padding: 0;
        }

		#page-title .mainTitle {
    color: white; /* Set the text color to white */
}
        #sidebar .nav > li > a {
            color: #236a77; /* Light grey text */
            padding: 10px 20px;
            border-bottom: 1px solid #444; /* Divider between items */
            display: flex;
            align-items: center;
        }

        #sidebar .nav > li > a:hover {
            background-color: #495057; /* Slightly lighter on hover */
            color: #fff; /* White text on hover */
        }

        #sidebar .nav > li > a > i {
            margin-right: 10px; /* Space between icon and text */
            font-size: 18px; /* Slightly larger icons */
        }

        /* Active menu item */
        #sidebar .nav > li.active > a {
            background-color: #007bff; /* Blue background for active item */
            color: #fff; /* White text for active item */
        }
        #page-title h1 {
    color: black;
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 1px;
    line-height: 1;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}
.main-content > .container {
    background-color: transparent !important;
    padding-bottom: 50px;
}
        /* Submenu items */
        #sidebar .nav .children {
            background-color: #495057; /* Slightly lighter for submenus */
        }

        #sidebar .nav .children li > a {
            color: #ccc; /* Light grey text */
        }

        #sidebar .nav .children li > a:hover {
            background-color: #236a77; /* Lighter grey on hover */
            color: #fff; /* White text on hover */
        }
		/* Light Gray Background for Panel Body */
.panel-body {
    background-color: #D2B48C; /* Light gray color */
}

        /* Panel Styles */
        .panel.panel-white {
            background-color: #f236a77; /* Light background */
            border: 1px solid #e9ecef; /* Light border */
            border-radius: 8px; /* Rounded corners */
            transition: all 0.3s ease; /* Smooth transition */
        }

        .panel.panel-white:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect on hover */
            transform: translateY(-5px); /* Lift the panel on hover */
        }

        .panel.panel-white .panel-body {
            padding: 30px; /* More padding for a cleaner look */
        }

        .StepTitle {
            font-size: 20px; /* Increase the size of titles */
            margin-top: 15px;
        }
        #page-title .mainTitle {
    color: black;
}
        .fa-stack {
            font-size: 3em; /* Larger icons */
            margin-bottom: 10px;
        }

        .links.cl-effect-1 a {
            color: #007bff; /* Blue links */
            text-decoration: none;
        }

        .links.cl-effect-1 a:hover {
            text-decoration: underline;
        }

        /* Background and Main Content */
        body {
            background-color: #f0f2f5; /* Light grey background */
            color: #333; /* Darker text color */
        }

        .header, .footer {
            background-color: #007bff; /* Blue header and footer */
            color: #fff; /* White text */
            padding: 15px 0;
        }
/* Make the background of the container transparent */
.container-fluid.container-fullw.bg-light-yellow {
    background-color: transparent !important;
}
        .main-content {
            padding: 20px;
            background-color: #D3D3D3542d24; /* White background for content */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Slight shadow */
            border-radius: 8px; /* Rounded corners */
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            #sidebar {
                position: absolute;
                left: -250px;
                top: 0;
                width: 250px;
                height: 100%;
                z-index: 9999;
                transition: left 0.3s ease;
            }

            #sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .navbar-toggle {
                display: block;
                margin-right: 20px;
            }
        }
        /* Light Yellow Background Section */
        .bg-light-yellow {
            background-color: #fff9e6; /* Light yellow color */
        }
		/* Light Yellow Background Section with Image */
		.panel.panel-white {
    background-color: #236a77; /* Light background */
    border: 1px solid #e9ecef; /* Light border */
    border-radius: 8px; /* Rounded corners */
    transition: all 0.3s ease; /* Smooth transition */
    margin-bottom: 20px; /* Add space between panels */
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
                                <h1 class="mainTitle">Doctor | Dashboard</h1>
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
                    <div class="container-fluid container-fullw bg-light-yellow">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i> 
                                            <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">My Profile</h2>
                                        <p class="links cl-effect-1">
                                            <a href="edit-profile.php">
                                                Update Profile
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i> 
                                            <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">My Appointments</h2>
                                        <p class="cl-effect-1">
                                            <a href="appointment-history.php">
                                                View Appointment History
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

    <!-- Vendor Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="vendor/modernizr/modernizr-2.8.3.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/select2/select2.full.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    
    <!-- Custom Scripts -->
    <script src="assets/js/main.js"></script>
</body>
</html>
