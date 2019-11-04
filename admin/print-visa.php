<?php 
    include('includes/head.php');
    include('includes/db-connect.php');
    include('print-charts/visa.php');

    date_default_timezone_set('Asia/Manila');

    //SELECT school_country, count(*) as num FROM school_details GROUP BY `school_country`
    $year = $_GET['year'];
    $query = $dbh->prepare("SELECT status, count(*) AS total FROM visa_application WHERE `year` = '$year' GROUP BY status");
    $query->execute();
    $rows = $query->fetchAll();

    
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
                <div class="col-12" style="top: 23em; font-size: 26px;">
                    <div class="card-box table-responsive">
                    <h4>Visa Application Status</h4>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Visa Status</th>
                                <th>Total Count</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($rows as $row) {?>
                                <tr>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['total']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            
            <div style="position: relative;top: 30em;font-size: 26px;">
                <b>Printed By:</b>Susan L. Posadas<br>
                <b>Date Printed:</b><?php echo date("F j, Y, g:i a"); ?>
            </div>
        </div>
    </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php 
    include('includes/foot.php');
?>  