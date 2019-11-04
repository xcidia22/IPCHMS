<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');

    $id = $_GET['id'];
    $query = $dbh->prepare("SELECT * FROM `courses` WHERE `id` = '$id'");
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($array as $row) {
        $course = $row['course'];
        $school_id = $row['school_id'];
        $tuition = $row['tuition'];
        $category = $row['category'];
    }
?>
    <div class="wrapper">
        <div class="container">
        <br>
            <div class="card m-b-30">
                <h4 class="card-header">Update Course</h4>
                    <div class="card-body">
                    <form class="form-horizontal" action="actions/update-course.php" method="post" id="idForm">
                        <div class="form-group m-b-25">
                            <div class="form-group row">
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">Program Offered</p>
                                    <input type="text" class="form-control" name="program" value="<?php echo $course; ?>" readonly>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">Tuition(PHP)</p>
                                    <input type="number" class="form-control" name="tuition" value="<?php echo $tuition; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <p class="mb-1 mt-4 font-weight-bold ">Program Category</p>
                                    <select style="width: 845px;" class="form-control" name="category" disabled="true">
                                        <option value="Post Graduate">Post Graduate</option>
                                        <option value="Skills Practicum Certificate">Skills Practicum Certificate</option>
                                        <option value="Vocational">Vocational</option>
                                        <option value="Graduate Studies">Graduate Studies</option>
                                        <option value="Under Graduate">Under Graduate</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 mt-4 font-weight-bold ">School Name</p>
                                    <?php 
                                        $schools = $dbh->prepare("SELECT * FROM `school_details` where school_id = $school_id");
                                        $schools->execute();
                                        $rows = $schools->fetchAll();
                                        foreach($rows as $row) { ?>
                                        <input type="text" class="form-control" name="schoolname" value="<?php echo $row['school_name'] ?>" readonly>
                                        <?php } ?>
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