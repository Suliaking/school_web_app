<?php

echo '
<div id="updateprofilemodal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form class="ps-3 pe-3"  action="update_record.php" method="POST" enctype="multipart/form-data">
                <!-- Profile Picture Upload Section -->
                <div class="text-center mb-3 position-relative">
                    <label for="profile-pic-upload" class="position-relative">
                        <img id="profile-pic-preview" 
                            src="' . $profilePic . ' "
                            alt="Profile Picture"
                            class="rounded-circle border border-secondary" width="100" height="100" 
                            style="cursor: pointer;">                   
                </div>   

                <!-- Profile Edit Form -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">First name</label>
                                                    <input type="text" class="form-control" value="' . $first_name . ' "name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Last name</label>
                                                    <input type="text" class="form-control" value="' . $last_name . '" name="last_name">
                                                </div>
                                            </div>
                                        </div> 
                <form class="ps-3 pe-3"  action="update_record.php" method="POST" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Class</label>
                                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="class">
                                                        <option disabled selected>Select Class</option>
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

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control" type="email" name="email" id="email"
                            required placeholder="Enter Email" value="' . $email . '" name="email">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-control" type="tel" name="phone" id="phone"
                            placeholder="Enter phone number"  value="' . $phoneNumber . '" name="phone">
                </div>

                    <div class="form-group mb-3 text-center">
                        <button class="btn btn-primary btn-rounded" type="submit" name="save_changes">Save Changes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
';

?>