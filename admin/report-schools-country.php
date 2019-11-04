<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    $year = $_GET['year'];
?>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>

    <div class="wrapper">
        <div class="container" >
        <br>
            <div class="form-group row">
                <label class="col-2 col-form-label">Select Year</label>
                <div class="col-4">
                    <select class="form-control" id="report-schools-country">
                    <?php for($y=2018; $y<=2025; $y++){ ?>
                        <option value="<?php echo $y ?>" <?php if($year == $y){ echo "selected"; } ?>><?php echo $y; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <a target="_blank" href="print-report-schools-country.php?year=<?php echo $_GET['year']; ?>" class="btn btn-primary center" name="print">Print</a>
            </div>
            <h3 style="font-family: 'Playfair Display', serif; font-size: 18px;">Number of Applied Schools Per Country</h3>
            <div id="chartdiv" style=" width: 100%; height: 400px;"></div>
        </div>
    </div>
    
<?php include('charts/schools-country.php'); ?>
        
<?php 
include('includes/footer.php'); 
include('includes/foot.php'); 

?>