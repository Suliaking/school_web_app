<!DOCTYPE html>
<?php include "session.php";

// Check if 'id' is set in the URL
if (isset($_GET['subjectName'])) {
    $subjectName = $_GET['subjectName'];
    $class = $_GET['class'];
}

?>
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
    <title>Create Questions</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Questions</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Questions /
                                        <?php echo $subjectName; ?> / <?php echo $class; ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addQuestionModal">
                        Add New Question
                    </button>
                </div>
            </div>

            <!-- Add Question Modal -->

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
                                                <th>question</th>
                                                <th>Option A</th>
                                                <th>Option B</th>
                                                <th>Option C</th>
                                                <th>Option D</th>
                                                <th>Answer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../connect.php'; // Include database connection
                                            
                                            // Ensure $class are set
                                            if (isset($class, $user_name, $subjectName) && !empty($class) && !empty($subjectName)) {
                                                $query = "SELECT id, question, optionA, optionB, optionC, optionD, correct_option FROM questions 
                                                          WHERE TRIM(class)='$class' AND subject='$subjectName'";
                                                $result = $conn->query($query);
                                            }
                                            

                                            if (isset($result) && $result->num_rows > 0) {
                                                $no = 1; // Row counter
                                                while ($row = $result->fetch_assoc()) {

                                                    echo "<tr>";
                                                    echo "<td>{$no}</td>";
                                                    echo "<td>{$row['question']}</td>";
                                                    echo "<td>{$row['optionA']}</td>";
                                                    echo "<td>{$row['optionB']}</td>";
                                                    echo "<td>{$row['optionC']}</td>";
                                                    echo "<td>{$row['optionD']}</td>";
                                                    echo "<td>{$row['correct_option']}</td>";
                                                    echo "<td>
                                                            <button 
                                                                class='btn btn-warning btn-sm edit-btn' 
                                                                data-id='{$row['id']}'
                                                                data-question=\"" . htmlspecialchars($row['question'], ENT_QUOTES) . "\"
                                                                data-optiona=\"" . htmlspecialchars($row['optionA'], ENT_QUOTES) . "\"
                                                                data-optionb=\"" . htmlspecialchars($row['optionB'], ENT_QUOTES) . "\"
                                                                data-optionc=\"" . htmlspecialchars($row['optionC'], ENT_QUOTES) . "\"
                                                                data-optiond=\"" . htmlspecialchars($row['optionD'], ENT_QUOTES) . "\"
                                                                data-answer='{$row['correct_option']}'
                                                                data-bs-toggle='modal' 
                                                                data-bs-target='#addQuestionModal'
                                                            >Edit</button>
                                                    </td>";
                                                    echo "</tr>";
                                                    $no++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No available questions</td></tr>";
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

        <?php include 'wallet.php'; ?>

    </div>
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md"> <!-- You can change modal-lg to modal-md or modal-sm -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add New Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="add_question.php" method="POST">

                    <input type="hidden" name="id" id="question-id">

                    <input type="hidden" class="form-control" name="subject" value="<?php echo $subjectName; ?>"
                        readonly>
                    <input type="hidden" class="form-control" name="class" value="<?php echo $class; ?>" readonly>
                    <div class="modal-body">



                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <textarea class="form-control" name="question" id="edit-question" rows="3"
                                required></textarea>
                        </div>

                        <input type="text" class="form-control mb-2" name="optionA" id="edit-optionA" required>
                        <input type="text" class="form-control mb-2" name="optionB" id="edit-optionB" required>
                        <input type="text" class="form-control mb-2" name="optionC" id="edit-optionC" required>
                        <input type="text" class="form-control mb-2" name="optionD" id="edit-optionD" required>

                        <div class="mb-3">
                            <label for="correct_option" class="form-label">Correct Option</label>
                            <select class="form-select" name="correct_option" id="edit-answer" required>
                                <option value="">Select Correct Option</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="submit">Add Question</button>
                    </div>
                </form>
            </div>
        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('question-id').value = this.getAttribute('data-id');
                document.getElementById('edit-question').value = this.getAttribute('data-question');
                document.getElementById('edit-optionA').value = this.getAttribute('data-optiona');
                document.getElementById('edit-optionB').value = this.getAttribute('data-optionb');
                document.getElementById('edit-optionC').value = this.getAttribute('data-optionc');
                document.getElementById('edit-optionD').value = this.getAttribute('data-optiond');
                document.getElementById('edit-answer').value = this.getAttribute('data-answer');

                // Change modal title & button text for edit mode
                document.getElementById('addQuestionModalLabel').textContent = 'Edit Question';
                document.querySelector('#addQuestionModal button[type="submit"]').textContent = 'Update Question';
            });
        });
    });
</script>


</html>