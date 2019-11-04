<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Student Monitoring Summary</h3>
            </div>
            <div class="card m-b-30">
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Issue</th>
                                    <th>Due Date</th>
                                    <th>Remarks</th>
                                    <th>Date Encoded</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $students = $dbh->prepare('SELECT * FROM student_monitoring');
                                    $students->execute();
                                    $rows = $students->fetchAll();
                                    foreach($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['issue']; ?></td>
                                        <td><?php echo $row['duedate']; ?></td>
                                        <td><?php echo $row['remarks']; ?></td>
                                        <td><?php echo $row['dateencoded']; ?></td>
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
        </div>
    </div>
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  