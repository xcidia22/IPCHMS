<?php 
   $year = date('Y');
   if(isset($_GET['year'])) {	$year=$_GET['year']; }

   $selectCount = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' AND `accept` = 1 GROUP BY student_school_matching.country");
?>
   <div class="container">
      <div class="wrapper">
         <div class="card m-b-30">
            <h4 class="card-header">Frequently Selected Countries</h4>
            <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <div class="card-box table-responsive">
                              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                 <thead>
                                 <tr>
                                    <th>Country</th>
                                    <th>Total</th>
                                 </tr>
                                 </thead>

                                 <tbody>
                                 <?php 
                                    $selectCount->execute();
                                    $rows = $selectCount->fetchAll(PDO::FETCH_ASSOC);
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
<script type="text/javascript">
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
      $selectCount->execute();
      $check = $selectCount->rowCount();
      if($check > 0) {
         $rows = $selectCount->fetchAll(PDO::FETCH_ASSOC);
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
</script>

