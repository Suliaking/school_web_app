<?php
echo '
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            <div class="navbar-brand">
                <a href="index.html">
                    <img src="assets/images/icon.png" alt="Logo" class="img-fluid">
                </a>
            </div>

            <a class="topbartoggler d-block d-lg-none waves-effect waves-light"
               href="javascript:void(0)"
               data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent"
               aria-expanded="false"
               aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle position-relative" href="#" id="bell" data-bs-toggle="dropdown">
                        <i data-feather="bell"></i>
                        <span class="badge text-bg-primary notify-no rounded-circle">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative">
                                    <!-- Sample Messages -->
                                    <a href="#" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <div class="btn btn-danger rounded-circle btn-circle">
                                            <i data-feather="airplay" class="text-white"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6 class="mb-0">Launch Admin</h6>
                                            <span class="font-12 text-muted">New version available</span>
                                            <span class="font-12 text-muted">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Add more messages if needed -->
                                </div>
                            </li>
                            <li>
                                <a class="nav-link pt-3 text-center text-dark" href="#">
                                    <strong>Check all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Language selector -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="#">
                        <div class="customize-input">
                            <select class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                <option selected>EN</option>
                                <option value="1">AB</option>
                                <option value="2">AK</option>
                                <option value="3">BE</option>
                            </select>
                        </div>
                    </a>
                </li>
            </ul>

            <!-- Right side nav items -->
            <ul class="navbar-nav float-end">
                <!-- Search -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="#">
                        <form>
                            <div class="customize-input">
                                <input type="search" class="form-control custom-shadow custom-radius border-0 bg-white" placeholder="Search" aria-label="Search">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li>

                <!-- User Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <img src="' . ($profilePic ?? 'assets/images/default.png') . '" alt="user" class="rounded-circle" width="40">
                        <span class="ms-2 d-none d-lg-inline-block">
                            <span>Hello,</span>
                            <span class="text-dark">' . $username . '</span>
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end animated flipInY">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile-modal">
                            <i data-feather="user" class="me-2"></i> My Profile
                        </a>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateprofilemodal">
                            <i data-feather="edit" class="me-2"></i> Update Profile
                        </a>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#wallet-modal">
                            <i data-feather="credit-card" class="me-2"></i> Wallet
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i data-feather="settings" class="me-2"></i> Account Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i data-feather="power" class="me-2 text-danger"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
';
?>
