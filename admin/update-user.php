<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');

    $id = $_GET['id'];
    $query = $dbh->prepare("SELECT * FROM `users` WHERE `userid` = '$id'");
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($array as $row) {
        $name = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
    }
?>
    <div class="wrapper">
        <div class="container">
        <br>
            <div class="card m-b-30">
                <h4 class="card-header">Update User</h4>
                    <div class="card-body">
                    <form class="form-horizontal" action="actions/update-user.php" method="post" id="idForm">
                        <div class="form-group m-b-25">
                            <div class="form-group row">
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">Name</p>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">E-mail</p>
                                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">Username</p>
                                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">Password</p>
                                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
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