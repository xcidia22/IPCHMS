<?php 
    include('includes/head.php');
    include('includes/db-connect.php');
    $year = $_GET['year'];
    date_default_timezone_set('Asia/Manila');
?>
<?php 
   $year = date('Y');
   if(isset($_GET['year'])) {	$year=$_GET['year']; }

   $schoolCount = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, count(*) AS total 
   FROM student_school_matching 
   INNER JOIN country 
   ON student_school_matching.country = country.country 
   WHERE traveldest = 0 
   AND `year` = '$year' AND `accept` = 1 
   GROUP BY student_school_matching.country");
   

?>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <div style="margin: 20px auto !important; text-align: center !important;">
        <img src="../assets/images/ipmsc.png" alt="logo">
        <h3 style="font-family: 'Playfair Display', serif; font-size: 30px;">Inter-Pacific Study and Migration Consultancy</h3>
    </div>
    <div class="wrapper">
        <div class="container">
        <br>
            <h3 style="font-family: 'Playfair Display', serif; font-size: 18px;">Number of Schools Per Country <?php echo $year ?></h3>
            <div id="chartdiv" style="height: 30em; width: 70em;"></div>
            <div class="container">
      <div class="wrapper">
         <div class="card m-b-30">
            <h4 class="card-header">Number of Applied Schools Per Country Year <?php echo $year ?></h4>
            <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <div class="card-box table-responsive">
                              <table class="table table-striped table-bordered dt-responsive nowrap">
                                 <thead>
                                 <tr>
                                    <th>Country</th>
                                    <th>Total</th>
                                 </tr>
                                 </thead>

                                 <tbody>
                                 <?php 
                                    $schoolCount->execute();
                                    $rows = $schoolCount->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($rows as $row) {
                                 ?>
                                    <tr>
                                          <td><?php echo $row['country']; ?></td>
                                          <td><?php echo $row['total']; ?></td>
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
            <div style="position: relative;font-size: 18px;">
                <b>Printed By:</b>Susan L. Posadas<br>
                <b>Date Printed:</b><?php echo date("F j, Y, g:i a"); ?>
            </div>
        </div>
    </div>
    <script>
/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Create map instance
var chart = am4core.create("chartdiv", am4maps.MapChart);

// Set map definition
chart.geodata = am4geodata_worldLow;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

// Make map load polygon (like country names) data from GeoJSON
polygonSeries.useGeodata = true;

// Configure series
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#74B266");

// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.fill = am4core.color("#367B25");

// Remove Antarctica
polygonSeries.exclude = ["AQ"];

// Add some data

// Bind "fill" property to "fill" key in data
polygonTemplate.propertyFields.fill = "fill";

// Create image series
var imageSeries = chart.series.push(new am4maps.MapImageSeries());

// Create a circle image in image series template so it gets replicated to all new images
var imageSeriesTemplate = imageSeries.mapImages.template;
var circle = imageSeriesTemplate.createChild(am4core.Circle);
circle.radius = 10;
circle.fill = am4core.color("#B27799");
circle.stroke = am4core.color("#FFFFFF");
circle.strokeWidth = 2;
circle.nonScaling = true;
circle.tooltipText = "{title}";

// Set property fields
imageSeriesTemplate.propertyFields.latitude = "latitude";
imageSeriesTemplate.propertyFields.longitude = "longitude";

// Add data for the three cities
imageSeries.data = [
   <?php 
      $schoolCount->execute();
      $check = $schoolCount->rowCount();
      if($check > 0) {
         $rows = $schoolCount->fetchAll(PDO::FETCH_ASSOC);
         foreach($rows as $row) {
         echo "{";
         echo "'latitude':".$row['latitude'].",";
         echo "'longitude':".$row['longitude'].",";
         echo "'title':".$row['total']."";
         echo "},";
         }
      }else {
         echo "No Records Found";
      }
      ?>];
      setTimeout(function(){ window.print(); }, 2000);
</script>
<?php 
include('includes/foot.php'); ?>