<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Kings School</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../src/dist/css/style.min.css">
    <link rel="stylesheet" href="../src/dist/css/logo.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="landing-page">
        <header>
            <a href="#" class="logo">
                <img src="../assets/images/logo.png" alt="King School">
            </a>
            <ul class="links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php#">About Us</a></li>
                <li><a href="../index.php#gallery">Gallery</a></li>
                <li><a href="../index.php#info">Info</a></li>
                <!-- Dropdown Menu -->
                <li class="dropdown">
                    <span class="dropdown-toggle">Login ▾</span>
                    <ul class="dropdown-menu">
                        <li><a href="../school.php"><i class="icon">🎓</i> Student Login</a></li>
                    </ul>
                </li>
            </ul>
        </header>
    </div>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/big/2.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <form class="mt-4" action="login.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" name="username" for="uname">Username</label>
                                        <input class="form-control" id="uname" name="username" type="text"
                                            placeholder="enter your username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" name="password" type="password"
                                            placeholder="enter your password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" name="login" class="btn w-100 btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <div class="form-group mb-3 text-center">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#signup-modal">
                                            Sign Up
                                            Here
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- < class="modal-body"> -->
                                    <div class="text-center mt-2 mb-4">
                                        <a href="index.html" class="text-success">
                                            <span>
                                                <img class="me-2" src="../assets/images/logo-icon.png" alt=""
                                                    height="90">
                                                <!-- <img src="../assets/images/logo-text.png" alt="" > -->
                                            </span>
                                        </a>
                                    </div>
                                    <form class="ps-3 pe-3" action="insert.php" method="post">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" type="text" name="username" id="username"
                                                required="" placeholder="Enter your name">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">First name</label>
                                                    <input type="text" name="first_name" class="form-control"
                                                        placeholder="Enter First-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Last name</label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        placeholder="Enter Last-name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" name="email" id="emailaddress"
                                                required="" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="phoneNumber">Phone-Number</label>
                                            <input class="form-control" type="number" name="phoneNumber"
                                                id="phonenumber" required="" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="class">Class</label>
                                            <select class="form-select" name="class" id="inputGroupSelect01">
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
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control" type="password" name="password" required=""
                                                id="password" placeholder="Create password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="password">Confirm Password</label>
                                            <input class="form-control" type="password" name="confirmPassword"
                                                required="" id="password" placeholder="Confirm password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">
                                                    I
                                                    accept
                                                    <a href="#">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 text-center">
                                            <button class="btn btn-rounded btn-primary" name="submit" type="submit">
                                                Sign
                                                up
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>