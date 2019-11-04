<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $applicantsid = $_POST['userID'];
        $category = null;
        $category = "Student";
        $title = $_POST['title']; 
        $name = $_POST['GivenName'].' '.$_POST['FamilyName'];
        $gender = $_POST['gender'];
        $birthday = $_POST['dateOfBirth'];
        $nationality = "Filipino";
        $citizen = $_POST['citizen'];
        $countryofbirth = $_POST['countryofbirth'];
        $country = $_POST['country'];
        $homenumber = $_POST['homenumber'];
        $mobilenumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $unit = $_POST['unit#'];
        $street = $_POST['street#'];
        $streetname = $_POST['streetname'];
        $suburb=$_POST['suburb'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];
        $country = $_POST['country'];
        $needs = $_POST['Needs'];
        $otherdisabilities="";
        $temp="";
        $riskdetails = ""; 
        $allergydetails= "";
        if (isset($_POST['disability[]'])&&$needs="Yes")
        {
            $needs = implode(',', $_POST['$disabilities']);
        }  
        $allergy = $_POST['allergy'];
        if($allergy=="Yes"){
            $allergydetails = htmlspecialchars($_POST['allergydetails']);
        }else{
            $allergydetails= "No allergies";
        }
        $risk = $_POST['risk'];
        if($risk=="Yes"){
            $riskdetails = htmlspecialchars($_POST['riskdetails']);
        }else{
            $riskdetails = "No suspectable risk";
        }

        
    
        $year = date("Y");
        $month = date("m");

        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F'); 
?>
        <?php 
        $existing = $dbh->prepare("SELECT * FROM `visa_admission`,`users` WHERE `givenname` LIKE '".$_POST['GivenName']."' AND `familyname` LIKE '".$_POST['FamilyName']);
        $existing->execute();
        
        $delete = $dbh->prepare("DELETE FROM `visa_admission` WHERE applicantsid='".$applicantsid."'");
        $delete->execute();
        $rows = $existing->rowCount();
        if(!empty($_POST['disability'])){
            
// Loop to store and display values of individual checked checkbox.
            foreach($_POST['disability'] as $selected){
                if($temp==""){
                    $temp = $selected;
                }else if($selected!=""){
                $temp=$temp.",".$selected;
                }
                
                if($selected=="others"){
                    $otherdisabilities = $_POST['others'];
                }
            }
        }

        /*
        INSERT INTO `visa_admission`(`id`, `applicantsid`, `category`, `title`, `givenname`, `familyname`, `gender`, `dateofbirth`, `countryofbirth`, `nationality`, `unit`, `street`, `streetname`, `suburb`, `state`, `postalcode`, `home`, `mobile`, `emailaddress`, `datecreated`, `month`, `year`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22])
        */
            
            if(true){
                $insertApplication = $dbh->prepare("INSERT INTO `visa_admission` (`id`, `applicantsid`, `category`, `title`, `givenname`, `familyname`, `gender`, `dateofbirth`, `countryofbirth`, `nationality`, `citizen`, `unit`, `street`, `streetname`, `suburb`, `state`, `country`, `postalcode`, `home`, `mobile`, `emailaddress`, `datecreated`, `month`, `year`, `needs`, `allergies`, `allergydetails`, `risk`, `riskdetails`, `disabilities`, `otherdisabilities`) VALUES (NULL, '".$applicantsid."', '".$category."', '".$title."', '".$_POST['GivenName']."', '".$_POST['FamilyName']."', '".$gender."', '".$birthday."', '".$countryofbirth."', '".$nationality."', '".$citizen."', '".$unit."', '".$street."', '".$streetname."', '".$suburb."', '".$state."', '".$country."', '".$postcode."', '".$homenumber."', '".$mobilenumber."', '".$email."', '".date("Y-m-d")."', '".$month."', '".$year."', '".$needs."', '".$allergy."', '".$allergydetails."', '".$risk."', '".$riskdetails."', '".$temp."', '".$otherdisabilities."')");
                $insertApplication->execute();
                date_default_timezone_set("Asia/Manila");
                $dateNow = date('Y-m-d');
                $timeNow = date('h:i:s');
                $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('".$_POST['GivenName']." ".$_POST['FamilyName']." - Visa Admission Added','".$dateNow."','".$timeNow."')");
                $insertLog->execute(); 
                
                ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Visa Admission Added",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                setTimeout(function(){location.href="../list-of-student.php";} , 500);   
                            })
                        };
                        })();
                        alert();
                </script>
            <?php }else { ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Data Not Inserted",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            })
                        };
                        })();
                        alert();
                </script>
            <?php }
        
    }else {
        echo "error";
    }
    
    
?>