<?php
session_start();
include("include/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['dlogin']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$_SESSION['dlogin']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('".$_SESSION['dlogin']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Login</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

		<style>
			
			body, h2, legend, p, a, button, input, span {
				font-family: 'Times New Roman', serif !important;
			}

		
			body {
				background: url('https://media.licdn.com/dms/image/v2/C4E12AQFWeykoqNH3zA/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1529431387862?e=2147483647&v=beta&t=0Wdp2yjai0u-90HN2NiZTeBaBFS_oYfgLt0J4QvdWgA') no-repeat center center fixed;
				background-size: cover;
				height: 100%;
				margin: 0;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			
			.main-login {
				background: rgba(255, 255, 255, 0.9); 
				border-radius: 15px;
				box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
				padding: 30px;
				width: 100%;
				max-width: 400px;
			}

			
			.logo h2 {
				font-size: 28px;
				font-weight: bold;
				color: #333;
				text-align: center;
				margin-bottom: 20px;
			}

			.box-login {
				padding: 20px;
			}

			.form-login .form-control {
				border-radius: 8px;
				border: 1px solid #ddd;
				padding: 12px;
				font-size: 16px;
			}

			.form-login .input-icon i {
				color: #007bff;
				position: absolute;
				right: 15px;
				top: 50%;
				transform: translateY(-50%);
			}

			.form-login .btn-primary {
				background-color: #007bff;
				border: none;
				color: #fff;
				padding: 12px;
				font-size: 18px;
				width: 100%;
				border-radius: 8px;
				cursor: pointer;
				transition: all 0.3s ease;
			}

			.form-login .btn-primary:hover {
				background-color: #0056b3;
			}

			.form-login .form-group {
				position: relative;
				margin-bottom: 20px;
			}

			.form-login .form-actions {
				margin-top: 20px;
			}

			
			.form-login .form-group .forgot-password {
				float: right;
				font-size: 14px;
				color: #007bff;
			}

			.form-login .form-group .forgot-password:hover {
				text-decoration: underline;
				color: #0056b3;
			}

			
			.copyright {
				text-align: center;
				color: #666;
				font-size: 14px;
				margin-top: 20px;
			}

			
			@media (max-width: 768px) {
				.main-login {
					margin-top: 30px;
				}
			}
		</style>
	</head>
	<body>
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<a href="../../index.html">
						<h2>HMS | Doctor Login</h2>
					</a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i>
								</span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
								</span>
								<a href="forgot-password.php" class="forgot-password">
									Forgot Password?
								</a>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. All rights reserved.
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
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	</body>
</html>
