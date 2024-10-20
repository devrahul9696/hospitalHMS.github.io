<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission for adding new medicine
if (isset($_POST['add_medicine'])) {
    $medicine_name = $_POST['medicine_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $selling_price = $_POST['selling_price'];

    $query = "INSERT INTO tblpharmacy (MedicineName, Category, Quantity, SellingPrice) VALUES ('$medicine_name', '$category', '$quantity', '$selling_price')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Medicine added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding medicine: " . mysqli_error($con) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pharmacy Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,600|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0f4f7;
        }

        h1.mainTitle {
            color: #4a90e2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb {
            background-color: #ebeff2;
            border-radius: 8px;
            padding: 10px;
        }

        .form-group button, .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .form-group input {
            border: 2px solid #28a745;
            border-radius: 5px;
            padding: 10px;
            box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .table-hover th {
            background-color: #4a90e2;
            color: white;
        }

        .table-hover tr:hover {
            background-color: #eaf5fc;
        }

        .label-success {
            background-color: #28a745;
        }

        .btn-primary {
            background-color: #4a90e2;
            border: none;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .btn {
            margin-right: 10px;
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
                            <h1 class="mainTitle">Pharmacy Management</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Pharmacy</span>
                            </li>
                            <li class="active">
                                <span>Manage Inventory</span>
                            </li>
                        </ol>
                    </div>
                </section>

                <!-- Add new medicine form -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="post" action="pharmacy.php">
                                    <input type="text" name="medicine_name" class="form-control" placeholder="Medicine Name" required />
                                    <input type="text" name="category" class="form-control" placeholder="Category" required />
                                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" required />
                                    <input type="number" step="0.01" name="selling_price" class="form-control" placeholder="Selling Price" required />
                                    <button type="submit" name="add_medicine" class="btn btn-success">Add New Medicine</button>
                                </form>
                            </div>

                            <h5 class="over-title margin-bottom-15">Total Medicines: <span class="text-bold">[13]</span></h5>
                            <!-- Medicines table -->
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Medicine</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Selling Price</th>
                                        <th>Profit</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Fetch medicines from the database
                                $query = "SELECT * FROM tblpharmacy";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($medicine = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $medicine['id']; ?></td>
                                        <td><?php echo $medicine['MedicineName']; ?></td>
                                        <td><?php echo $medicine['Category']; ?></td>
                                        <td><?php echo $medicine['Quantity']; ?> (Tab)</td>
                                        <td><?php echo $medicine['SellingPrice']; ?></td>
                                        <td><?php echo isset($medicine['ProfitMargin']) ? $medicine['ProfitMargin'] : 'N/A'; ?></td>
                                        <td><span class="label label-success"><?php echo isset($medicine['Status']) ? $medicine['Status'] : 'Available'; ?></span></td>
                                        <td>
                                            <a href="edit-medicine.php?id=<?php echo $medicine['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="delete-medicine.php?id=<?php echo $medicine['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No medicines found.</td></tr>";
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
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    jQuery(document).ready(function() {
        $('#sample-table-1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search Medicines..."
            }
        });
    });
</script>
</body>
</html>
