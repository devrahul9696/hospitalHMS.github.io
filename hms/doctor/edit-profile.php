<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
    $docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
    $docaddress=$_POST['clinicaddress'];
    $docfees=$_POST['docfees'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno' where id='".$_SESSION['id']."'");
    if($sql)
    {
        echo "<script>alert('Doctor Details updated Successfully');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctr | Edit Doctor Details</title>
    
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
            background-color: #6495ED; 
        }
        h1.mainTitle {
    color: #fff;
    font-weight: bold;
        }
        .container-fluid {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }
        .panel {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .panel-title{
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        .panel-heading {
            background-color: #007bff;
            color: #fff;
            border-bottom: 1px solid #ddd;
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }
        .panel-body {
            background-color: #d2b48c; 
            padding: 20px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        h1.mainTitle {
            color: #fff;
            font-weight: bold;
        }
        .breadcrumb {
            background-color: #e9ecef;
            border-radius: 4px;
        }
        .breadcrumb li a {
            color: #007bff;
        }
        .breadcrumb li a:hover {
            color: #0056b3;
        }
       
#page-title {
    background-color: #007bff; 
    padding: 15px; 
    font-family: 'Times New Roman', Times, serif;
}

#page-title .mainTitle {
    color: #ffffff; 
    font-weight: bold; 
    font-size: 28px; 
    text-transform: uppercase; 
    font-family: 'Times New Roman', Times, serif;
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
                                <h1 class="mainTitle">Doctor | Edit Doctor Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Edit Doctor Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Edit Doctor</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php 
                                                $sql = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='".$_SESSION['dlogin']."'");
                                                while($data = mysqli_fetch_array($sql))
                                                {
                                                ?>
                                                <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">Doctor Specialization</label>
                                                        <select name="Doctorspecialization" class="form-control" required="required">
                                                            <option value="<?php echo htmlentities($data['specilization']);?>">
                                                                <?php echo htmlentities($data['specilization']);?>
                                                            </option>
                                                            <?php 
                                                            $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                                            while($row = mysqli_fetch_array($ret))
                                                            {
                                                            ?>
                                                            <option value="<?php echo htmlentities($row['specilization']);?>">
                                                                <?php echo htmlentities($row['specilization']);?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctorname">Doctor Name</label>
                                                        <input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Doctor Clinic Address</label>
                                                        <textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="fees">Doctor Consultancy Fees</label>
                                                        <input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']);?>" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="contact">Doctor Contact no</label>
                                                        <input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Doctor Email</label>
                                                        <input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']);?>">
                                                    </div>
                                                    
                                                    <?php } ?>
                                                    
                                                    <button type="submit" name="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
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
    <script src="vendor/modernizr/modernizr.custom.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
    
</body>
</html>
