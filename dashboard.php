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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>King School</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
    <link href="src/dist/css/style.css" rel="stylesheet">
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
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- Optional: Auto-slide script if you want to control timing -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-start border-4 border-primary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo number_format($airtimeBalance, 2); ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Airtime
                                            Balance</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-primary fs-3"><i data-feather="smartphone"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-start border-4 border-success shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                ₦<?php echo number_format($walletBalance, 2); ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Balance</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-success fs-3">₦</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-start border-4 border-info shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo $class; ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Class</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-info fs-3"><i data-feather="book"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-start border-4 border-warning shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                            <?php echo $term; ?>
                                        </h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Term</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="text-warning fs-3"><i data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- ============================================================== -->
                <!-- Quote Carousel Section -->
                <!-- ============================================================== -->
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-3"> <!-- Centered in page -->
                        <div class="card shadow-lg border-0" style="background: #f7f9fc;"> <!-- Light background -->
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4" style="color: #2c3e50;">Quote of the Moment</h5>
                                <div id="quoteCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner text-center text-dark">
                                        <div class="carousel-item active">
                                            <blockquote class="blockquote">
                                                <p class="mb-1" style="color: #34495e;">"Education is the most powerful
                                                    weapon which you can use to change the world."</p>
                                                <footer class="blockquote-footer mt-2 text-primary">Nelson Mandela
                                                </footer>
                                            </blockquote>
                                        </div>
                                        <div class="carousel-item">
                                            <blockquote class="blockquote">
                                                <p class="mb-1" style="color: #34495e;">"The expert in anything was once
                                                    a beginner."</p>
                                                <footer class="blockquote-footer mt-2 text-primary">Helen Hayes</footer>
                                            </blockquote>
                                        </div>
                                        <div class="carousel-item">
                                            <blockquote class="blockquote">
                                                <p class="mb-1" style="color: #34495e;">"Success is not final, failure
                                                    is not fatal: It is the courage to continue that counts."</p>
                                                <footer class="blockquote-footer mt-2 text-primary">Winston Churchill
                                                </footer>
                                            </blockquote>
                                        </div>
                                        <div class="carousel-item">
                                            <blockquote class="blockquote">
                                                <p class="mb-1" style="color: #34495e;">"Believe you can and you're
                                                    halfway there."</p>
                                                <footer class="blockquote-footer mt-2 text-primary">Theodore Roosevelt
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Quote Carousel Section -->
                <!-- ============================================================== -->

                <!-- *************************************************************** -->
                <!-- Start Upcoming Events & Exams Section -->
                <!-- *************************************************************** -->
                <div class="row mt-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="card border-0 shadow-lg" style="background-color: #f0f4f8;">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-center text-primary" style="font-weight: 600;">Upcoming
                                    Events & Exams</h4>
                                <div class="row">

                                    <!-- Event 1 -->
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 border-0 shadow-sm"
                                            style="background-color: #ffffff; border-left: 5px solid #007bff;">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark">📘 Mathematics Exam</h5>
                                                <p class="card-text text-muted">
                                                    <strong>Date:</strong> <span class="text-dark">June 25,
                                                        2025</span><br>
                                                    <strong>Time:</strong> <span class="text-dark">9:00 AM</span><br>
                                                    <strong>Class:</strong> <span class="text-dark">Grade-5 to
                                                        Grade-13</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Event 2 -->
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 border-0 shadow-sm"
                                            style="background-color: #ffffff; border-left: 5px solid #28a745;">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark">🔬 Science Fair</h5>
                                                <p class="card-text text-muted">
                                                    <strong>Date:</strong> <span class="text-dark">June 28,
                                                        2025</span><br>
                                                    <strong>Location:</strong> <span class="text-dark">School
                                                        Hall</span><br>
                                                    <strong>Time:</strong> <span class="text-dark">11:00 AM</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Event 3 -->
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 border-0 shadow-sm"
                                            style="background-color: #ffffff; border-left: 5px solid #ffc107;">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark">📖 English Literature Test</h5>
                                                <p class="card-text text-muted">
                                                    <strong>Date:</strong> <span class="text-dark">July 2,
                                                        2025</span><br>
                                                    <strong>Time:</strong> <span class="text-dark">10:30 AM</span><br>
                                                    <strong>Class:</strong> <span class="text-dark">Grade-5 to
                                                        Grade-13</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards below as needed -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Upcoming Events & Exams Section -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- Start Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="assets/images/gallery1.jpg" class="d-block w-100" alt="Slide 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery2.jpg" class="d-block w-100" alt="Slide 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery3.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery4.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery5.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery6.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery7.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/gallery8.jpg" class="d-block w-100" alt="Slide 3">
                                </div>
                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageSlider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Activity</h4>
                                <div class="mt-4 activity">
                                    <div class="d-flex align-items-start border-left-line pb-3">
                                        <div>
                                            <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">New Product Sold!</h5>
                                            <p class="font-14 mb-2 text-muted">John Musa just purchased <br> Cannon 5M
                                                Camera.
                                            </p>
                                            <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start border-left-line pb-3">
                                        <div>
                                            <a href="javascript:void(0)"
                                                class="btn btn-danger btn-circle mb-2 btn-item">
                                                <i data-feather="message-square"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">New Support Ticket</h5>
                                            <p class="font-14 mb-2 text-muted">Richardson just create support <br>
                                                ticket</p>
                                            <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start border-left-line">
                                        <div>
                                            <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                                <i data-feather="bell"></i>
                                            </a>
                                        </div>
                                        <div class="ms-3 mt-2">
                                            <h5 class="text-dark font-weight-medium mb-2">Notification Pending Order!
                                            </h5>
                                            <p class="font-14 mb-2 text-muted">One Pending order from Ryne <br> Doe</p>
                                            <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours
                                                Ago</span>
                                            <a href="javascript:void(0)"
                                                class="font-14 border-bottom pb-1 border-info">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>9:00 - 10:00</th>
                                                <td>Mathematics</td>
                                                <td>English</td>
                                                <td>Physics</td>
                                                <td>Biology</td>
                                                <td>Civic Education</td>
                                            </tr>
                                            <tr>
                                                <th>10:00 - 11:00</th>
                                                <td>English</td>
                                                <td>Biology</td>
                                                <td>Mathematics</td>
                                                <td>Chemistry</td>
                                                <td>Literature</td>
                                            </tr>
                                            <tr>
                                                <th>11:00 - 12:00</th>
                                                <td>Government</td>
                                                <td>Geography</td>
                                                <td>Chemistry</td>
                                                <td>Physics</td>
                                                <td>Economics</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>12:00 - 1:00</th>
                                                <td colspan="5"><strong>Break Time</strong></td>
                                            </tr>
                                            <tr>
                                                <th>1:00 - 2:00</th>
                                                <td>Economics</td>
                                                <td>Literature</td>
                                                <td>Government</td>
                                                <td>Mathematics</td>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th>2:00 - 3:00</th>
                                                <td>Biology</td>
                                                <td>Fine Art</td>
                                                <td>English</td>
                                                <td>Geography</td>
                                                <td>CRS</td>
                                            </tr>
                                            <tr>
                                                <th>3:00 - 4:00</th>
                                                <td>ICT</td>
                                                <td>CRS</td>
                                                <td>ICT</td>
                                                <td>Fine Art</td>
                                                <td>French</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Class Timetable Section -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
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
                                                include 'connect.php'; // Include database connection
                                                
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
                                                                src='profile_image_upload/{$row['username']}.jpg'
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
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!--profile modal-->
            <?php include 'profilemodal.php'; ?>


            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- update Profile Modal -->
        <?php include 'updateprofilemodal.php'; ?>

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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="src/dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script>
        const switcher = document.getElementById('themeSwitch');

        // Set saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
        switcher.checked = savedTheme === 'dark';

        switcher.addEventListener('change', function () {
            const theme = this.checked ? 'dark' : 'light';
            document.documentElement.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);
        });
    </script>
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
    <?php if (isset($_GET['openModal']) && $_GET['openModal'] === 'wallet'): ?>
        <script>
            $(document).ready(function () {

                $("#wallet-modal").modal('show');
            });
        </script>
    <?php endif; ?>
</body>
<script>
    var quoteCarousel = document.querySelector('#quoteCarousel');
    var carousel = new bootstrap.Carousel(quoteCarousel, {
        interval: 5000, // 5 seconds per quote
        ride: 'carousel',
        pause: false
    });
</script>

</html>