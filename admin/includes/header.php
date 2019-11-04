<?php
 //*include('session.php');
    $year = date('Y');
?>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo" style="display: inline;">
                <!-- Image Logo -->
                <a href="dashboard.php?year=<?php echo $year; ?>" class="logo">
                    <img src="../assets/images/ipmsc.png" alt="" height="26" class="logo-small">
                    <img src="../assets/images/ipmsc.png" alt="" height="30" class="logo-large">
                    
                <h3 style="display: inline-block; font-family: 'Playfair Display', serif; font-size: 18px;">Inter-Pacific Study and Migration Consultancy</h3>
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/users/default-avatar.png" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name">Admin<i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                            <!-- item-->
                            <a href="messaging.php" class="dropdown-item notify-item">
                                <i class="icon-envelope"></i> <span>Messages</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item" id="sa-warning">
                                <i class="fi-power"></i> <span>Logout</span>
                            </a>

                        </div>
                    </li>
                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="dashboard.php?year=<?php echo $year; ?>"><i class="icon-speedometer"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-plus"></i>Entries</a>
                        <ul class="submenu">
                            <li><a href="list-student-tourist.php">Student / Tourist</a></li>
                            <li><a href="list-college-university.php">Colleges / Universities</a></li>
                            <li><a href="list-program-of-study.php">Program Of Study</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-user"></i>Matching</a>
                        <ul class="submenu">
                            <li><a href="matching-student.php">Student</a></li>
                            <li><a href="matching-tourist.php">Tourist</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-list"></i>Monitoring</a>
                        <ul class="submenu">
                            <li><a href="student_monitoring.php">Student</a></li>
                            <li><a href="monitoring_summary.php">Monitoring Summary</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-chart"></i>Reports</a>
                        <ul class="submenu">
                            <li><a href="report-registered-applicants.php?year=<?php echo $year; ?>">Number of Registered Applicants</a></li> 
                            <li><a href="report-schools-country.php?year=<?php echo $year; ?>">Number of Applied Schools per Country</a></li>
                            <li><a href="report-frequent-country.php?year=<?php echo $year; ?>">Frequently Selected Countries</a></li>
                            <li><a href="report-visa.php?year=<?php echo $year; ?>">Visa Status </a></li>
                            <li><a href="report-tourist-country.php?year=<?php echo $year; ?>"">No. of Student and Tourist per Country</a></li>
                            <li><a href="report-student-detail.php">Student Detailed Report</a></li>
                            <li><a href="report-tourist-detail.php">Tourist Detailed Report</a></li>
                            <li><a href="report-summary.php?year=<?php echo $year; ?>"">Summary Report</a></li>
                        </ul>
                    </li>

                     <li class="has-submenu">
                        <a href="#"><i class="fa fa-folder"></i>Remarks</a>
                        <ul class="submenu">
                            <li><a href="list-of-student.php">Student Visa Application</a></li>
                            <li><a href="offer_letter.php">Offer Letter</a></li>
                            <li><a href="certificate_of_enrollment.php">Certificate of Enrollment</a></li>
                        </ul>
                    </li>
                                

                    <li class="has-submenu">
                        <a href="#"><i class="icon-settings"></i>Maintenance</a>
                        <ul class="submenu">
                            <li><a href="backup/import.php">Import Database</a></li> 
                            <li><a href="backup/export.php">Export Database</a></li>
                            <li><a href="activity-logs.php">Activity Logs</a></li>
                            <li><a href="list-users.php">Disable Users</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->