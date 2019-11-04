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
                <h4 class="card-header">Activity Log</h4>
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Log Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $users = $dbh->prepare("SELECT * FROM logs ORDER BY log_id DESC");
                                    $users->execute();
                                    $rows = $users->fetchAll();
                                    foreach($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['log_description']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['time']; ?></td>
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