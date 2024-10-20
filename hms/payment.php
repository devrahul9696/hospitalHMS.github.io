<?php
session_start();
error_reporting(0);
include("include/config.php");

if (isset($_POST['submit'])) {
    // Fetching patient details based on email
    $ret = mysqli_query($con, "SELECT * FROM patients WHERE email='" . $_POST['email'] . "'");
    $num = mysqli_fetch_array($ret);
    
    if ($num > 0) {
        // If patient found, proceed with payment
        $extra = "payment-success.php"; // Redirect to success page after payment
        $_SESSION['patient'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        
        $amount = $_POST['amount']; // Payment amount
        $paymentMethod = $_POST['payment_method']; // Payment method
        $uip = $_SERVER['REMOTE_ADDR']; // User IP

        // Inserting payment details into the payments table
        $log = mysqli_query($con, "INSERT INTO payments(patient_id, amount, payment_method, userip) 
                                    VALUES('" . $_SESSION['id'] . "', '$amount', '$paymentMethod', '$uip')");
        
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        // If patient not found, show error message
        $_SESSION['errmsg'] = "Invalid patient email or details";
        $extra = "payment.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HMS | Payment Form</title>

    <!-- Include Bootstrap, FontAwesome and Custom Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
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
        body.payment {
            background: url('https://images.unsplash.com/photo-1615461066159-fea0960485d5?q=80&w=1616&auto=format&fit=crop&ixlib=rb-4.0.3') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Times New Roman', serif;
        }

        .box-payment {
            background-color: #D2B48C;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: 'Times New Roman', serif;
            color: brown;
        }

        .box-payment .form-actions a {
            color: brown;
        }

        .form-payment .form-group input::placeholder {
            color: #A0522D;
        }

        .box-payment .form-payment {
            font-family: 'Times New Roman', serif;
            color: brown;
        }

        .logo h2 {
            font-family: 'Times New Roman', serif;
            font-weight: bold;
            color: white;
        }

        legend {
            font-family: 'Times New Roman', serif;
        }

        .form-payment .form-group input,
        .form-payment .form-group select {
            font-family: 'Times New Roman', serif;
        }

        .form-payment .form-actions button {
            font-family: 'Times New Roman', serif;
        }

        .copyright {
            font-family: 'Times New Roman', serif;
        }
    </style>
</head>

<body class="payment">
    <div class="row">
        <div class="main-payment col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <a href="../index.html"><h2> HMS | Payment Form</h2></a>
            </div>

            <div class="box-payment">
                <form class="form-payment" method="post">
                    <fieldset>
                        <legend>
                            Make a Payment
                        </legend>
                        <p>
                            Please enter the required details to proceed with the payment.<br />
                            <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="email" placeholder="Patient Email" required>
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="input-icon">
                                <input type="number" class="form-control" name="amount" placeholder="Payment Amount" required>
                                <i class="fa fa-money"></i>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="input-icon">
                                <select class="form-control" name="payment_method" required>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Debit Card">Debit Card</option>
                                    <option value="Net Banking">Net Banking</option>
                                    <option value="Cash">Cash</option>
                                </select>
                                <i class="fa fa-credit-card"></i>
                            </span>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Pay Now <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>

                <div class="copyright">
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
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
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    // Wait for the DOM to load
$(document).ready(function () {
    // Form validation on submit
    $("form").submit(function (event) {
        var email = $("input[name='email']").val();
        var amount = $("input[name='amount']").val();
        var paymentMethod = $("select[name='payment_method']").val();

        // Validate email
        if (!validateEmail(email)) {
            alert("Please enter a valid email.");
            event.preventDefault(); // Prevent form submission
            return false;
        }

        // Validate amount
        if (amount <= 0 || isNaN(amount)) {
            alert("Please enter a valid payment amount.");
            event.preventDefault();
            return false;
        }

        // Confirm submission
        var confirmSubmit = confirm("Are you sure you want to proceed with the payment?");
        if (!confirmSubmit) {
            event.preventDefault();
            return false;
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Handling payment method selection
    $("select[name='payment_method']").change(function () {
        var selectedMethod = $(this).val();

        if (selectedMethod === "Credit Card" || selectedMethod === "Debit Card") {
            // Show fields specific to card payments
            $("#card-details").show();
        } else {
            // Hide card details if another payment method is selected
            $("#card-details").hide();
        }
    });

    // Real-time field validation: email
    $("input[name='email']").on("input", function () {
        var email = $(this).val();
        if (validateEmail(email)) {
            $(this).css("border-color", "green");
        } else {
            $(this).css("border-color", "red");
        }
    });

    // Real-time field validation: amount
    $("input[name='amount']").on("input", function () {
        var amount = $(this).val();
        if (amount > 0 && !isNaN(amount)) {
            $(this).css("border-color", "green");
        } else {
            $(this).css("border-color", "red");
        }
    });
});
</script>
</body>
</html>
