<?php
include('includes/header.php');
    include('includes/head.php');
    include('includes/db-connect.php');
    include('charts/dashboard.php');
    $year = $_GET['year'];
?>
        <div class="wrapper">
            <div class="container-fluid">

                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>

                <div class="card-box">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Select Year</label>
                        <div class="col-4">
                            <select class="form-control" id="dashboard-year">
                                <?php for($y=2018; $y<=2025; $y++){ ?>
                                <option value="<?php echo $y ?>" <?php if($year == $y){ echo "selected"; } ?>><?php echo $y; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>

                <div class="page-title-box">
                    <h4 class="page-title">Top 5 Rankings</h4>
                </div>
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Number of Clients per Countries</h4>
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Country</th>
                                    <th>No. of Visits</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $visited = $dbh->prepare("SELECT country, count(*) as num FROM student_school_matching Where `accept` = 1 GROUP BY `country` ORDER BY NUM DESC LIMIT 5 ");
                                    $visited->execute();
                                    $rows = $visited->fetchAll();
                                    $count = 1;
                                    foreach($rows as $row) {
                                        
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $row['country']; ?></td>
                                    <td align="center"><?php echo $row['num']; ?></td>
                                </tr>

                                <?php 
                                    $count++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Famous School</h4>
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>School</th>
                                    <th>Country</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $famous = $dbh->prepare("SELECT *, COUNT(*) as total FROM courses INNER JOIN student_school_matching ON courses.id = student_school_matching.courseid INNER JOIN school_details ON courses.school_id = school_details.school_id WHERE student_school_matching.traveldest = 0 and `accept` = 1 GROUP BY student_school_matching.courseid ORDER BY total DESC LIMIT 5 ");
                                    $famous->execute();
                                    $rows = $famous->fetchAll();
                                    $count = 1;
                                    foreach($rows as $row) {
                                        
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $row['school_name']; ?></td>
                                    <td><?php echo $row['school_country']; ?></td>
                                    <td align="center"><?php echo $row['total']; ?></td>
                                </tr>

                                <?php 
                                    $count++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">In-demand Courses</h4>
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Country</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $famous = $dbh->prepare("SELECT *, COUNT(*) as total FROM courses INNER JOIN student_school_matching ON courses.id = student_school_matching.courseid WHERE student_school_matching.traveldest = 0 and `accept` = 1 GROUP BY student_school_matching.courseid ORDER BY total DESC LIMIT 5");
                                        $famous->execute();
                                        $rows = $famous->fetchAll();
                                        $count = 1;
                                        foreach($rows as $row) {
                                            
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['course']; ?></td>
                                        <td><?php echo $row['country']; ?></td>
                                        <td align="center"><?php echo $row['total']; ?></td>
                                    </tr>

                                    <?php 
                                        $count++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
<?php
    include('includes/footer.php');
    include('includes/foot.php');
?>