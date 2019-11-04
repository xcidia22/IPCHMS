<?php 
    include('includes/head.php');
    include('includes/header.php');
?>
    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Register New School</h3>
            </div>
            <div class="card m-b-30">
                <h4 class="card-header">School Information</h4>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="actions/create-school.php">
                        <div class="form-group row">
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">School Name</p>
                                <input type="text" class="form-control" name="name" maxlength="50" required>
                            </div>
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">School Address</p>
                                <input type="text" class="form-control" name="address" maxlength="150" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Country Located</p>
                                <select class="form-control" name="country" required>
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
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Contact Person</p>
                                <input type="text" class="form-control" name="contactPerson" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Email Address</p>
                                <input type="text" class="form-control" name="emailAddress" required>
                            </div>
                            <div class="col-6">
                                <p class="mb-1 mt-4 font-weight-bold ">Contact Number</p>
                                <input type="text" class="form-control" name="contactNumber" maxlength="15" required>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary center" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  