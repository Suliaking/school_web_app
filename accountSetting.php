<!DOCTYPE html>
<?php include "session.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="src/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">

        <a href="dashboard.php" class="btn btn-outline-secondary rounded-circle p-2 mb-3" title="Back">
            <i class="bi bi-arrow-left"></i>
        </a>


        <!-- Profile Header -->
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body d-flex align-items-center gap-3">
                <img src=" <?php echo $profilePic ?> " alt="Profile" class="rounded-circle" width="70" height="70"
                    style="object-fit: cover;">
                <div>
                    <h4 class="mb-0">
                        <?php echo $user_name; ?>
                    </h4>
                    <small class="text-muted">Account Settings</small>
                </div>
            </div>
        </div>

        <!-- Settings Card -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body">

                <!-- Tabs -->
                <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#profile" role="tab">Profile
                            Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" data-bs-toggle="tab" href="#security" role="tab">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" data-bs-toggle="tab" href="#preferences" role="tab">Preferences</a>
                    </li>
                </ul>


                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- Profile Info Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <form class="row g-3" action="update_record.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control rounded-3" value="<?php echo $first_name ?>"
                                    name="first_name">
                            </div>
                            <div class="col-md-6"> 
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control rounded-3" value="<?php echo $last_name ?>"
                                    name="last_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control rounded-3" value="<?php echo $email ?>"
                                    name="email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-3" value="<?php echo $phoneNumber ?>"
                                    name="phone">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Class</label>
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="class">
                                        <option disabled selected><?php echo $class ?></option>
                                        <option value="Grade-1">Grade 1</option>
                                        <option value="Grade-2">Grade 2</option>
                                        <option value="Grade-3">Grade 3</option>
                                        <option value="Grade-4">Grade 4</option>
                                        <option value="Grade-5">Grade 5</option>
                                        <option value="Grade-6">Grade 6</option>
                                        <option value="Grade-7">Grade 7</option>
                                        <option value="Grade-8">Grade 8</option>
                                        <option value="Grade-9">Grade 9</option>
                                        <option value="Grade-10">Grade 10</option>
                                        <option value="Grade-11">Grade 11</option>
                                        <option value="Grade-12">Grade 12</option>
                                        <option value="Grade-13">Grade 13</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-rounded" type="submit" name="save_changes">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security">
                        <form class="row g-3" action="update_record.php" method="POST">
                            <div class="col-md-6">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control rounded-3" name="current_password">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control rounded-3" name="new_password">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control rounded-3" name="confirm_password">
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-danger px-4 rounded-3" name="update_password">Update Password</button>
                            </div>
                        </form>
                    </div>

                    <!-- Preferences Tab -->
                    <div class="tab-pane fade" id="preferences">
                        <form class="row g-3">
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="notify" checked>
                                    <label class="form-check-label">Email Notifications</label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-success px-4 rounded-3">Save Preferences</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>