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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/king-school.png">
    <title>Student Dashboard - Services</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
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
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Services</li>
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
            <!-- Container fluid -->
            <!-- ============================================================== -->
            <form action="pay_for_service.php" method="post">
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="card shadow-sm border-primary">
                            <div class="card-body" style="background-color: #e9f5ff;">
                                <h4 class="card-title text-primary mb-3">Buy Airtime</h4>
                                <div class="input-group">
                                    <input type="number" class="form-control border-primary" name="airtime_amount"
                                        placeholder="Enter Airtime Amount" aria-label="Airtime Amount"
                                        id="inputGroupAmount04" style="background-color: #ffffff;">
                                    <button class="btn btn-outline-primary" type="submit" name="service"
                                        value="airtime">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="card shadow-sm border-success">
                            <div class="card-body" style="background-color: #e9f9ee;">
                                <h4 class="card-title text-success mb-3">Pay School-Fee</h4>
                                <div class="input-group">
                                    <select class="form-select border-success" name="school_fee_amount"
                                        id="inputGroupSelect05" style="background-color: #ffffff;">
                                        <option value="">Choose...</option>
                                        <option value="10000">10,000</option>
                                        <option value="20000">20,000</option>
                                        <option value="30000">30,000</option>
                                    </select>
                                    <button class="btn btn-outline-success" type="submit" name="service"
                                        value="school_fee">Pay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="pay_for_service2.php" method="post">
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="card shadow-sm border-warning">
                            <div class="card-body" style="background-color: #fff9e6;">
                                <h4 class="card-title text-warning mb-3">Buy Airtime For Friend</h4>
                                <div class="input-group">
                                    <input type="number" class="form-control border-warning" name="phonenumber"
                                        placeholder="Enter Phone Number" aria-label="Airtime Amount"
                                        id="inputGroupAmount04" style="background-color: #ffffff;">
                                    <input type="number" class="form-control border-warning" name="airtime_amount"
                                        placeholder="Enter Airtime Amount" aria-label="Airtime Amount"
                                        id="inputGroupAmount04" style="background-color: #ffffff;">
                                    <button class="btn btn-outline-warning" type="submit" name="service"
                                        value="airtime">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- ============================================================== -->
            <!-- End Container fluid -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php'; ?>

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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>
    <script>
        const options = { month: 'long', year: 'numeric' };
        const currentDate = new Date().toLocaleDateString('en-US', options);
        document.getElementById('currentMonthYear').value = currentDate;
    </script>
</body>

</html>