<!DOCTYPE html>
<?php include "session.php"; ?> 
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/king-school.png">
    <title>Freedash Template - The Ultimate Multipurpose admin template</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="../src/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>    

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include "topnavbar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include "leftsidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction History</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Transaction History</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            <input type="text" class="form-control bg-white border-0 custom-shadow custom-radius"
                                id="currentMonthYear" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                             

                                <div class="table-responsive">
                                
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Phone Number</th>
                                                <th>description</th>
                                                <th>amount</th>
                                                <th>transaction_date</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                include '../connect.php'; // Include database connection

                // Ensure $class, $term, and $username are set
                if (isset($class, $user_name)) {

                    $class = trim($class);
                    
                    $user_name = trim($user_name);
                                
                    // Fetch subjects from the database
                    $query = "SELECT phoneNumber, description, amount, transaction_date FROM transactions 
                            WHERE TRIM(username)='$user_name' order by id desc";
                    $result = $conn->query($query);

                  

                    if ($result === false) {
                        echo "Error: " . $conn->error; // Display SQL error if any
                    }
                }
               
        if (isset($result) && $result->num_rows > 0) {
            $no = 1; // Row counter
            while ($row = $result->fetch_assoc()) {
             
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$row['phoneNumber']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['amount']}</td>";
                echo "<td>{$row['transaction_date']}</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No data found for user</td></tr>";
        }
        ?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                            <th>No</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Term</th>
                                                <th>Score</th>
                                                <th>Total Score</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                    <!-- <ul class="pagination float-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php';  ?>
         
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <?php include 'profilemodal.php'; ?>

        <?php include 'wallet.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../src/dist/js/app-style-switcher.js"></script>
    <script src="../src/dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../src/dist/js/custom.min.js"></script>
    <script>
        const options = { month: 'long', year: 'numeric' };
        const currentDate = new Date().toLocaleDateString('en-US', options);
        document.getElementById('currentMonthYear').value = currentDate;
    </script>
</body>

</html>