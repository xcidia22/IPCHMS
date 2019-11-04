<?php 
    include('includes/head.php');
    include('includes/db-connect.php');
    include('charts/visa2.php');

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
            <div id="chartContainer1" style="float: right; height: 400px; width: 49%; position: relative !important;" ></div>
            <div id="chartContainer2" style="float: left; height: 400px; width: 49%; position: relative !important;"></div>
        <br>
        <br>
        <div id="chartContainer3" style="float: left; margin-top:50px; height: 300px; width: 100%; position: relative !important;"></div>
        
        <div id="chartContainer4" style="float: left; margin-top:50px; margin-bottom:20px; height: 300px; width: 100%; position: relative !important;"></div>
            <br>
            <br>
        <div style="position: relative;font-size: 18px; margin-top: 30px;">
                <b>Printed By:</b>Susan L. Posadas<br>
                <b>Date Printed:</b><?php echo date("F j, Y, g:i a"); ?>
            </div>
        </div>
        </div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php 
    include('includes/foot.php');
?>  