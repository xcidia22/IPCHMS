<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Register New Program</h3>
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">Program Information</h4>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="actions/create-program.php">
                        <div class="form-group row">
                            <div class="col-12">
                                <p class="mb-1 mt-4 font-weight-bold ">School Name</p>
                                <select class="selectpicker form-control" data-live-search="true" name="school" required>
                                <?php 
                                    $schools = $dbh->prepare("SELECT * FROM `school_details` ORDER BY `school_id` DESC ");
                                    $schools->execute();
                                    $rows = $schools->fetchAll();
                                    foreach($rows as $row) { ?>
                                    <option value="<?php echo $row['school_id'] ?>"><?php echo $row['school_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Program Category</p>
                                <select style="width: 845px;" class="form-control" name="category" required="required" required>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="Skills Practicum Certificate">Skills Practicum Certificate</option>
                                    <option value="Vocational">Vocational</option>
                                    <option value="Graduate Studies">Graduate Studies</option>
                                    <option value="Under Graduate">Under Graduate</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Program Offered</p>
                                <input type="text" class="form-control" name="program" required>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary center" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  