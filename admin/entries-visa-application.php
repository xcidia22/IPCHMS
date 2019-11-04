<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Applicant's Information Sheet</h3>
            </div>
            
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="card m-b-30">
                        <h5 class="card-header">I. Account Information </h5>
                        <div class="card-body">
        						<form class="form-horizontal"  enctype="multipart/form-data" role="form" action="actions/create-application.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold ">Username</p>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">E-mail Address</p>
                                        <input class="form-control" type="text" name="emailAdress" required>
                                    </div>
                               	</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card m-b-30">
                <div class="card-body">
                    <div class="card m-b-30">
                        <h5 class="card-header">II. Personal Information</h5>
                        <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">Title</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Mr" name="title" class="custom-control-input" value="Mr." checked>
                                                <label class="custom-control-label" for="Mr" required>Mr.</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Ms" name="title" class="custom-control-input" value="Ms.">
                                                <label class="custom-control-label" for="Ms">Ms.</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Mrs" name="title" class="custom-control-input" value="Mrs.">
                                                <label class="custom-control-label" for="Mrs">Mrs.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold ">First Name</p>
                                        <input type="text" class="form-control" name="FirstName" required>
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold ">Middle Name</p>
                                        <input type="text" class="form-control" name="MiddleName" required>
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold ">Last Name</p>
                                        <input type="text" class="form-control" name="LastName" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Gender</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="male" name="gender" class="custom-control-input" value="Male" checked>
                                                <label class="custom-control-label" for="male" required>Male</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="female" name="gender" class="custom-control-input" value="Female">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Date of Birth</p>
                                        <input class="form-control" type="date" name="dateOfBirth" required>
                                    </div>

                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Birthplace</p>
                                        <input class="form-control" type="text" name="birthplace" value="Bacolod">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-4">     
                                        <p class="mb-1 mt-4 font-weight-bold ">Civil Status</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="single" name="civilstatus" class="custom-control-input" value="Single" checked>
                                                <label class="custom-control-label" for="single" required>Single</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="married" name="civilstatus" class="custom-control-input" value="Married">
                                                <label class="custom-control-label" for="married">Married</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="seperated" name="civilstatus" class="custom-control-input" value="seperated">
                                                <label class="custom-control-label" for="seperated">Seperated</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="widowed" name="civilstatus" class="custom-control-input" value="Widowed">
                                                <label class="custom-control-label" for="widowed">Widowed</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="defacto" name="civilstatus" class="custom-control-input" value="Defacto">
                                                <label class="custom-control-label" for="defacto">De Facto</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="engaged" name="civilstatus" class="custom-control-input" value="Engaged">
                                                <label class="custom-control-label" for="engaged">Engaged</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p class="mb-1 mt-4 font-weight-bold">Phone Number</p>
                                        <input class="form-control" type="text" name="mobilePhoneNumber" required>
                                    </div>

                                    <div class="col-2">
                                        <p class="mb-1 mt-4 font-weight-bold">Home Number</p>
                                        <input class="form-control" type="text" name="homeNumber" required>
                                    </div>

                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold">Category</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-6">
                                                <input type="radio" id="tourist" name="category" class="custom-control-input" value="Tourist">
                                                <label class="custom-control-label" for="tourist" required>Tourist</label>
                                            </div>
                                            <div class="custom-control custom-radio col-6">
                                                <input type="radio" id="student" name="category" class="custom-control-input" value="Student" checked>
                                                <label class="custom-control-label" for="student">Student</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="form-group row">
                                    <div class="col-8">
                                        <p class="mb-1 mt-4 font-weight-bold">Complete Address</p>
                                        <input class="form-control" type="text" name="address" required>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Nationality</p>
                                        <input class="form-control" type="text" disabled="" value="Filipino">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="card m-b-30">
                        <h5 class="card-header">III. Passport Details</h5>
                        <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">Passport #</p>
                                        <input class="form-control" type="text" name="passport" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">Country of Passport</p>
                                        <select class="selectpicker" id="cpassport" name="cpassport">
                                            <?php 
                                            $country = $dbh->prepare('SELECT country FROM `country`');
                                                $country->execute();
                                                $rows = $country->fetchAll();
                                                foreach($rows as $row) { ?>
                                                <option  style="height:40px" value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">Date Issued</p>
                                        <input class="form-control" type="date" name="dissue" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">Place of Issue</p>
                                        <input class="form-control" type="text" name="pissue" value="Bacolod" required>
                                    </div>  
                                </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="card m-b-30">
                        <h5 class="card-header">IV. Upload Files</h5>
                        <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">NSO</p>
                                        <input type="file" class="filestyle" data-buttonbefore="true" data-btnClass="btn-light" name="nso">
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">IELTS Result</p>
                                        <input type="file" class="filestyle" data-buttonbefore="true" data-btnClass="btn-light" name="ielts">
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">NBI Clearance</p>
                                        <input type="file" class="filestyle" data-buttonbefore="true" data-btnClass="btn-light" name="nbi">
                                    </div>

                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">Picture</p>
                                        <input type="file" class="filestyle" data-buttonbefore="true" data-btnClass="btn-light" name="picture">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary center" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  