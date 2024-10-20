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
		<title>Patients | Appointment History</title>
		
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
				font-family: "Times New Roman", Times, serif;
				background-image: url('https://oraanj-interiors.co.uk/our-blogs/wp-content/uploads/2023/11/image-3-1024x576.jpeg');
				background-size: cover;
				background-position: center;
				background-attachment: fixed;
			}
			
			
			.mainTitle {
				font-size: 32px;
				color: #fff;
				font-weight: bold;
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
			
			.breadcrumb {
				background-color: transparent;
				font-size: 16px;
				color: #fff;
			}
			
			
			table {
				background-color: rgba(255, 255, 255, 0.9);
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
				border-radius: 10px;
			}

			th {
				background-color: #6c757d;
				color: white;
				font-size: 18px;
				text-align: center;
				padding: 10px;
			}
			
			td {
				font-size: 16px;
				padding: 10px;
				color: #333;
			}

			
			.btn-primary {
				background-color: #4CAF50;
				border-color: #4CAF50;
			}
			
			.btn-primary:hover {
				background-color: #45a049;
				border-color: #45a049;
			}

			
			.container-fullw {
				padding: 20px;
				background-color: rgba(255, 255, 255, 0.8);
				border-radius: 15px;
				box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
			}
			
			
			footer {
				background-color: #333;
				color: #fff;
				padding: 20px;
				text-align: center;
			}

			
			.container {
				margin-top: 20px;
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
									<h1 class="mainTitle">Patients | Appointment History</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Patients</span>
									</li>
									<li class="active">
										<span>Appointment History</span>
									</li>
								</ol>
							</div>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<p style="color:red;">
										<?php echo htmlentities($_SESSION['msg']);?>
										<?php echo htmlentities($_SESSION['msg']="");?>
									</p>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Doctor Name</th>
												<th>Patient Name</th>
												<th>Specialization</th>
												<th>Consultancy Fee</th>
												<th>Appointment Date / Time</th>
												<th>Appointment Creation Date</th>
												<th>Current Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql=mysqli_query($con,"select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
											$cnt=1;
											while($row=mysqli_fetch_array($sql)) {
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td class="hidden-xs"><?php echo $row['pname'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo $row['appointmentTime'];?></td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
													<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1)) {
														echo "Active";
													} elseif(($row['userStatus']==0) && ($row['doctorStatus']==1)) {
														echo "Cancel by Patient";
													} elseif(($row['userStatus']==1) && ($row['doctorStatus']==0)) {
														echo "Cancel by Doctor";
													} ?>
												</td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1)) {
															echo "No Action yet";
														} else {
															echo "Canceled";
														} ?>
													</div>
												</td>
											</tr>
											<?php 
											$cnt=$cnt+1;
											} ?>
										</tbody>
									</table>
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
