<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Doctor Session Logs</title>
    
    <link href="https://fonts.googleapis.com/css?family=Times+New+Roman:400,700" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

    <style>
       body {
            font-family: 'Times New Roman', serif;
            background: url('https://media.licdn.com/dms/image/v2/D4D12AQEzBgIZ13UOig/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1692875112654?e=2147483647&v=beta&t=ugrcWDMqy1ZAp5Vu9t93IxEcRCIDRLfQsCwLU8GnYis') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }
        .container-fullw {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
        }
        h1, .breadcrumb, .table th, .table td {
            font-family: 'Times New Roman', serif;
        }
        .mainTitle {
            font-size: 28px;
            color: #2c3e50;
            text-shadow: 1px 1px 2px #bdc3c7;
        }
        .btn {
            font-family: 'Times New Roman', serif;
        }
        .page-title {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .table-hover>tbody>tr:hover {
            background-color: #f5f5f5;
        }
        .table thead {
            background-color: green;
            color: white;
        }
        .table {
            background-color: #f5deb3; 
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
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
                                <h1 class="mainTitle">Admin | Doctor Session Logs</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Admin</span></li>
                                <li class="active"><span>Doctor Session Logs</span></li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="hidden-xs">User ID</th>
                                            <th>Username</th>
                                            <th>User IP</th>
                                            <th>Login Time</th>
                                            <th>Logout Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($con, "select * from doctorslog ");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td class="center"><?php echo $cnt; ?>.</td>
                                                <td class="hidden-xs"><?php echo $row['uid']; ?></td>
                                                <td class="hidden-xs"><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['userip']; ?></td>
                                                <td><?php echo $row['loginTime']; ?></td>
                                                <td><?php echo $row['logout']; ?></td>
                                                <td><?php echo $row['status'] == 1 ? "Success" : "Failed"; ?></td>
                                            </tr>
                                        <?php
                                            $cnt++;
                                        } ?>
                                    </tbody>
                                </table>
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
    <script src="assets/js/main.js"></script>
</body>
</html>
