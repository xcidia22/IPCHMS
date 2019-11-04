<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title"></h3>
            </div>
            <div class="card m-b-30">
                <h5 class="card-header">Select name from the list for student visa</h5>
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Client ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $students = $dbh->prepare('SELECT visa_application.applicantsid, visa_application.firstname, visa_application.middlename,visa_application.lastname,student_school_matching.accept,visa_application.category 
                                        FROM student_school_matching 
                                        INNER JOIN visa_application ON student_school_matching.applicantsid=visa_application.applicantsid  Where student_school_matching.accept = 1 && visa_application.category = "student" 
                                        GROUP BY visa_application.applicantsid');
                                    $students->execute();
                                    $rows = $students->fetchAll();
                                    foreach($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['applicantsid']; ?></td>
                                        <td><?php echo $row['lastname'].", ".$row['firstname']." ".$row['middlename']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="student_visa_application.php?id=<?php echo $row['applicantsid'];?>" class="btn btn-primary" id="myBtn"><i class="mdi mdi-pencil"></i> Assessment</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>     
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  