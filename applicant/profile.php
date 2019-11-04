<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    $userid = $_GET['id'];
    $category = "";

    $query = $dbh->prepare("SELECT * FROM `users` WHERE `applicantsid` = '$userid'");
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($array as $row) {
        $name = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
    }
?>
    <style type="text/css">
        
        .fa{
            position: absolute;
            left:320px;
            top: 60px;
            font-size: 20px;
            cursor: pointer;
            color: #999;
        }

        .fa.active{
            color: dodgerblue;
        }

    </style>

    <div class="wrapper">

        <div class="container">
            <div class="page-title-box">
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">Change Password</h4>
                    <div class="card-body">
                    <form class="form-horizontal" action="actions/update-account.php" method="post" id="idForm">
                        <div class="form-group m-b-25">
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">Old Password</p>
                                    <input type="hidden" name="id" value="<?php echo $userid; ?>">
                                    <input type="hidden" name="confirm" value="">
                                    <i class="fa fa-eye" id="eye"></i>
                                    <input type="password" class="form-control" id="pwd" name="password" value="<?php echo $password; ?>" readonly>
                                </div>
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">New Password</p>
                                    <input type="password" class="form-control" name="newpass">
                                </div>
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">Confirm Password</p>
                                    <input type="password" class="form-control" name="confirmpass">
                                </div>
                                    
                            </div>
                        </div>

                        <center><button type="submit" class="btn btn-primary center" name="submit">Update</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        var pass = document.getElementById('pwd');
        var eye = document.getElementById('eye');

        eye.addEventListener('click',togglePass);

        function togglePass(){

            eye.classList.toggle('active');

            (pass.type == 'password') ? pass.type = 'text' : pass.type = 'password';

        }

    </script>

        <div class="container">
            <div class="page-title-box">
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">Personal Information</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `users` INNER JOIN `visa_application` ON users.applicantsid = visa_application.applicantsid  where users.applicantsid = '$userid'");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                    ?>
                                        <tr>
                                            <td>Full Name</td>
                                            <td><?php echo $row['fullname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo $row['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $row['home']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td><?php echo $row['mobile']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday</td>
                                            <td><?php echo $row['dateofbirth']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nationality</td>
                                            <td><?php echo $row['nationality']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">Passport Information</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `users` INNER JOIN `visa_application` ON users.applicantsid = visa_application.applicantsid  where users.applicantsid = '$userid'");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                    ?>
                                        <tr>
                                            <td>Passport #</td>
                                            <td><?php echo $row['passport']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Country of Passport</td>
                                            <td><?php echo $row['countryofpassport']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date Issued</td>
                                            <td><?php echo $row['dateofissue']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Place of Issue</td>
                                            <td><?php echo $row['placeofissue']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">Visa Status</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `users` INNER JOIN `visa_application` ON users.applicantsid = visa_application.applicantsid  where users.applicantsid = '$userid'");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                        $category = $row['category'];
                                    ?>
                                        <tr>
                                            <td>Visa Type</td>
                                            <td><?php echo $row['category']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Application Status</td>
                                            <td><?php echo $row['status']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($category == "Student") { ?>
            <div class="card m-b-30">
                <h4 class="card-header">Student Credentials</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <th>Country</th>
                                    <th>School</th>
                                    <th>Course</th>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `student_school_matching` 
                                        INNER JOIN `visa_application` ON student_school_matching.applicantsid = visa_application.applicantsid  
                                        INNER JOIN `courses` ON student_school_matching.courseid = courses.id and `accept` = 1
                                        where student_school_matching.applicantsid = '$userid'");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                            $schoolid = $row['school_id'];
                                            $schoolnameQuery = $dbh->prepare("SELECT school_name FROM `school_details` where school_id = $schoolid");
                                            $schoolnameQuery->execute();
                                            $schools = $schoolnameQuery->fetchAll(); 
                                            foreach($schools as $school) {
                                                $schoolName = $school['school_name'];
                                            }
                                    ?>
                                        <tr>
                                            <td><?php echo $row['country']; ?></td>
                                            <td><?php echo $schoolName; ?></td>
                                            <td><?php echo $row['course']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else { ?>
            <div class="card m-b-30">
                <h4 class="card-header">Tourist Credentials</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <th>Country</th>
                                    <th>Name of Spot</th>
                                    <th>Spot Category</th>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `student_school_matching` 
                                        INNER JOIN `tourist_matching` ON student_school_matching.traveldest = tourist_matching.ID and `accept` = 1
                                        where student_school_matching.applicantsid = '$userid'");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['Spots_Country']; ?></td>
                                            <td><?php echo $row['Spots_Name']; ?></td>
                                            <td><?php echo $row['Spots_Category']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  