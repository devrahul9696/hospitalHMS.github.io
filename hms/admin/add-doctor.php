<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
if($sql)
{
echo "<script>alert('Doctor info added Successfully');</script>";
echo "<script>window.location.href ='manage-doctors.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Doctor</title>
		
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
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<style>
			body {
				font-family: 'Times New Roman', serif;
				background-color: #f8f9fa;
				color: #444;
			}

			.panel-white {
				background-color: #ffffff;
				border-radius: 15px;
				padding: 20px;
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
				transition: transform 0.3s;
			}

			.panel-white:hover {
				transform: translateY(-5px);
			}

			.panel-heading h5 {
				color: #007bff;
				font-size: 24px;
				font-weight: bold;
			}

			.form-group label {
				font-weight: bold;
				color: #007bff;
			}

			.form-control {
				border: 2px solid #007bff;
				border-radius: 5px;
				padding: 10px;
				color: #444;
			}

			.form-control:focus {
				box-shadow: none;
				border-color: #0056b3;
			}

			button {
				background-color: #007bff;
				border: none;
				border-radius: 5px;
				color: white;
				padding: 10px 20px;
				font-size: 18px;
				font-weight: bold;
				transition: background-color 0.3s;
			}

			button:hover {
				background-color: #0056b3;
			}

			#submit {
				width: 100%;
			}

			.text-colorful {
				color: #007bff;
			}

			.breadcrumb li {
				color: #28a745;
			}

			.breadcrumb li.active {
				color: #007bff;
				font-weight: bold;
			}

.panel-white {
    background-color: rgba(255, 255, 255, 0.7); 
    box-shadow: none; 
}

h5.panel-title,
label,
a,
.form-control,
.btn-primary {
    color: black !important; 
}


body {
    font-family: 'Times New Roman', Times, serif; 
}


.btn-primary {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
}


select.form-control {
    background-color: rgba(255, 255, 255, 0.7); 
    border: 1px solid #ccc;
    color: black;
}


input.form-control, 
textarea.form-control {
    background-color: rgba(255, 255, 255, 0.7); 
    border: 1px solid #ccc;
    color: black;
}

label {
    font-weight: bold;
    color: black;
}

button {
    background-color: #333; 
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
}
.panel-white {
    background-color: rgba(255, 255, 255, 0.5); 
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.panel-white:hover {
    transform: translateY(-5px);
}

.form-control {
    background-color: rgba(255, 255, 255, 0.7); 
    border: 2px solid #007bff;
    border-radius: 5px;
    padding: 10px;
    color: #444;
}

textarea.form-control {
    background-color: rgba(255, 255, 255, 0.7); 
}

select.form-control {
    background-color: rgba(255, 255, 255, 0.7);
}

button {
    background-color: rgba(0, 123, 255, 0.7); 
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    transition: background-color 0.3s;
}

button:hover {
    background-color: rgba(0, 86, 179, 0.8); 
}
body {
        font-family: 'Times New Roman', Times, serif;
        background: url('https://thumbs.dreamstime.com/z/stethoscope-digital-tablet-laptop-hospital-health-check-system-support-patient-medical-icon-network-technology-330946986.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #333;
    }
    #page-title h1 {
    color: white;
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 1px;
    line-height: 1;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}
			.panel-white {
				background-color: rgba(255, 255, 255, 0.7);
				border-radius: 15px;
				padding: 20px;
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			}

			.panel-heading {
				background-color: green; 
				text-align: center; 
				padding: 10px;
				border-radius: 5px;
			}

			.panel-heading h5 {
				color: white; 
				font-size: 24px;
				font-weight: bold;
				margin: 0;
				padding: 0;
			}

			button {
				background-color: #333; 
				color: #fff;
				padding: 10px 15px;
				border-radius: 5px;
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
									<h1 class="mainTitle">Admin | Add Doctor</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add Doctor</span>
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
													<h5 class="panel-title">Add Doctor</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
							<select name="Doctorspecialization" class="form-control" required="true">
																<option value="">Select Specialization</option>
<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																 Doctor Name
															</label>
					<input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
														</div>


<div class="form-group">
															<label for="address">
																 Doctor Clinic Address
															</label>
					<textarea name="clinicaddress" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																 Doctor Consultancy Fees
															</label>
					<input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														</div>
	
<div class="form-group">
									<label for="fess">
																 Doctor Contact no
															</label>
					<input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														</div>

<div class="form-group">
									<label for="fess">
																 Doctor Email
															</label>
<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					
						
					</div>
				</div>
			</div>
			
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
