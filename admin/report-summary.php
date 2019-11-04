<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    
    
?>
    <div class="wrapper">
        <div class="container">
        <form method="POST" action="">
            
            <div class="col-4">
                <p class="mb-1 mt-4 font-weight-bold ">Client Type</p>
                <select class="form-control" id="client" name="clientType">
                <option value="All">Please Choose Type</option>
                    <option value="Student">Students</option>
                    <option value="Tourist">Tourist</option>
                </select>
                <br>
                <a target="_blank" href="Summary.php?year=<?php echo $_GET['year']; ?>" class="btn btn-primary center" name="print">Print</a>
            </div>
            <div id="student-forms" style="display: none">
                <div class="form-group row">
                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Year</p>
                        <select class="form-control"  id="report-summary-year-student" name="year">
                        <?php for($y=2018; $y<=2025; $y++){ ?>
                            <option value="<?php echo $y ?>" <?php if($year == $y){ echo "selected"; } ?>><?php echo $y; ?></option>
                        <?php } ?>
                        </select>
                        
                    </div>

                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Status</p>
                        <select class="form-control" id="report-summary-status-student" name="status">
                            <option value="All">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Recieved">Recieved</option>
                            <option value="Recieved / Incomplete">Received/Incomplete</option>
                            <option value="Approved">Approved</option>
                            <option value="Denied">Denied</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Country</p>
                        <select class="form-control"  id="report-summary-country-student" name="country">
                            <option value="All" class="category">All</option>
                            <option value="Australia" class="category">Australia</option>
                            <option value="Brunei" class="category">Brunei</option>
                            <option value="Cambodia" class="category">Cambodia</option>
                            <option value="Canada" class="category">Canada</option>
                            <option value="Indonesia" class="category">Indonesia</option>
                            <option value="Laos" class="category">Laos</option>
                            <option value="Malaysia" class="category">Malaysia</option>
                            <option value="Myanmar" class="category">Myanmar</option>
                            <option value="New Zealand" class="category">New Zealand</option>
                            <option value="Singapore" class="category">Singapore</option>
                            <option value="Thailand" class="category">Thailand</option>
                            <option value="Vietnam" class="category">Vietnam</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="tourist-forms" style="display: none">
                <div class="form-group row">
                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Year</p>
                        <select class="form-control"  id="report-summary-year-tourist" name="year">
                            <?php for($y=2018; $y<=2025; $y++){ ?>
                            <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Status</p>
                        <select class="form-control" id="report-summary-status-tourist" name="status">
                            <option value="All">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Recieved">Recieved</option>
                            <option value="Recieved / Incomplete">Received/Incomplete</option>
                            <option value="Approved">Approved</option>
                            <option value="Denied">Denied</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Country</p>
                        <select class="form-control"  id="report-summary-country-tourist" name="country">
                            <option value="All" class="category">All</option>
                            <option value="Australia" class="category">Australia</option>
                            <option value="Brunei" class="category">Brunei</option>
                            <option value="Cambodia" class="category">Cambodia</option>
                            <option value="Canada" class="category">Canada</option>
                            <option value="Indonesia" class="category">Indonesia</option>
                            <option value="Laos" class="category">Laos</option>
                            <option value="Malaysia" class="category">Malaysia</option>
                            <option value="Myanmar" class="category">Myanmar</option>
                            <option value="New Zealand" class="category">New Zealand</option>
                            <option value="Singapore" class="category">Singapore</option>
                            <option value="Thailand" class="category">Thailand</option>
                            <option value="Vietnam" class="category">Vietnam</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <p class="mb-1 mt-4 font-weight-bold ">Spots</p>
                        <select class="form-control"  id="report-summary-school-tourist" name="schoolid">
                            <option value="All">All</option>
                            <?php 
                                $users = $dbh->prepare("SELECT * FROM `tourist_matching`");
                                $users->execute();
                                $rows = $users->fetchAll();
                                foreach($rows as $row) {
                            ?>
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['Spots_Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>
        </form>
        <br>
        <div class="card m-b-30">
            <h4 class="card-header">Summary Report</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive"  >
                                    <thead>
                                    <tr>
                                        <th>Applicants Name</th>
                                        <th>School Name / Spot</th>
                                        <th>Visa Status</th>
                                        <th>Country</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    
<?php 
    include('includes/foot.php');
?>  