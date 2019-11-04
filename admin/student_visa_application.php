<!DOCTYPE html>

<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db-connect.php');

$id = $_GET['id'];

    $con=mysqli_connect("localhost","id9868298_root","ipsmcis_db2019","id9868298_ipsmcis_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM visa_admission WHERE applicantsid='".$id."'";

        $applicantsid = "";
        $category = "";
        $title = "";
        $givenname = "";
        $lastname =  "";
        $gender = "";
        $birthday = "";
        $countryofbirth = "";
        $nationality = "";
        $citizen = "";
        $unit = "";
        $street = "";
        $streetname = "";
        $suburb= "";
        $state = "";
        $postcode = "";
        $homenumber = "";
        $mobilenumber = "";
        $email = "";
        $datecreated = "";
        $month = "";
        $year = "";
        $needs = "";
        $allergies= "";
$checkMr = "";
$checkMs = "";
$checkMrs = "";
$checkM = "";
$checkF = "";
$citizenY = "";
$citizenN = "";
$needsY = "";
$needsN = "";
$allergiesY = "";
$allergiesN = "";
$riskY = "";
$riskN = "";
$risk = "";
$country = "";
$otherdisabilities="";
$disabilities="";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
        $applicantsid = $row[1];
        $category = $row[2];
        $title = $row[3];
        $givenname = $row[4];
        $lastname =  $row[5];
        $gender = $row[6];
        $birthday = $row[7];
        $countryofbirth = $row[8];
        $nationality = $row[9];
        $citizen = $row[10];
        $unit = $row[11];
        $street = $row[12];
        $streetname = $row[13];
        $suburb=$row[14];
        $state = $row[15];
        $postcode = $row[16];
        $homenumber = $row[17];
        $mobilenumber = $row[18];
        $email = $row[19];
        $datecreated = $row[20];
        $month = $row[21];
        $year = $row[22];
        $needs = $row[23];
        $allergies= $row[24];
        $allergydetails = $row[25];
        $risk= $row[26];
        $riskdetails= $row[27];
        $country = $row[28];
        $disabilities = $row[29];
        $otherdisabilities = $row[30];
    }
  // Free result set
  mysqli_free_result($result);
}
if($country==null){
    $country="";
}
mysqli_close($con);
if($riskdetails==null){
    $riskdetails="";
}
if($allergydetails==null){
    $allergydetails="";
}
 $con=mysqli_connect("localhost","id9868298_root","ipsmcis_db2019","id9868298_ipsmcis_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT * FROM visa_application WHERE applicantsid='".$id."'";
        
        

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
        $applicantsid = $row[1];
        $category = $row[3];
        $title = $row[4];
        $givenname = $row[5];
        $lastname =  $row[7];
        $birthday = $row[9];
        $countryofbirth = $row[10];
        $nationality = $row[11];    
        $gender = $row[8];
    }
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($con);
?>

    <div class="wrapper">
        <div class="container">
            <div class="page-title-box">
                <h3 class="page-title">Student Visa Application Form</h3>
            </div>

            <div class="card m-b-30">
                <div class="card-body">
                    <div class="card m-b-30">
                        <h5 class="card-header">I. Student Details</h5>
                        <div class="card-body">
                                <form class="form-horizontal"  enctype="multipart/form-data" role="form" action="actions/create-admission.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p class="mb-1 mt-4 font-weight-bold">Title</p>
                                        <div class="row">
                                            <?php
                                            if($title=="Mr."){
                                                $checkMr="checked=true";
                                            }else if($title=="Ms."){
                                                $checkMs="checked=true";
                                            }else if($title=="Mrs."){
                                                $checkMrs="checked=true";
                                            }
                                            ?>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Mr" name="title" class="custom-control-input"  value="Mr." <?php echo $checkMr ?>>
                                                <label class="custom-control-label" for="Mr" required>Mr.</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Ms" name="title" class="custom-control-input" value="Ms." <?php echo $checkMs ?>>
                                                <label class="custom-control-label" for="Ms">Ms.</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="Mrs" name="title" class="custom-control-input" value="Mrs." <?php echo $checkMrs ?>>
                                                <label class="custom-control-label" for="Mrs">Mrs.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold ">Family Name</p>
                                        <input type="text" class="form-control" name="FamilyName" value="<?php echo $lastname ?>" required>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold ">Given Name</p>
                                        <input type="text" class="form-control" name="GivenName" required value="<?php echo $givenname ?>">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Gender</p>
                                        <div class="row">
                                            <?php
                                            if($title=="Mr."){
                                                $checkM="checked=true";
                                            }else if($title=="Ms."){
                                                $checkF="checked=true";
                                            }else if($title=="Mrs."){
                                                $checkF="checked=true";
                                            }
                                                       ?>
                                            <div class="custom-control custom-radio col-4">   
                                                <input type="radio" id="male" name="gender" class="custom-control-input" value="Male" <?php echo $checkM ?>>
                                                <label class="custom-control-label" for="male"  required >Male</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="female" name="gender" class="custom-control-input" <?php echo $checkF ?> value="Female" >
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Date of Birth</p>
                                        <input class="form-control" type="date" name="dateOfBirth" required value="<?php echo $birthday ?>">
                                    </div>

                                    <div class="col-4">
                                        <p class="mb-1 mt-4 font-weight-bold ">Nationality</p>
                                        <input class="form-control" type="text" disabled="" value="Filipino">
                                    </div>
                                </div>

                                <div class="form-group row">
                                     <?php
                                            if($citizen=="Yes"){
                                                $citizenY="checked=true";
                                            }else if($citizen=="No"){
                                                $citizenN="checked=true";
                                            }
                                            ?>
                                    <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold">
                                            Are you a citizen or permanent resident of this country?</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="YesCitizen" name="citizen" class="custom-control-input" value="Yes" <?php echo $citizenY ?>>
                                                <label class="custom-control-label" for="YesCitizen" required>Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="NoCitizen" name="citizen" class="custom-control-input" value="No" <?php echo $citizenN ?>>
                                                <label class="custom-control-label" for="NoCitizen">No</label>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-6">
                                        <p class="mb-1 mt-4 font-weight-bold ">Country of Birth</p>
                                        <input class="form-control" type="text" name="countryofbirth" value="<?php echo $countryofbirth ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card m-b-30">
                                <h5 class="card-header">If Yes, please provide residence of citizenship or residency.</h5>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <p class="mb-1 mt-4 font-weight-bold">Home Number</p>
                                            <input class="form-control" type="text" name="homenumber" required value="<?php echo $homenumber ?>">
                                        </div>
                                        <div class="col-4">
                                            <p class="mb-1 mt-4 font-weight-bold">Mobile number</p>
                                            <input class="form-control" type="text" name="mobilenumber" required value="<?php echo $mobilenumber ?>">
                                        </div>  
                                        <div class="col-4">
                                            <p class="mb-1 mt-4 font-weight-bold">Email Address</p>
                                            <input class="form-control" type="text" name="email" required value="<?php echo $email ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="card m-b-30">
                            <h5 class="card-header">Address in that Country (If Known)</h5>
                                <div class="form-group row">
                                    <div class="col-2">
                                         <p class="mb-1 mt-4 font-weight-bold">Unit #</p>
                                        <input class="form-control" type="text" name="unit#" required value="<?php echo $unit ?>">
                                    </div>
                                    <div class="col-2">
                                        <p class="mb-1 mt-4 font-weight-bold">Street #</p>
                                        <input class="form-control" type="text" name="street#" required value="<?php echo $street ?>">
                                    </div>
                                    <div class="col-8">
                                        <p class="mb-1 mt-4 font-weight-bold">Street Name</p>
                                        <input class="form-control" type="text" name="streetname" required value="<?php echo $streetname ?>">
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">Suburb</p>
                                        <input class="form-control" type="text" name="suburb" required value="<?php echo $suburb ?>">
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">State</p>
                                        <input class="form-control" type="text" name="state" required value="<?php echo $state ?>">
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">Postcode</p>
                                        <input class="form-control" type="text" name="postcode" required value="<?php echo $postcode ?>">
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-1 mt-4 font-weight-bold">Country</p>
                                        <input class="form-control" type="text" name="country" value="<?php echo $country ?>" required>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="card m-b-30">
                                <h5 class="card-header">Special Needs</h5>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <?php
                                            if($needs=="Yes"){
                                                $needsY="checked=true";
                                            }else if($needs=="No"){
                                                $needsN="checked=true";
                                            }
                                            ?>
                                        <p class="mb-1 mt-4 font-weight-bold">Do you have disability, impairment or medical condition that might affect your ability to study?</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="YesNeeds" name="Needs" class="custom-control-input" onclick="DisableNeeds()" value="Yes" <?php echo $needsY?>>
                                                <label class="custom-control-label" for="YesNeeds" required>Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="NoNeeds" name="Needs" class="custom-control-input" onclick="DisableNeeds()" value="No" <?php echo $needsN?>>
                                                <label class="custom-control-label" for="NoNeeds">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-b-30">
                                <div class="mb-1 mt-4 font-weight-bold ">If Yes, which of the following  applies</div>
                                <?php 
                                $Hearing="";
                                $Physical="";
                                $Intellectual="";
                                $LearningDifficulty="";
                                $MentalIllness="";
                                $Vision="";
                                $BrainInjuries="";
                                $Medical="";
                                $others="";
                                
                                $Array = explode(",",$disabilities);
                                 foreach($Array as $selected){
                                    if($selected=="Hearing/ Deaf"){
                                     $Hearing = "checked=true";
                                    }
                                    if($selected=="Physical"){
                                     $Physical = "checked=true";
                                    }
                                    if($selected=="Intellectual"){
                                     $Intellectual = "checked=true";
                                    }
                                    if($selected=="Learning Difficulty"){
                                     $LearningDifficulty = "checked=true";
                                    }
                                    if($selected=="Mental Illness"){
                                     $MentalIllness = "checked=true";
                                    }
                                    if($selected=="Vision"){
                                      $Vision = "checked=true";  
                                    }              
                                    if($selected=="Acquired Brain Injuries"){
                                     $BrainInjuries = "checked=true";
                                    }
                                    if($selected=="Medical"){
                                     $Medical = "checked=true";
                                    }
                                    if($selected=="others"){
                                     $others = "checked=true";
                                    }
                                        
                                }                      
                                ?>
                                <div class="form-group row">
                                    <div class="col-10">     
                                        <div class="row">
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="Hearing" name="disability[]" disabled=true class="custom-control-input" value="Hearing/ Deaf">
                                                <label class="custom-control-label" for="Hearing" <?php echo $Hearing?> required>Hearing/ Deaf</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="Physical" name="disability[]" disabled=true <?php echo $Physical?> class="custom-control-input"  value="Physical" >
                                                <label class="custom-control-label" for="Physical">Physical</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="learningDifficulty" <?php echo $LearningDifficulty?> name="disability[]" disabled=true class="custom-control-input" value="Learning Difficulty">
                                                <label class="custom-control-label" for="learningDifficulty">Learning Difficulty</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="Intellectual" <?php echo $Intellectual?> name="disability[]" disabled=true class="custom-control-input" value="Intellectual">
                                                <label class="custom-control-label" for="Intellectual">Intellectual</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="mentalIllness" <?php echo $MentalIllness?> name="disability[]" disabled=true class="custom-control-input" value="Mental Illness">
                                                <label class="custom-control-label" for="mentalIllness">Mental Illness</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" disabled=true id="Vision" name="disability[]" <?php echo $Vision?> class="custom-control-input" value="Vision">
                                                <label class="custom-control-label" for="Vision">Vision</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="brainInjuries" <?php echo $BrainInjuries?> name="disability[]" disabled=true class="custom-control-input" value="Acquired Brain Injuries">
                                                <label class="custom-control-label" for="brainInjuries">Acquired Brain Injuries</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-3">
                                                <input type="checkbox" id="medical" <?php echo $Medical?> name="disability[]" disabled=true class="custom-control-input" value="Medical">
                                                <label class="custom-control-label" for="medical">Medical</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="custom-control custom-checkbox col-10">
                                                <input type="checkbox" id="others" disabled=true name="disability[]" <?php echo $others?> value="others" class="custom-control-input">
                                                <label class="custom-control-label" for="others">Others (please specify)</label>
                                            </div>
                                            <input type="text" id="otherdisability" disabled=true name="others" class="form-control" placeholder="Other disability" value=<?php echo $otherdisabilities; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <?php
                                            if($allergies=="Yes"){
                                                $allergiesY="checked=true";
                                            }else if($allergies=="No allergies"){
                                                $allergiesN="checked=true";
                                            }
                                            ?>
                                        <p class="mb-1 mt-4 font-weight-bold">Do you have disability, impairment or medical condition that might affect your ability to study?</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="YesAllergy" name="allergy" class="custom-control-input" onclick="Disabledisability()" value="Yes" <?php echo $allergiesY ?>>
                                                <label class="custom-control-label" for="YesAllergy"  required>Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="NoAllergy" name="allergy" class="custom-control-input" onclick="Disabledisability()" value="No" <?php echo $allergiesN ?>>
                                                <label class="custom-control-label" for="NoAllergy">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <textarea type="text" id="allergydetails" name="allergydetails" class="form-control" disabled=true placeholder="If yes, please provide details:"><?php echo $allergydetails ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <?php
                                            if($risk=="Yes"){
                                                $riskY="checked=true";
                                            }else if($risk=="No"){
                                                $riskN="checked=true";
                                            }
                                            ?>
                                        <p class="mb-1 mt-4 font-weight-bold">If there any other condition that might pose a risk while attending training (Illegal Drug Use, Behavioural or Physical Violence)?</p>
                                        <div class="row">
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="YesRisk" name="risk" class="custom-control-input" onclick="DisableRisk()" value="Yes" <?php echo $riskY ?>>
                                                <label class="custom-control-label" for="YesRisk" required>Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio col-4">
                                                <input type="radio" id="NoRisk" name="risk" onclick="DisableRisk()" class="custom-control-input" value="No" <?php echo $riskN ?>>
                                                <label class="custom-control-label" for="NoRisk">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <textarea type="text" id="riskdetails" disabled=true name="riskdetails" class="form-control" placeholder="If yes, please provide details:"><?php echo $riskdetails ?></textarea>
                                        </div>
                                        <input type="hidden" class="user" value="<?php echo $_GET['id']; ?>" name="userID">
                                        <br>
                                <button type="submit" class="btn btn-primary center" name="submit">Submit</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<script type="text/javascript">
    function DisableNeeds() {
        if(!document.getElementById("YesNeeds").checked){
        document.getElementById("Hearing").checked=false;
        document.getElementById("Hearing").disabled=true;
        document.getElementById("Physical").checked=false;
        document.getElementById("Physical").disabled=true;
        document.getElementById("learningDifficulty").checked=false;
        document.getElementById("learningDifficulty").disabled=true;
        document.getElementById("Intellectual").checked=false;
        document.getElementById("Intellectual").disabled=true;
        document.getElementById("mentalIllness").checked=false;
        document.getElementById("mentalIllness").disabled=true;
        document.getElementById("Vision").checked=false;
        document.getElementById("Vision").disabled=true;
        document.getElementById("brainInjuries").checked=false;
        document.getElementById("brainInjuries").disabled=true;
        document.getElementById("medical").checked=false;
        document.getElementById("medical").disabled=true;
        document.getElementById("others").checked=false;
        document.getElementById("others").disabled=true;
        document.getElementById("otherdisability").value="";
        document.getElementById("otherdisability").disabled=true;
            
    }else{
        document.getElementById("Hearing").disabled=false;
        document.getElementById("Physical").disabled=false;
        document.getElementById("learningDifficulty").disabled=false;
        document.getElementById("Intellectual").disabled=false;
        document.getElementById("mentalIllness").disabled=false;
        document.getElementById("Vision").disabled=false;
        document.getElementById("brainInjuries").disabled=false;
        document.getElementById("medical").disabled=false;
        document.getElementById("others").disabled=false;
        document.getElementById("otherdisability").disabled=false;
    }
    }
    
    function Disabledisability(){
        if(document.getElementById("YesAllergy").checked){
        document.getElementById("allergydetails").disabled=false;
           }else{
        document.getElementById("allergydetails").disabled=true;     
           }
    }
    function DisableRisk(){
        if(document.getElementById("YesRisk").checked){
        document.getElementById("riskdetails").disabled=false;
           }else{
        document.getElementById("riskdetails").disabled=true;     
           }
    }
    
    function onStart(){
if(!document.getElementById("YesNeeds").checked){
        document.getElementById("Hearing").checked=false;
        document.getElementById("Hearing").disabled=true;
        document.getElementById("Physical").checked=false;
        document.getElementById("Physical").disabled=true;
        document.getElementById("learningDifficulty").checked=false;
        document.getElementById("learningDifficulty").disabled=true;
        document.getElementById("Intellectual").checked=false;
        document.getElementById("Intellectual").disabled=true;
        document.getElementById("mentalIllness").checked=false;
        document.getElementById("mentalIllness").disabled=true;
        document.getElementById("Vision").checked=false;
        document.getElementById("Vision").disabled=true;
        document.getElementById("brainInjuries").checked=false;
        document.getElementById("brainInjuries").disabled=true;
        document.getElementById("medical").checked=false;
        document.getElementById("medical").disabled=true;
        document.getElementById("others").checked=false;
        document.getElementById("others").disabled=true;
        document.getElementById("otherdisability").value="";
        document.getElementById("otherdisability").disabled=true;
            
    }else{
        document.getElementById("Hearing").disabled=false;
        document.getElementById("Physical").disabled=false;
        document.getElementById("learningDifficulty").disabled=false;
        document.getElementById("Intellectual").disabled=false;
        document.getElementById("mentalIllness").disabled=false;
        document.getElementById("Vision").disabled=false;
        document.getElementById("brainInjuries").disabled=false;
        document.getElementById("medical").disabled=false;
        document.getElementById("others").disabled=false;
        document.getElementById("otherdisability").disabled=false;
            }
        if(document.getElementById("YesAllergy").checked){
        document.getElementById("allergydetails").disabled=false;
           }else{
        document.getElementById("allergydetails").disabled=true;     
           }
        if(document.getElementById("YesRisk").checked){
        document.getElementById("riskdetails").disabled=false;
           }else{
        document.getElementById("riskdetails").disabled=true;     
           }
    }
    window.onload = onStart;
</script>
<?php 
    include('includes/footer.php');
    include('includes/foot.php');
?>  