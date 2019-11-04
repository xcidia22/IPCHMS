<?php 
    include('includes/head.php');
    include('includes/db-connect.php');
    include('print-charts/student-tourist-country.php');
    $year = $_GET['year'];
    date_default_timezone_set('Asia/Manila');

    
?>
    <div style="margin: 20px auto !important; text-align: center !important;">
        <img src="../assets/images/ipmsc.png" alt="logo">
        <h3 style="font-family: 'Playfair Display', serif; font-size: 30px;">Inter-Pacific Study and Migration Consultancy</h3>
    </div>
    <div class="wrapper">
        <div class="container">
        <br>
            <div id="chartContainer" style="height: 100%; width: 100%;"></div>
        <br>
        <div class="row" style="display: absolute; ">
                <div class="col-12" style="top: 28em;">
                    <div class="card-box table-responsive">
                    <h4>Actual count of Tourist and Students per Country</h4>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Country</th>
                                <th>Student</th>
                                <th>Tourist</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Australia</td>
                                    <td><?php echo $janStudent['total'];  ?></td>
                                    <td><?php echo $janTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Canada</td>
                                    <td><?php echo $febStudent['total'];  ?></td>
                                    <td><?php echo $febTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>New Zealand</td>
                                    <td><?php echo $marStudent['total'];  ?></td>
                                    <td><?php echo $marTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Thailand</td>
                                    <td><?php echo $aprilStudent['total'];  ?></td>                                     
                                    <td><?php echo $aprilTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Vietnam</td>
                                    <td><?php echo $mayStudent['total'];  ?></td>                                     
                                    <td><?php echo $mayTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Indonesia</td>
                                    <td><?php echo $juneStudent['total'];  ?></td>                                     
                                    <td><?php echo $juneTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Malaysia</td>
                                    <td><?php echo $julyStudent['total'];  ?></td>                                     
                                    <td><?php echo $julyTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Singapore</td>
                                    <td><?php echo $augStudent['total'];  ?></td>                                     
                                    <td><?php echo $augTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Myanmar</td>
                                    <td><?php echo $septStudent['total'];  ?></td>                                     
                                    <td><?php echo $sepTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Cambodia</td>
                                    <td><?php echo $octStudent['total'];  ?></td>                                     
                                    <td><?php echo $octTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Laos</td>
                                    <td><?php echo $novStudent['total'];  ?></td>                                     
                                    <td><?php echo $novTourist['total'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Brunei</td>
                                    <td><?php echo $decStudent['total'];  ?></td>                                     
                                    <td><?php echo $decTourist['total'];  ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="position: relative;top: 23em;font-size: 18px;">
        <b>Printed By:</b>Susan L. Posadas<br>
        <b>Date Printed:</b><?php echo date("F j, Y, g:i a"); ?>
    </div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
<?php 
    include('includes/foot.php');
?>  