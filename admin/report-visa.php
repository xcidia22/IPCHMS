<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    include('charts/visa.php');
    $year = $_GET['year'];
?>
    <div class="wrapper">
        <div class="container">
        <br>
            <div class="form-group row">
                <label class="col-2 col-form-label">Select Year</label>
                <div class="col-4">
                    <select class="form-control" id="report-visa">
                    <?php for($y=2018; $y<=2025; $y++){ ?>
                        <option value="<?php echo $y ?>" <?php if($year == $y){ echo "selected"; } ?>><?php echo $y; ?></option>
                        <?php } ?>
                        </select>
                </div>
                <a target="_blank" href="print-visa.php?year=<?php echo $_GET['year']; ?>" class="btn btn-primary center" name="print">Print</a>
            </div>
        <br>
            <div id="chartContainer" style="height: 100%; width: 100%;"></div>
        </div>
    </div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
<?php 
    include('includes/foot.php');
?>  