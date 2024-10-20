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
		<title>Admin | View Patients</title>
		
		<link href="https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400;700&display=swap" rel="stylesheet">
		
	
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
				background-image: url('https://www.shutterstock.com/image-photo/documents-concept-doctor-use-computer-260nw-2360647421.jpg');
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				color: #333;
			}

			.app-content {
				background-color: rgba(255, 255, 255, 0.9);
				padding: 30px;
				border-radius: 10px;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			}

			h1.mainTitle, h5.over-title {
				text-align: center;
				color: #007bff;
				text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
			}

			.table-hover {
				background-color: rgba(255, 255, 255, 0.8);
				border-radius: 10px;
				overflow: hidden;
			}

			.table thead th {
				background-color: #007bff;
				color: white;
			}

			.table-hover tbody tr:hover {
				background-color: rgba(0, 123, 255, 0.1);
			}

			.table td, .table th {
				padding: 15px;
				vertical-align: middle;
			}

			.fa-eye {
				color: #007bff;
				font-size: 18px;
			}

		
			a:hover .fa-eye {
				transform: scale(1.2);
				transition: all 0.3s ease-in-out;
			}

			
			.animate-fade {
				animation: fadeIn 1s ease-in-out;
			}

			@keyframes fadeIn {
				from {
					opacity: 0;
				}
				to {
					opacity: 1;
				}
			}
		</style>
	</head>
	<body>
		<div id="app">		
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">
				<?php include('include/header.php'); ?>
				<div class="main-content">
					<div class="wrap-content container" id="container">
						
						<section id="page-title" class="animate-fade">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | View Patients</h1>
								</div>
								<ol class="breadcrumb">
									<li><span>Admin</span></li>
									<li class="active"><span>View Patients</span></li>
								</ol>
							</div>
						</section>
						
						
						<div class="container-fluid container-fullw bg-white animate-fade">
							<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>
									
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
												$sql = mysqli_query($con, "select * from tblpatient");
												$cnt = 1;
												while($row = mysqli_fetch_array($sql)) {
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
												<td><?php echo $row['PatientContno'];?></td>
												<td><?php echo $row['PatientGender'];?></td>
												<td><?php echo $row['CreationDate'];?></td>
												<td><?php echo $row['UpdationDate'];?></td>
												<td>
													<a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>
												</td>
											</tr>
											<?php 
												$cnt = $cnt + 1;
												}
											?>
										</tbody>
									</table>
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
