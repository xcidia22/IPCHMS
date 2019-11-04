<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');

    $id = $_GET['id'];
    $query = $dbh->prepare("SELECT * FROM `visa_application` WHERE `applicantsid` = '$id'");
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($array as $row) {
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
        $status = $row['status'];
    }
?>
    <div class="wrapper">
        <div class="container">
        <br>
            <div class="card m-b-30">
                <h4 class="card-header">Update Visa Application Status</h4>
                    <div class="card-body">
                    <form class="form-horizontal" action="actions/update-visa.php" method="post" id="idForm">
                        <div class="form-group m-b-25">
                            <div class="form-group row">
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">First Name</p>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" disabled>
                                </div>
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">Middle Name</p>
                                    <input type="text" class="form-control" name="middlename" value="<?php echo $middlename; ?>" disabled>
                                </div>
                                <div class="col-4">
                                    <p class="mb-1 mt-4 font-weight-bold ">Last Name</p>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <p class="mb-1 mt-4 font-weight-bold ">Status</p>
                                    <select style="width: 845px;" class="form-control" name="status" required="required">
                                        <option value="Pending" <?php if($status == 'Pending') echo 'selected'; ?>>Pending</option>
                                        <option value="Recieved / Incomplete" <?php if($status == 'Recieved / Incomplete') echo 'selected'; ?>>Recieved / Incomplete</option>
                                        <option value="Recieved" <?php if($status == 'Recieved') echo 'selected'; ?>>Recieved</option>
                                        <option value="Approved" <?php if($status == 'Approved') echo 'selected'; ?>>Approved</option>
                                        <option value="Denied" <?php if($status == 'Denied') echo 'selected'; ?>>Denied</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <center><button type="submit" class="btn btn-primary center" name="submit">Update</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  