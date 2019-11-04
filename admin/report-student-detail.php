<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
        <br>
        <div class="card m-b-30">
                <h5 class="card-header">Select name from the list</h5>
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
                                    $students = $dbh->prepare("SELECT * FROM visa_application WHERE category = 'Student' ORDER BY lastname, firstname, middlename");
                                    $students->execute();
                                    $rows = $students->fetchAll();
                                    foreach($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['applicantsid']; ?></td>
                                        <td><?php echo $row['lastname'].", ".$row['firstname']." ".$row['middlename']; ?></td>
                                        <td style="text-align: center;">
                                            <a target="_blank" href="print-student.php?id=<?php echo $row['applicantsid'];?>" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print</a>
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
    include('includes/foot.php');
    include('includes/footer.php');
?>  