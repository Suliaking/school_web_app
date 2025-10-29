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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Freedash Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                            <?php
                            // Get current hour in 24-hour format
                            $hour = date("H");
                            $time_of_day = '';
                            // Determine the time of day
                            if ($hour >= 5 && $hour < 12) {
                                $time_of_day = "Morning";
                            } elseif ($hour >= 12 && $hour < 17) {
                                $time_of_day = "Afternoon";
                            } else {
                                $time_of_day = "Evening";
                            }
                            ?>
                            Good <?php echo $time_of_day . ' ' . $username; ?>!
                        </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
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
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo number_format($airtimeBalance, 2); ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Airtime
                                            Amount</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <label class="form-label mb-0">
                                                    ₦<?php echo number_format($walletBalance, 2); ?>
                                                </label>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                            Balance
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted">₦</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo $class; ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Class
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="book"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                            <?php echo $phoneNumber; ?>
                                        </h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Phone number
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="phone"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Sales</h4>
                                <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                                <ul class="list-style-none mb-0">
                                    <li>
                                        <i class="fas fa-circle text-primary font-10 me-2"></i>
                                        <span class="text-muted">Direct Sales</span>
                                        <span class="text-dark float-end font-weight-medium">$2346</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-danger font-10 me-2"></i>
                                        <span class="text-muted">Referral Sales</span>
                                        <span class="text-dark float-end font-weight-medium">$2108</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-cyan font-10 me-2"></i>
                                        <span class="text-muted">Affiliate Sales</span>
                                        <span class="text-dark float-end font-weight-medium">$1204</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Net Income</h4>
                                <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                                <ul class="list-inline text-center mt-5 mb-2">
                                    <li class="list-inline-item text-muted fst-italic">Sales for this month</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Earning by Location</h4>
                                <div class="" style="height:180px">
                                    <div id="visitbylocate" style="height:100%"></div>
                                </div>
                                <div class="row mb-3 align-items-center mt-1 mt-5">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">India</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">UK</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">USA</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4 text-end">
                                        <span class="text-muted font-14">China</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Sales Charts Section -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Class Timetable Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Class Timetable</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Time</th>
                                                <th>Monday</th>
                                                <th>Tuesday</th>
                                                <th>Wednesday</th>
                                                <th>Thursday</th>
                                                <th>Friday</th>
                                                <th class="text-end">Actions</th> <!-- Right alignment -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            include '../connect.php';

                                            $class = $userDetails["class"]; // you can get this dynamically based on the logged-in teacher or class selection
                                            
                                            $sql = "SELECT * FROM class_timetable WHERE class = ? ORDER BY id";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("s", $class);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $from = $row['time_from'];
                                                    $to = $row['time_to'];

                                                    echo "<tr>";
                                                    echo "<th>{$from} - {$to}</th>";
                                                    echo "<td>" . $row['monday'] . "</td>";
                                                    echo "<td>" . $row['tuesday'] . "</td>";
                                                    echo "<td>" . $row['wednesday'] . "</td>";
                                                    echo "<td>" . $row['thursday'] . "</td>";
                                                    echo "<td>" . $row['friday'] . "</td>";
                                                    echo "<td>";
                                                    echo "<button 
                                                            type='button' 
                                                            class='btn btn-warning btn-sm me-2 editBtn'
                                                            data-id='{$row['id']}'
                                                            data-from='{$row['time_from']}'
                                                            data-to='{$row['time_to']}'
                                                            data-monday='{$row['monday']}'
                                                            data-tuesday='{$row['tuesday']}'
                                                            data-wednesday='{$row['wednesday']}'
                                                            data-thursday='{$row['thursday']}'
                                                            data-friday='{$row['friday']}'
                                                            data-bs-toggle='modal' 
                                                            data-bs-target='#updateModal'>
                                                            Edit
                                                        </button>";

                                                    echo "<a href='delete_timetable.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?')\">Delete</a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='6'>No timetable available</td></tr>";
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- Button to Trigger Modal -->
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#timetableModal">
                                        Add Timetable
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="timetableModal" tabindex="-1"
                                        aria-labelledby="timetableModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="timetableModalLabel">Add Timetable</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="add_timetable.php" method="POST" class="row g-3 p-3">

                                                    <input type="hidden" name="class"
                                                        value="<?php echo $userDetails["class"]; ?>">

                                                    <div class="col-md-2">
                                                        <label>From</label>
                                                        <input type="time" name="time_from" class="form-control"
                                                            required>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>To</label>
                                                        <input type="time" name="time_to" class="form-control" required>
                                                    </div>

                                                    <?php
                                                    $user_name = $_SESSION["username"];
                                                    $query = "SELECT DISTINCT subjectName FROM student_subject WHERE created_by = '$user_name'";
                                                    $result = mysqli_query($conn, $query);
                                                    ?>

                                                    <?php
                                                    function subjectDropdown($day, $result)
                                                    {
                                                        echo '<div class="col-md">';
                                                        echo '<label>' . ucfirst($day) . '</label>';
                                                        echo '<select name="' . $day . '" class="form-control">';
                                                        echo '<option value="">Select Subject</option>';

                                                        mysqli_data_seek($result, 0); // reset pointer for reuse
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '<option value="' . $row['subjectName'] . '">' . $row['subjectName'] . '</option>';
                                                        }

                                                        echo '</select>';
                                                        echo '</div>';
                                                    }

                                                    $days = ["monday", "tuesday", "wednesday", "thursday", "friday"];
                                                    foreach ($days as $day) {
                                                        subjectDropdown($day, $result);
                                                    }

                                                    ?>

                                                    <div class="col-md-12 d-grid mt-3">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Class Timetable Section -->
                <!-- *************************************************************** -->

                <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="updateForm" action="update_timetable.php" method="POST" class="modal-content">

                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Update Timetable</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body row g-3">

                                <input type="hidden" name="id" id="edit_id">

                                <div class="col-md-6">
                                    <label>From</label>
                                    <input type="time" name="time_from" id="edit_from" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>To</label>
                                    <input type="time" name="time_to" id="edit_to" class="form-control">
                                </div>

                                <?php
                                mysqli_data_seek($result, 0);
                                $days = ["monday", "tuesday", "wednesday", "thursday", "friday"];
                                foreach ($days as $day) {
                                    echo '<div class="col-md">';
                                    echo '<label>' . ucfirst($day) . '</label>';
                                    echo '<select name="' . $day . '" id="edit_' . $day . '" class="form-control">';
                                    echo '<option name="subjectName" value="subjectName">Select Subject</option>';
                                    mysqli_data_seek($result, 0);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['subjectName'] . '">' . $row['subjectName'] . '</option>';
                                    }
                                    echo '</select></div>';
                                }
                                ?>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning" name="update" >Update</button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- *************************************************************** -->
                <!-- Start Students Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Students</h4>
                                    <div class="ms-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item"
                                                    href="../school.php?showSignupModal=true">Signup a student</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Name
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Class
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Phone Number
                                                </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>


                                                <?php
                                                include '../connect.php'; // Include database connection
                                                
                                                // Ensure $class, $term, and $username are set
                                                if (isset($class)) {

                                                    $class = trim($class);


                                                    // Fetch subjects from the database
                                                    $query = "SELECT username,first_name,last_name, email,phoneNumber,class,term  FROM register 
                                                    WHERE TRIM(class)='$class'";
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
                                                        echo "<td  class='border-top-0 px-2 py-4'><div class='d-flex no-block align-items-center'>
                                                        <div class='me-3'><img
                                                                src='../profile_image_upload/{$row['username']}.jpg'
                                                                alt='user' class='rounded-circle' width='45'
                                                                height='45' /></div>
                                                        <div class=''>
                                                            <h5 class='text-dark mb-0 font-16 font-weight-medium'>{$row['first_name']}  {$row['last_name']}</h5>
                                                            <span class='text-muted font-14'>{$row['email']}</span>
                                                        </div>
                                                    </div>
                                                    </td>";
                                                        echo "<td>{$row['class']}</td>";
                                                        echo "<td>{$row['phoneNumber']}</td>";

                                                        echo "</tr>";
                                                        $no++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6' class='text-center'>No data found for user</td></tr>";
                                                }
                                                ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Students Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'profilemodal.php'; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- Profile Modal -->

        <?php include 'wallet.php'; ?>

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../src/dist/js/app-style-switcher.js"></script>
    <script src="../src/dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../src/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../src/dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script>
        //image preview
        document.getElementById("profile-pic-upload").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("profile-pic-preview").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

    </script>
    <script>
        const options = { month: 'long', year: 'numeric' };
        const currentDate = new Date().toLocaleDateString('en-US', options);
        document.getElementById('currentMonthYear').value = currentDate;
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const editButtons = document.querySelectorAll(".editBtn");

            editButtons.forEach(button => {
                button.addEventListener("click", () => {
                    document.getElementById("edit_id").value = button.dataset.id;
                    document.getElementById("edit_from").value = button.dataset.from;
                    document.getElementById("edit_to").value = button.dataset.to;
                    document.getElementById("edit_monday").value = button.dataset.monday;
                    document.getElementById("edit_tuesday").value = button.dataset.tuesday;
                    document.getElementById("edit_wednesday").value = button.dataset.wednesday;
                    document.getElementById("edit_thursday").value = button.dataset.thursday;
                    document.getElementById("edit_friday").value = button.dataset.friday;
                });
            });
        });
    </script>


</body>

</html>