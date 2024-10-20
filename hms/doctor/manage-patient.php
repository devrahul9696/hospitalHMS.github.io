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
    <title>Doctor | Manage Patients</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
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
        font-family: 'Times New Roman', Times, serif;
        background: url('https://thumbs.dreamstime.com/z/stethoscope-digital-tablet-laptop-hospital-health-check-system-support-patient-medical-icon-network-technology-330946986.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #333;
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
	.page-title{
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
		.mainTitle {
    font-weight: bold;
    color: #fff; 
    font-size: 28px; 
}
    .breadcrumb {
        background: transparent;.mainTitle {
    font-weight: bold;
    color: #fff; 
    font-size: 28px; 
}

        padding: 0;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .container-fullw {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    table {
        font-size: 16px;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    th {
        background-color: #f8f8f8;
        padding: 10px;
        text-align: center;
        border-bottom: 2px solid #ddd;
    }

    td {
        padding: 10px;
        text-align: center;
        background-color: #fff;
        border-bottom: 1px solid #ddd;
    }

    .fa-edit, .fa-eye {
        color: #007bff;
        transition: color 0.3s ease;
    }

    .fa-edit:hover, .fa-eye:hover {
        color: #0056b3;
    }
</style>
</head>
<body>
<div id="app">		
    <?php include('include/sidebar.php');?>
    <div class="app-content">
        <?php include('include/header.php');?>
        <div class="main-content" >
            <div class="wrap-content container" id="container">
              
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Doctor | Manage Patients</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Doctor</span>
                            </li>
                            <li class="active">
                                <span>Manage Patients</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>

                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Patient Name</th>
                                        <th>Patient Contact Number</th>
                                        <th>Patient Gender </th>
                                        <th>Creation Date </th>
                                        <th>Updation Date </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $docid=$_SESSION['id'];
                                $sql=mysqli_query($con,"select * from tblpatient where Docid='$docid' ");
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql))
                                {
                                ?>
                                    <tr>
                                        <td class="center"><?php echo $cnt;?>.</td>
                                        <td class="hidden-xs"><?php echo $row['PatientName'];?></td>
                                        <td><?php echo $row['PatientContno'];?></td>
                                        <td><?php echo $row['PatientGender'];?></td>
                                        <td><?php echo $row['CreationDate'];?></td>
                                        <td><?php echo $row['UpdationDate'];?>
                                        </td>
                                        <td>
                                            <a href="edit-patient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a> || <a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                $cnt=$cnt+1;
                                }?>
                                </tbody>
                            </table>
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
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
</script>

</body>
</html>
