<?php
echo '
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="dashboard.php" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i data-feather="book" class="feather-icon"></i>
                        <span class="hide-menu">Academics</span>
                    </a>
                    <ul class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">Report Card</a></li>
                        <li class="sidebar-item"><a href="subject_list.php" class="sidebar-link">Subjects</a></li>
                        <li class="sidebar-item"><a href="test.php" class="sidebar-link">Tests</a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link" href="services.php" aria-expanded="false">
                        <i data-feather="briefcase" class="feather-icon"></i>
                        <span class="hide-menu">
                            Services
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="transaction_history.php" aria-expanded="false">
                        <i data-feather="credit-card" class="feather-icon"></i>
                        <span class="hide-menu">
                            Transaction History
                        </span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="logout.php" aria-expanded="false">
                        <i data-feather="log-out" style="color: red;" class="feather-icon"></i>
                        <span class="hide-menu" style="color: red;">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
';

?>