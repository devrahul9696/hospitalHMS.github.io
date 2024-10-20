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
    
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="vendor/switchery/switchery.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css">
    
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    
    <style>
      
        body {
            font-family: 'Times New Roman', serif;
            background-image: url('https://media.licdn.com/dms/image/v2/D4D12AQEzBgIZ13UOig/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1692875112654?e=2147483647&v=beta&t=ugrcWDMqy1ZAp5Vu9t93IxEcRCIDRLfQsCwLU8GnYis');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }

        .panel-white {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1.mainTitle {
            color: #fff;
            font-weight: bold;
        }

        .form-control {
            font-family: 'Times New Roman', serif;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #45A049;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45A049;
            border-color: #3E8E41;
        }

        .breadcrumb {
            background-color: transparent;
        }

        .breadcrumb > li > span {
            font-size: 16px;
            color: #fff;
        }

        table.table {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin-top: 20px;
        }

        table.table th, table.table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table.table thead th {
            background-color: #f2f2f2;
            color: #333;
        }

        table.table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a i.fa-eye {
            color: #4CAF50;
            font-size: 20px;
        }
		label[for="doctorname"] {
			color: black;
    font-weight: bold;
}
        h4 {
            color: #333;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
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
                                <h1 class="mainTitle">Admin | View Patients</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>View Patients</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <form role="form" method="post" name="search">
                                        <div class="form-group">
                                            <label for="doctorname">Search by Name/Mobile No.</label>
                                            <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
                                        </div>
                                        <button type="submit" name="search" id="submit" class="btn btn-primary">Search</button>
                                    </form>

                                    <?php
                                    if (isset($_POST['search'])) {
                                        $sdata = $_POST['searchdata'];
                                    ?>
                                        <h4>Result against "<?php echo $sdata; ?>" keyword</h4>
                                        <table class="table table-hover" id="sample-table-1">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Patient Name</th>
                                                    <th>Patient Contact Number</th>
                                                    <th>Patient Gender</th>
                                                    <th>Creation Date</th>
                                                    <th>Updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE PatientName LIKE '%$sdata%' || PatientContno LIKE '%$sdata%'");
                                                $num = mysqli_num_rows($sql);
                                                if ($num > 0) {
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                        <tr>
                                                            <td class="center"><?php echo $cnt; ?>.</td>
                                                            <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                                                            <td><?php echo $row['PatientContno']; ?></td>
                                                            <td><?php echo $row['PatientGender']; ?></td>
                                                            <td><?php echo $row['CreationDate']; ?></td>
                                                            <td><?php echo $row['UpdationDate']; ?></td>
                                                            <td>
                                                                <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $cnt = $cnt + 1;
                                                    }
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td colspan="8">No record found against this search</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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
