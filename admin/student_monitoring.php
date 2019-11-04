<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');

                //     $id = $_GET['id'];
                //     $query = $dbh->prepare("SELECT * FROM `student_monitoring` WHERE `id` = '$id'");
                //     $query->execute();
                //     $array = $query->fetchAll(PDO::FETCH_ASSOC);
                //     foreach($array as $row) {
                //     $status = $row['status'];
                // }

?>
<div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Student Monitoring</h3>
            </div>
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Concern</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="card m-b-30">
                                    <h5 class="card-header">Problem Information </h5>
                                        <div class="card-body">
                                            <form action="actions/student_monitoring.php" method="POST">
                                                <div class="">
                                                    <p align="left" class="mb-1 mt-4 font-weight-bold">Name</p> 
                                                    <select class="selectpicker" data-live-search="true" name="name">
                                                        <?php 
                                                             $schools = $dbh->prepare('SELECT visa_application.applicantsid, visa_application.firstname, visa_application.middlename,visa_application.lastname,student_school_matching.accept,visa_application.category 
                                                                FROM student_school_matching 
                                                                INNER JOIN visa_application ON student_school_matching.applicantsid=visa_application.applicantsid  Where student_school_matching.accept = 1 && visa_application.category = "student" 
                                                                GROUP BY visa_application.applicantsid ASC');
                                                            $schools->execute();
                                                            $rows = $schools->fetchAll();
                                                            foreach($rows as $row) { ?>
                                                            <option  style="height:50px" value="<?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?>"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname'];
                                                                ?></option>
                                                        
                                                        <?php  } ?>
                                                    </select>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <p align="left" class="mb-1 mt-4 font-weight-bold ">Issue/ Concern</p>
                                                        <input type="text" class="form-control" name="issue" value="Financial" readonly>
                                                    </div>

                                                    <div class="col-6">
                                                        <p align="left" class="mb-1 mt-4 font-weight-bold">Due Date</p>
                                                        <input class="form-control" type="date" name="ddate" required>
                                                    </div>
                                                </div>
                                                <p align="left" class="mb-1 mt-4 font-weight-bold">Remarks</p> 
                                                <textarea style="height: 200px" class="form-control" type="text" name="remarks"></textarea>
                                                <br>
                                                <button type="submit" name="add" class="btn-select btn btn-primary center" style="text-align: center; margin: 0 auto;">Add</button>
                                            </form>
                                        </div>
                                </div>  
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="card m-b-30">
                <h5 class="card-header">Concern</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Issue/ Concern</th>
                            <th>Due Date</th>
                            <th>Remarks</th>
                            <th>Date Encoded</th>
                            <th>Status/Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php 
                            $users = $dbh->prepare("SELECT * FROM `student_monitoring` ORDER BY `id` DESC ");
                            $users->execute();
                            $rows = $users->fetchAll();
                            foreach($rows as $row) {
                        ?>
                            <tr>
                                <form class="form-horizontal"  enctype="multipart/form-data" role="form" action="actions/change-status.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $row['id']; ?>" id="id" name="rowid">
                                    <input type="hidden" value="<?php echo $row['name']; ?>" id="name" name="name">
                            <input type="hidden" value="<?php echo $row['status']; ?>" id="stats" name="status">
                            <?php 
                                if($row['status']=="Resolved"){
                                    $btnclass = 'class="btn btn-success btn-md disablebtn"';
                                    }else{
                                    $btnclass = 'class="btn btn-warning btn-md disablebtn"'; 
                            }
                                
                            ?>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['issue']; ?></td>
                            <td><?php echo $row['duedate']; ?></td>
                            <td style="width: 300px"><?php echo $row['remarks']; ?></td>
                            <td><?php echo $row['dateencoded']; ?></td>
                            <td>
                                
                            <button type="submit" name="changeStatus" <?php echo $btnclass; ?>><i class="mdi mdi-table-edit"><?php echo $row['status']; ?></i></button>
                            </td>
                                </form>           
                            </tr>
                            <?php }
                            
                                
                            ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     

<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  