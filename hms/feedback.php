<?php
session_start();
error_reporting(0);
include('include/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patient_name = $_POST['patient_name'];
    $patient_email = $_POST['patient_email'];
    $feedback_text = $_POST['feedback_text'];
    $rating = $_POST['rating'];

    // Insert the feedback into the database
    $query = "INSERT INTO patient_feedback (patient_name, patient_email, feedback_text, rating) 
              VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $patient_name, $patient_email, $feedback_text, $rating);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Thank you for your feedback!";
    } else {
        $_SESSION['error_message'] = "Error submitting feedback. Please try again.";
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit Feedback</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <style>
        body, h1, h5, .breadcrumb {
            font-family: 'Times New Roman', Times, serif !important;
        }

        body {
            background-image: url('https://www.etkho.com/wp-content/uploads/2022/11/importancia_color_en_hospitales_pic03_20221122_etkho_hospital_engineering.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #000;
        }

        .container-fullw {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .feedback-form {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1.mainTitle, h5.over-title {
            color: #1c5d99;
        }

        h1.mainTitle {
            font-size: 32px;
            font-weight: bold;
        }

        .btn-submit {
            background-color: #1c5d99;
            color: #fff;
            border: none;
        }

        .btn-submit:hover {
            background-color: #007bff;
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
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Submit Feedback</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Feedback</span>
                                </li>
                                <li class="active">
                                    <span>Submit Feedback</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Provide <span class="text-bold">Feedback</span></h5>

                                <!-- Display Feedback Messages -->
                                <?php if (!empty($_SESSION['success_message'])): ?>
                                    <div class="alert alert-success">
                                        <?= $_SESSION['success_message']; ?>
                                    </div>
                                    <?php unset($_SESSION['success_message']); ?>
                                <?php elseif (!empty($_SESSION['error_message'])): ?>
                                    <div class="alert alert-danger">
                                        <?= $_SESSION['error_message']; ?>
                                    </div>
                                    <?php unset($_SESSION['error_message']); ?>
                                <?php endif; ?>

                                <!-- Feedback Form -->
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="patient_name">Name</label>
                                        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="patient_email">Email</label>
                                        <input type="email" class="form-control" id="patient_email" name="patient_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback_text">Feedback</label>
                                        <textarea class="form-control" id="feedback_text" name="feedback_text" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Rating (1-5)</label>
                                        <select class="form-control" id="rating" name="rating" required>
                                            <option value="5">5 - Excellent</option>
                                            <option value="4">4 - Very Good</option>
                                            <option value="3">3 - Good</option>
                                            <option value="2">2 - Fair</option>
                                            <option value="1">1 - Poor</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit">Submit Feedback</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('include/footer.php'); ?>
        <?php include('include/setting.php'); ?>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
