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
                <h4 class="card-header">List of Users</h4>
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Applicants ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $users = $dbh->prepare("SELECT * FROM `users` where usertype='Client' ORDER BY userid");
                                    $users->execute();
                                    $rows = $users->fetchAll();
                                    foreach($rows as $row) {
                                        $status = $row['disable'];
                                ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $row['userid']; ?>" id="userid">
                                        <td><?php echo $row['applicantsid']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td>
                                            <?php if($status == 0) { ?>
                                            <a href="actions/disable-user.php?id=<?php echo $row['userid']; ?>" class="btn btn-danger btn-md disablebtn user-disable" id="user-disable"><i class="mdi mdi-account-off"></i></a>
                                            <?php }else{ ?>
                                            <a href="actions/enable-user.php?id=<?php echo $row['userid']; ?>" class="btn btn-success btn-md disablebtn user-enable" id="user-enable"><i class="mdi mdi-account-check"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card m-b-30">
                <h4 class="card-header">Change Admin Password</h4>
                <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                        <form method="POST" action="password_change.php">
                        <table>
                        <td><input type="hidden" name="username" value="admin"></td>
                        <tr>
                        <td>Enter new password:</td>
                        <td><input type="password" size="10" name="newpassword"></td>
                        </tr>
                        <tr>
                        <td>Confirm password:</td>
                        <td><input type="password" size="10" name="confpassword"></td>
                        </tr>
                        </table>
                        <p><input type="submit" value="Update Password">
                        </form>
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