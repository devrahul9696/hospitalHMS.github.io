<?php
session_start();

// Create a database connection
$con = mysqli_connect("localhost", "root", "", "test"); // Update 'test' to your database name

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $patient_id = $_POST['patient_id'];
    $services = $_POST['services'];
    $total_amount = $_POST['total_amount'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO billing (patient_id, services, total_amount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $patient_id, $services, $total_amount); // ssd: two strings and one decimal

    // Execute the query and check if successful
    if ($stmt->execute()) {
        // If successful, redirect to another page to display billing details
        header("Location: billing_output.php?patient_id=" . urlencode($patient_id));
        exit();
    } else {
        // If an error occurs, set an error message in the session
        $_SESSION['errormsg'] = "Error generating the bill: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generate Bill</title>
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

        .billing-form {
            margin-top: 100px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            font-size: 16px;
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ccc;
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

        .alert {
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .billing-form {
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
            <div class="main-billing col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="billing-form">
                    <h2>Generate Bill</h2>

                    <!-- Display any error messages -->
                    <?php if (isset($_SESSION['errormsg'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo htmlentities($_SESSION['errormsg']); unset($_SESSION['errormsg']); ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="billing.php" id="billingForm">
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                        </div>
                        <div class="form-group">
                            <label for="services">Services Provided</label>
                            <textarea class="form-control" id="services" name="services" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Bill</button>
                    </form>
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

    <!-- Form validation -->
    <script>
        $(document).ready(function() {
            $('#billingForm').on('submit', function(event) {
                var isValid = true;
                var patient_id = $('#patient_id').val().trim();
                var services = $('#services').val().trim();
                var total_amount = $('#total_amount').val().trim();

                if (patient_id === '' || services === '' || total_amount === '') {
                    isValid = false;
                    alert('Please fill in all fields.');
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
