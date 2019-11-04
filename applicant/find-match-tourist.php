<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
    $id = $_GET['id'];
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box"></div>
            <div class="card m-b-30">
                <h5 class="card-header">Tourist Matching</h5>
                <div class="card-body">
                    <form method="POST" action="">
                    <div class="row">
                        <div class="col-2">
                            <p class="mb-1 mt-4 font-weight-bold ">Preferred Country</p>
                            <select class="form-control" name="country">
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
                            <p class="mb-1 mt-4 font-weight-bold ">Category</p>
                            <select style="width: 845px;" class="form-control" name="category" required="required">
                                <option value="All">All</option>
                                <option value="Historical">Historical</option>
                                <option value="Landmarks">Landmarks</option>
                                <option value="Natural">Natural</option>
                            </select>
                        </div>

                        <div class="col-2">
                            <p class="mb-1 mt-4 font-weight-bold ">&nbsp;</p>
                            <button type="submit" class="btn btn-primary center" name="submit">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
            <div class="card m-b-30">
                <h5 class="card-header">Matches Found</h5>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                if(isset($_POST['submit'])) {
                                    ini_set('max_execution_time', 0);

                                    $country = $_POST['country'];
                                    $category = $_POST['category'];
                                    
                                    if($category == "All") {
                                        $match = $dbh->prepare("SELECT 
                                            * 
                                        FROM 
                                            tourist_matching INNER JOIN country ON tourist_matching.`Spots_Country`=`country`.`country`
                                            INNER JOIN student_school_matching ON tourist_matching.`ID` = student_school_matching.`traveldest`
                                        WHERE 
                                            student_school_matching.`country` = '".$country."' AND
                                            student_school_matching.`applicantsid` = '$id' AND accept = 0");
                                    } else {
                                        $match = $dbh->prepare("SELECT 
                                            * 
                                        FROM 
                                            tourist_matching INNER JOIN country ON tourist_matching.`Spots_Country`=`country`.`country`
                                            INNER JOIN student_school_matching ON tourist_matching.`ID` = student_school_matching.`traveldest`
                                        WHERE 
                                            student_school_matching.`country` = '".$country."' AND
                                            `tourist_matching`.`Spots_Category` = '".$category."' AND
                                            student_school_matching.`applicantsid` = '$id' AND accept = 0");
                                    }
                                    $match->execute();
                                    $array = $match->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($array as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['Spots_Name']; ?></td>
                                            <td><?php echo $row['Spots_Address']; ?></td>
                                            <td><?php echo $row['Spots_Category'];?></td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="control-input chkd" id="<?php echo $row['ID'] ?>" value="<?php echo $row['ID'] ?>" name="action">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                            
                                }else{
                                    $match = $dbh->prepare("SELECT * FROM tourist_matching 
                                    INNER JOIN country ON tourist_matching.`Spots_Country`=`country`.`country`
                                    INNER JOIN student_school_matching ON tourist_matching.`ID` = student_school_matching.`traveldest`
                                    WHERE student_school_matching.`applicantsid` = '$id' AND accept = 0 ");
                                    $match->execute();
                                    
                                    $array = $match->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($array as $row) {  ?>
                                            <tr>
                                                <td><?php echo $row['Spots_Name']; ?></td>
                                                <td><?php echo $row['Spots_Address']; ?></td>
                                                <td><?php echo $row['Spots_Category'];?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="control-input chkd" id="<?php echo $row['ID'] ?>" value="<?php echo $row['ID'] ?>" name="action">
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                    }?>
                        </tbody>
                    </table>
                    <div class="submit-btn" style="margin: 0 auto; text-align: center !important;">
                        <input type="hidden" class="user" value="<?php echo $_GET['id']; ?>" name="userID">
                        <button class="btn-select btn btn-primary center" id="btn-select-me-tourist" style="text-align: center; margin: 0 auto;">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include('includes/footer.php'); 
    include('includes/foot.php');
?>  