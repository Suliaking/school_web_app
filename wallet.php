<?php

echo '

    <!-- Signup modal content -->
    <div id="wallet-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="#" class="text-success">
                                                        <span><img class="me-2" src="assets/images/logo-icon.png"
                                                                alt="" height="18"><img
                                                                src="assets/images/logo-text.png" alt=""
                                                                height="18"></span>
                                                    </a>
                                                </div>

                <!-- Profile Picture Upload Section -->
                <div class="text-center mb-3 position-relative">
                    <label for="profile-pic-upload" class="position-relative">
                        <img id="profile-pic-preview" 
                            src="' . $profilePic . ' "
                            alt="Profile Picture"
                            class="rounded-circle border border-secondary" width="100" height="100" 
                            style="cursor: pointer;">                   
                </div>
                                                <form class="ps-3 pe-3" action="topup.php" method="POST">

                                                    
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <label class="form-label mb-0"> Current Balance ₦'.number_format($walletBalance, 2).' </label>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="username">Phone number</label>
                                                        <input class="form-control" type="text" id="" value=" ' . $phoneNumber . ' " name="phone" readonly>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="form-label" for="username">Top up</label>
                                                        <input class="form-control" type="number" id="" name="topup_amount" required placeholder="Enter Top up amount">
                                                    </div>

                                                    <div class="form-group mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit" name="buy" >Top up</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
 

'



    ?>