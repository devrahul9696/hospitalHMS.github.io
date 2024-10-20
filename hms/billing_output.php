<?php
session_start();

// Include the database connection configuration
$con = mysqli_connect("localhost", "root", "", "test"); // Replace 'test' with your actual database name

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch patient_id from the query string
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

if ($patient_id) {
    // Prepare and execute the SQL query to retrieve billing details
    $query = "SELECT * FROM billing WHERE patient_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $billing_data = $result->fetch_assoc();

    // Check if billing details were found
    if (!$billing_data) {
        $_SESSION['errormsg'] = "No billing information found for Patient ID: " . htmlentities($patient_id);
        header("Location: billing.php");
        exit();
    }
} else {
    $_SESSION['errormsg'] = "No Patient ID provided.";
    header("Location: billing.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Billing Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Bootstrap and other CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color">

    <style>
        body {
            font-family: 'Times New Roman', serif;
            background: url('https://uttercode.com/products/images/hospital-managment-system.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .billing-details {
            margin-top: 100px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .table {
            background-color: white;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-actions {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .billing-details {
                margin-top: 50px;
            }
        }

        .copyright {
            text-align: center;
            margin-top: 15px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="billing-details">
                    <fieldset>
                        <legend>Billing Details</legend>

                        <table class="table table-bordered">
                            <tr>
                                <th>Patient ID</th>
                                <td><?php echo htmlentities($billing_data['patient_id']); ?></td>
                            </tr>
                            <tr>
                                <th>Services Provided</th>
                                <td><?php echo nl2br(htmlentities($billing_data['services'])); ?></td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td><?php echo htmlentities($billing_data['total_amount']); ?> USD</td>
                            </tr>
                            <tr>
                                <th>Billing Date</th>
                                <td><?php echo htmlentities($billing_data['created_at']); ?></td>
                            </tr>
                        </table>

                        <div class="form-actions">
                            <a href="billing.php" class="btn btn-primary">Back to Billing</a>
                        </div>
                    </fieldset>

                    <div class="copyright">
                        &copy; <span class="current-year"></span> <span class="text-bold text-uppercase">HMS</span>. <span>All rights reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Main initialization
        jQuery(document).ready(function () {
            Main.init();
        });

        // Display current year in the copyright section
        document.querySelector('.current-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
