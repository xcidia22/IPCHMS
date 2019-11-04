<?php 
    include('includes/head.php');
    include('includes/db-connect.php');
    include('print-charts/registered-applicants.php');

    date_default_timezone_set('Asia/Manila');
    
    //SELECT school_country, count(*) as num FROM school_details GROUP BY `school_country`
    $year = $_GET['year'];
    $student = $dbh->prepare("SELECT COUNT(*) AS total FROM `visa_application` WHERE category = 'student' and `year` = '$year'");
    $student->execute();
    $totalStudent = $student -> fetch(PDO::FETCH_ASSOC);

    $tourist = $dbh->prepare("SELECT COUNT(*) AS total FROM `visa_application` WHERE category = 'tourist' and `year` = '$year'");
    $tourist->execute();
    $totalTourist = $tourist -> fetch(PDO::FETCH_ASSOC);

    $student = $totalStudent['total'];
    $tourist = $totalTourist['total'];
?>
    <div style="margin: 20px auto !important; text-align: center !important;">
        <img src="../assets/images/ipmsc.png" alt="logo">
        <h3 style="font-family: 'Playfair Display', serif; font-size: 30px;">Inter-Pacific Study and Migration Consultancy</h3>
    </div>
    <div class="wrapper" style="padding: 80px !important;">
        <div class="container">
        <br>
            <div id="chartContainer" style="height: 100%; width: 100%; position: relative !important;"></div>
            <br>
            <div class="row" style="display: absolute; ">
                <div class="col-12" style="top: 28em;">
                    <div class="card-box table-responsive">
                    <h4>Actual count of registered applicant</h4>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Visa Category</th>
                                <th>Total Count</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Student</td>
                                    <td><?php echo $student; ?></td>
                                </tr>
                                <tr>
                                    <td>Tourist</td>
                                    <td><?php echo $tourist; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            
            <div style="position: relative;top: 23em;font-size: 18px;">
                <b>Printed By:</b>Susan L. Posadas<br>
                <b>Date Printed:</b><?php echo date("F j, Y, g:i a"); ?>
            </div>
        </div>
    </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php 
    include('includes/foot.php');
?>  