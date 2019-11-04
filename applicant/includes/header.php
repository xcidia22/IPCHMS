
<!-- Navigation Bar-->
<?php 
    $year = date('Y');
    $userid = $_SESSION['applicantsid'];
    $name = "";
    include('db-connect.php');
    $users = $dbh->prepare("SELECT * FROM `users` where applicantsid = '$userid'");
    $users->execute();
    $rows = $users->fetchAll();
    foreach($rows as $row) {
        $name = $row['fullname'];
       
    }
?>

<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo" style="display: inline;">
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

                            <img src="../assets/images/users/default-avatar.png" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $name?><i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                            <!-- item-->
                            <a href="messaging.php?id=<?php echo $userid; ?>" class="dropdown-item notify-item">
                                <i class="icon-envelope"></i> <span>Messages</span>
                            </a>

                            <a href="profile.php?id=<?php echo $userid; ?>" class="dropdown-item notify-item">
                                <i class="icon-user"></i> <span>My Profile</span>
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
                        <a href="#"><i class="icon-list"></i>List</a>
                        <ul class="submenu">
                            <li><a href="list-college-university.php">Colleges / Universities</a></li>
                            <li><a href="list-program-of-study.php">Program Of Study</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-user"></i>Matching</a>
                        <ul class="submenu">
                            <?php 
                                $category = substr($userid, 0, 1);
                                if($category=='S') { ?>
                                <li><a href="find-match-student.php?id=<?php echo $userid; ?>">Student</a></li>
                            <?php }else { ?>
                                <li><a href="find-match-tourist.php?id=<?php echo $userid; ?>">Tourist</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->