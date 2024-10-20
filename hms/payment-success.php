<?php
session_start();
include("include/config.php");

// Check if the user is logged in, otherwise redirect to the payment page
if (!isset($_SESSION['patient'])) {
    header("Location: payment.php");
    exit();
}

// Retrieve payment details from the database using session ID
$payment_id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM payments WHERE patient_id='$payment_id' ORDER BY id DESC LIMIT 1");
$payment = mysqli_fetch_array($query);

// If no payment details are found, redirect to payment form
if (!$payment) {
    $_SESSION['errmsg'] = "No payment found for this patient";
    header("Location: payment.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HMS | Payment Success</title>
    
    <!-- Include Bootstrap, FontAwesome, and Custom Stylesheets -->
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
        body.payment-success {
            background: url('https://images.unsplash.com/photo-1562564055-d0f6d998d09e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-4.0.3&q=80&w=1080') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Times New Roman', serif;
        }

        .box-success {
            background-color: #D2B48C;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: 'Times New Roman', serif;
            color: brown;
        }

        .logo h2 {
            font-family: 'Times New Roman', serif;
            font-weight: bold;
            color: white;
        }

        .details h4 {
            font-family: 'Times New Roman', serif;
            color: brown;
        }
        
        .form-actions a {
            font-family: 'Times New Roman', serif;
            color: brown;
        }
    </style>
</head>

<body class="payment-success">
    <div class="row">
        <div class="main-success col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <a href="../index.html"><h2> HMS | Payment Success</h2></a>
            </div>

            <div class="box-success">
                <h3>Payment Successful</h3>
                <div class="details">
                    <h4>Patient Email: <?php echo $_SESSION['patient']; ?></h4>
                    <h4>Amount Paid: <?php echo $payment['amount']; ?></h4>
                    <h4>Payment Method: <?php echo $payment['payment_method']; ?></h4>
                    <h4>Transaction ID: <?php echo $payment['id']; ?></h4>
                    <h4>Payment Date: <?php echo $payment['created_at']; ?></h4>
                </div>

                <div class="form-actions">
                    <a href="payment.php" class="btn btn-success">Make Another Payment</a>
                    <a href="../index.html" class="btn btn-primary">Return to Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
