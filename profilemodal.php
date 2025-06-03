<?php

echo '
<div id="profile-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <a href="#" class="text-success">
                        <span>
                            <img class="me-2" src="assets/images/logo-icon.png" alt="" height="100">
                            <!-- <img src="assets/images/logo-text.png" alt="" height="70"> -->
                        </span>
                    </a>
                </div>
                <form class="ps-3 pe-3"  action="update_profile.php" method="POST" enctype="multipart/form-data">
                <!-- Profile Picture Upload Section -->
                <div class="text-center mb-3 position-relative">
                    <label for="profile-pic-upload" class="position-relative">
                        <img id="profile-pic-preview" 
                            src="' . $profilePic . ' "
                            alt="Profile Picture"
                            class="rounded-circle border border-secondary" width="100" height="100" 
                            style="cursor: pointer;">
                        
                        <!-- Camera Icon Button -->
                        <span class="position-absolute bottom-0 end-0 bg-primary text-white p-2 rounded-circle" 
                              style="cursor: pointer;">
                              <i class="fas fa-camera"></i> <!-- Bootstrap Icon -->
                        </span>

                    </label>
                    
                    <input type="file" id="profile-pic-upload" accept="image/*" class="d-none" name="image_upload">                   
                </div>

                <!-- Profile Edit Form -->
                <!-- <form class="ps-3 pe-3"  action="update_profile_pic.php" method="POST" enctype="multipart/form-data"> -->
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username"
                            required placeholder="Enter your name" value=" ' . $username . ' " readonly>
                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">First name</label>
                                                    <input type="text" class="form-control" value=" ' . $first_name . ' " readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Last</label>
                                                    <input type="text" class="form-control" value=" ' . $last_name . ' " readonly>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Class</label>
                                                    <input type="text" class="form-control" value=" ' . $class . ' " name="class"  readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Term</label>
                                                    <input type="text" class="form-control" value="' . $term . '" name="term" readonly>
                                                </div>
                                            </div>
                                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control" type="email" name="email" id="email"
                            required placeholder="Enter Email" value=" ' . $email . ' " readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-control" type="tel" name="phone" id="phone"
                            placeholder="Enter phone number"  value=" ' . $phoneNumber . ' " readonly>
                    </div>

                    <div class="form-group mb-3 text-center">
                        <button class="btn btn-primary btn-rounded" type="submit" name="save_changes">Upload image</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
';

?>