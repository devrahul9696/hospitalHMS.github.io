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
		<title>B/w dates reports | Admin</title>
		
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
			
			body, h1, h2, h3, h4, h5, h6, p, label, input, button {
				font-family: 'Times New Roman', serif !important;
			}
			
			
			body {
				background-image: url('https://cdn.light-it.net/articles_image/Article10_%D0%902.jpg');
				background-size: cover;
				background-attachment: fixed;
				background-position: center;
				color: #fff; 
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
				background-color: rgba(255, 255, 255, 0.8); 
				border-radius: 8px;
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
				padding: 20px;
			}

			input.form-control {
				border-radius: 5px;
				border: 1px solid #ccc;
				box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
			}

			button.btn-primary {
				background-color: #007bff;
				border-color: #007bff;
				border-radius: 5px;
				transition: background-color 0.3s ease;
			}

			button.btn-primary:hover {
				background-color: #0056b3;
			}

			
			.mainTitle, .breadcrumb li {
				color: #fff;
				text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
			}

			.container-fullw {
				padding: 40px;
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
									<h1 class="mainTitle">Between Dates | Reports</h1>
								</div>
								<ol class="breadcrumb">
									<li><span>Between Dates</span></li>
									<li class="active"><span>Reports</span></li>
								</ol>
							</div>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">Between Dates Reports</h5>
										</div>
										<div class="panel-body">
											<form role="form" method="post" action="betweendates-detailsreports.php">
												<div class="form-group">
													<label for="fromdate">From Date:</label>
													<input type="date" class="form-control" name="fromdate" id="fromdate" required>
												</div>
												<div class="form-group">
													<label for="todate">To Date:</label>
													<input type="date" class="form-control" name="todate" id="todate" required>
												</div>
												<button type="submit" name="submit" class="btn btn-primary">Submit</button>
											</form>
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
