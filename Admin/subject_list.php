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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Subject List</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Create Subject
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            <select
                                class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 23</option>
                                <option value="1">July 23</option>
                                <option value="2">Jun 23</option>
                            </select>
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


                                <div class="btn-list">
                                    <button type="button" class="btn waves-effect waves-light btn-lg btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#create-subject-modal">Create Subject
                                    </button>
                                </div>

                                <div id="create-subject-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="#" class="text-success">
                                                        <span>
                                                            <img class="me-2" src="../assets/images/king-school.png"
                                                                alt="" height="18">
                                                            <img src="../assets/images/king-school-text.png" alt=""
                                                                height="18">
                                                        </span>
                                                    </a>
                                                </div>


                                                <!-- Profile Picture Upload Section -->
                                                <div class="text-center mb-3 position-relative">
                                                    <label for="profile-pic-upload" class="position-relative">
                                                        <img id="profile-pic-preview"
                                                        src="<?php echo $profilePic; ?>" alt="Profile Picture"
                                                            class="rounded-circle border border-secondary" width="100"
                                                            height="100" style="cursor: pointer;" disabled>
                                                    </label>
                                                </div>

                                                <!-- Profile Edit Form -->
                                                <form class="ps-3 pe-3" action="add_subject.php" method="POST">
                                                    <div class="form-group mb-3">
                                                        <!-- Hidden Username Input -->
                                                        <input class="form-control" type="text" name="username"
                                                            id="username" required hidden
                                                            value="<?php echo $username; ?>">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <!-- Readonly Class -->
                                                                        <input type="text" class="form-control"
                                                                            name="class" value="<?php echo $class ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>

                                                                <!-- Create Subject Input -->
                                                                <div class="mb-3">
                                                                    <label for="subjectName" class="form-label">Enter
                                                                        New Subject</label>
                                                                    <input type="text" class="form-control"
                                                                        name="subjectName" id="subjectName" required>
                                                                </div>

                                                                <!-- Fetch existing subjects (optional display) -->
                                                                <?php
                                                                include '../connect.php';

                                                                $query = "SELECT subjectName FROM student_subject WHERE class='$class'";
                                                                $result = $conn->query($query);

                                                                if ($result->num_rows > 0) {
                                                                    echo "<label class='form-label'>Subjects Already Added</label>";
                                                                    echo "<ul class='list-group'>";
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        echo "<li class='list-group-item'>" . htmlspecialchars($row['subjectName']) . "</li>";
                                                                    }
                                                                    echo "</ul>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="form-group mb-3 text-center">
                                                        <button class="btn btn-primary btn-rounded" type="submit"
                                                            name="student_subject">Create Subject</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <div class="table-responsive">

                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                                <th>Create Questions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../connect.php'; // Include database connection
                                            
                                            // Ensure $class, and $username are set
                                            if (isset($class, $user_name)) {

                                                $class = trim($class);
                                                $user_name = trim($user_name);

                                                // Fetch subjects from the database
                                                $query = "SELECT id, subjectName, class FROM student_subject 
                                                WHERE TRIM(class)='$class' order by subjectName asc";
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
                                                    echo "<td>{$row['subjectName']}</td>";
                                                    echo "<td>{$row['class']}</td>";
                                                    echo "<td><a href='deleteSubject.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this?\")'>Delete</a></td>";
                                                    echo "<td><a href='questions.php?subjectName={$row['subjectName']}&class={$row['class']}' class='btn btn-primary'>View Questions</a></td>";
                                                    echo "</tr>";
                                                    $no++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No data found for user</td></tr>";
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
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
</body>

</html>