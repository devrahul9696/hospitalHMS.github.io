<?php
session_start();
include('include/config.php');

// Fetch feedback data from the database, grouping by rating
$query = "SELECT rating, COUNT(*) as count FROM patient_feedback GROUP BY rating";
$result = mysqli_query($con, $query);

$ratings = [];
$counts = [];

// Process the data
while ($row = mysqli_fetch_assoc($result)) {
    $ratings[] = $row['rating']; // Ratings (1-5)
    $counts[] = $row['count'];   // Number of feedbacks for each rating
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Analytics - Feedback Data</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
      <style>
        body {
            font-family: 'Times New Roman', Times, serif !important;
            background-color: #eaeaea; /* Set your desired background color here */
            font-weight: bold; /* Make text bold */
            font-style: italic; /* Make text italic */
        }
        .chart-container {
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .container-fullw {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
        }
        h1.mainTitle, h5.over-title {
            color: #1c5d99;
        }
        h1.mainTitle {
            font-size: 32px;
            font-weight: bold;
        }
        .sidebar {
            background-color: #1c5d99;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #007bff;
        }
    </style>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Feedback Analytics</h1>
        <div class="row">
            <div class="col-md-6 chart-container">
                <h3 class="text-center">Column Chart - Feedback Ratings</h3>
                <canvas id="feedbackColumnChart"></canvas>
            </div>

            <div class="col-md-6 chart-container">
                <h3 class="text-center">Bar Chart - Feedback Distribution</h3>
                <canvas id="feedbackBarChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Data from PHP (ratings and feedback counts)
        const ratings = <?php echo json_encode($ratings); ?>;
        const counts = <?php echo json_encode($counts); ?>;

        // Column Chart
        const ctxColumn = document.getElementById('feedbackColumnChart').getContext('2d');
        const feedbackColumnChart = new Chart(ctxColumn, {
            type: 'bar',
            data: {
                labels: ratings.map(rating => `Rating: ${rating}`),  // Label each rating (1-5)
                datasets: [{
                    label: 'Number of Feedbacks',
                    data: counts,  // Number of feedbacks for each rating
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart (Horizontal)
        const ctxBar = document.getElementById('feedbackBarChart').getContext('2d');
        const feedbackBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ratings.map(rating => `Rating: ${rating}`),  // Labels for each rating (1-5)
                datasets: [{
                    label: 'Number of Feedbacks',
                    data: counts,  // Number of feedbacks for each rating
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',  // This makes the bar chart horizontal
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
