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
                <h4 class="card-header">List of Schools</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <thead>
                                    <tr>
                                        <th>School</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `school_details` ORDER BY `school_id` DESC ");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                    ?>
                                        <tr>
                                            <input type="hidden" value="<?php $row['school_id']; ?>" id="schoolid">
                                            <td><?php echo $row['school_name']; ?></td>
                                            <td style="width: 400px;"><?php echo $row['school_address']; ?></td>
                                            <td>
                                                <a href="view_school_details.php?id=<?php echo $row['school_id']; ?>" class="btn btn-primary btn-md"><i class="mdi mdi-school"></i></a>
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