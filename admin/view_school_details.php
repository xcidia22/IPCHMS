<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    $userid = $_GET['id'];
    $category = "";
?>

<div class="wrapper">
        <div class="container">
            <div class="page-title-box">
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">School Information</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                                    <tbody>
                                    <?php 
                                        $users = $dbh->prepare("SELECT * FROM `school_details` where school_id = '$userid' ORDER BY `school_id` DESC ");
                                        $users->execute();
                                        $rows = $users->fetchAll();
                                        foreach($rows as $row) {
                                    ?>
                                        <tr>
                                            <td>School Name:</td>
                                            <td><?php echo $row['school_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo $row['school_address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Country:</td>
                                            <td><?php echo $row['school_country']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Person:</td>
                                            <td><?php echo $row['contact_person']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email Address:</td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number:</td>
                                            <td><?php echo $row['school_contact']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  