<?php
session_start();

include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];

	$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
	if($sql)
	{
		$msg="Your Profile updated Successfully";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Edit Profile</title>

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
				background-color: #f0f8ff; 
			}

			.panel-body {
				padding: 20px;
				background-color: #D8CAB8; 
				border-radius: 10px;
				box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			}

			.container-fullw {
				background-color: #e9ecef; 
				padding: 20px;
				border-radius: 10px;
			}

			#container {
				background-color: #dce3e9; 
				border-radius: 10px;
				padding: 20px;
			}

			
			body, h1, h2, h3, h4, h5, h6, p, label, input, textarea, select, button, a {
				font-family: 'Times New Roman', Times, serif;
			}

			
			.panel-heading {
				background-color: #4CAF50;
				color: white;
				text-align: center;
			}

			.panel-title {
				font-size: 24px;
				font-weight: bold;
			}

			.btn-primary {
				background-color: #4CAF50;
				border-color: #4CAF50;
				font-size: 16px;
				padding: 10px 20px;
				border-radius: 5px;
			}

			.btn-primary:hover {
				background-color: #45a049;
				border-color: #45a049;
			}

			.form-group label {
				font-weight: bold;
			}

			.panel {
				border-radius: 10px;
				box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
			}

			#page-title h1 {
				font-size: 28px;
				font-weight: bold;
			}

.sidebar {
    background: linear-gradient(135deg, #2E3B4E, #1D2A38);
    color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

.sidebar a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.sidebar a:hover {
    background-color: #1E2A38;
    color: #ffffff;
}

.sidebar .active {
    background-color: #3D4A5D;
    color: #ffffff;
}

.sidebar .sidebar-heading {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
}

.sidebar .sidebar-item {
    margin-bottom: 10px;
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
									<h1 class="mainTitle">User | Edit Profile</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>User </span>
									</li>
									<li class="active">
										<span>Edit Profile</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
										<?php if($msg) { echo htmlentities($msg);}?> 
									</h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Profile</h5>
												</div>
												<div class="panel-body">
													<?php 
														$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
														while($data=mysqli_fetch_array($sql))
														{
													?>
													<h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>
													<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
													<?php if($data['updationDate']){?>
													<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
													<?php } ?>
													<hr />
													<form role="form" name="edit" method="post">
														<div class="form-group">
															<label for="fname">User Name</label>
															<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
														</div>

														<div class="form-group">
															<label for="address">Address</label>
															<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>

														<div class="form-group">
															<label for="city">City</label>
															<input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']);?>" >
														</div>
	
														<div class="form-group">
															<label for="gender">Gender</label>
															<select name="gender" class="form-control" required="required">
																<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
																<option value="male">Male</option>	
																<option value="female">Female</option>	
																<option value="other">Other</option>	
															</select>
														</div>

														<div class="form-group">
															<label for="fess">User Email</label>
															<input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']);?>">
															<a href="change-emaild.php">Update your email id</a>
														</div>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php } ?>
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
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
