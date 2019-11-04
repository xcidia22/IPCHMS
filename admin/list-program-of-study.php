<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <script>
        function deleteCourse(id) { 
                
            console.log(id);
            swal({
                text: "Are you sure you want to delete this Program of Study?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Yes!'
            }).then(function () {
                swal({
                        text: "Disabled Successfully",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }
                ).then(function() {
                    window.location = 'actions/delete-course.php?id='+id;
                })
            })
        }
    </script>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">List of Program of Study</h4>
                <div style="margin: 30px auto 0 65em;">
                    <a href="entries-program-of-study.php" class="btn btn-success center"><i class="icon-plus"></i> Add Program</a>
                </div>
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
                                    <th>Action</th>
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
                                        <td>
                                            <a href="#" class="btn btn-danger btn-md disablebtn delete-course" onclick="deleteCourse(<?php echo $row['id']; ?>)"><i class="mdi mdi-delete-circle"></i></a>
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