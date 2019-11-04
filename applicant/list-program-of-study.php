<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">List of Program of Study</h4>
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>School</th>
                                    <th>Category</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $users = $dbh->prepare("SELECT * FROM `courses` INNER JOIN `school_details` ON courses.school_id = school_details.school_id ORDER BY courses.id DESC");
                                    $users->execute();
                                    $rows = $users->fetchAll();
                                    foreach($rows as $row) {
                                ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $row['id']; ?>" id="courseid">
                                        <td style="width: 100px"><?php echo $row['course']; ?></td>
                                        <td><?php echo $row['school_name']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
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