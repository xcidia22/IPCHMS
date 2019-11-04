<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $category = null;
        $category = $_POST['category']; 
        $username = $_POST['username'];
        $password = "12345";
        $title = $_POST['title']; 
        $name = $_POST['FirstName'].' '.$_POST['MiddleName'].' '.$_POST['LastName'];
        $gender = $_POST['gender'];
        $birthday = $_POST['dateOfBirth'];
        $nationality = "Filipino";
        $address = $_POST['address'];
        $homeNumber=$_POST['homeNumber'];
        $mobileNumber = $_POST['mobilePhoneNumber'];
        $passport = $_POST['passport'];
        $email = $_POST['emailAdress'];
        $civilstatus = $_POST['civilstatus'];
        $cpassport = $_POST['cpassport'];
        $dissue = $_POST['dissue'];
        $pissue = $_POST['pissue'];
        $birthplace = $_POST['birthplace'];
    
        $year = date("Y");
        $month = date("m");

        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F'); 

        $checkTheSame = $dbh->prepare("SELECT * FROM `users` WHERE `username` LIKE '$username' LIMIT 1");
        $checkTheSame->execute();

        $checkRow = $checkTheSame->rowCount();
        if($checkRow > 0) { ?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Username has been taken",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    })
                };
                
                })();
                alert();
       </script>
        <?php }

        if($category == "Student") {
            $query = $dbh->prepare("SELECT * FROM `visa_application` WHERE `applicantsid` LIKE 'S".$year."%' ORDER BY `counter` DESC LIMIT 1");
        }else {
            $query = $dbh->prepare("SELECT * FROM `visa_application` WHERE `applicantsid` LIKE 'T".$year."%' ORDER BY `counter` DESC LIMIT 1");
        }

        $query->execute();
        $row = $query->rowCount();
        if($row > 0) {
            $result = $query->fetch();
            $counter = $result['counter'];
            $counter++;
        }else {
            $counter = 1;
        }
        
        $strlencounter = strlen($counter);
        $counter0 = $counter;
        if($strlencounter == "1") {
            $counter = "00".$counter;
        }
        else if($strlencounter == "2") {
            $counter = "0".$counter;
        }
        if($category == "Student") {
            $category_id = "S".$year."".$counter;
        }
        else {
            $category_id = "T".$year."".$counter;
        }
        
        $existing = $dbh->prepare("SELECT * FROM `visa_application`,`users` WHERE `firstname` LIKE '".$_POST['FirstName']."' AND `middlename` LIKE '".$_POST['MiddleName']."' AND `lastname` LIKE '".$_POST['LastName']."' AND `category` LIKE '".$category."' AND `passport` LIKE '".$passport."'");
        $existing->execute();
        $rows = $existing->rowCount();

        if($rows == 0){
            if (!file_exists('../../uploads/'.$category_id)) {
                mkdir('../../uploads/'.$category_id, 0777, true);
            }
            $target_dir = "../../uploads/".$category_id."/";
            $file1 = "";
            $file2 = "";
            $file3 = "";
            $file4 = "";
            if(isset($_FILES['nso'])) {
                $temp1 = explode(".", $_FILES["nso"]["name"]);
                $file1 = "nso".'.'.end($temp1);
            }
            if(isset($_FILES['ielts'])) {
                $temp2 = explode(".", $_FILES["ielts"]["name"]);
                $file2 = "ielts".'.'.end($temp2);
            }
            if(isset($_FILES['nbi'])) {
                $temp3 = explode(".", $_FILES["nbi"]["name"]);
                $file3 = "nbi".'.'.end($temp3);
            }
            if(isset($_FILES['picture'])) {
                $temp4 = explode(".", $_FILES["picture"]["name"]);
                $file4 = "picture".'.'.end($temp4);
            }
            $temp_file1 = $target_dir . basename($file1);
            $temp_file2 = $target_dir . basename($file2);
            $temp_file3 = $target_dir . basename($file3);
            $temp_file4 = $target_dir . basename($file4);
            $uploadOk1 = 1;
            $uploadOk2 = 1;
            $uploadOk3 = 1;
            $uploadOk4 = 1;
            $file_1 = false;
            $file_2 = false;
            $file_3 = false;
            $file_4 = false;

            
            $imageFileType1 = strtolower(pathinfo($temp_file1,PATHINFO_EXTENSION));

            if ($uploadOk1 == 1 && $imageFileType1 == "jpg" || $imageFileType1 == "jpeg" || $imageFileType1 == "png" ) {
                if (move_uploaded_file($_FILES["nso"]["tmp_name"], $temp_file1)) {
                    $file_1 = true;
                    
                } 
            }else{
                $file_1 = false;
               
            }
            
            $imageFileType2 = strtolower(pathinfo($temp_file2,PATHINFO_EXTENSION));

            if ($uploadOk2 == 1 && $imageFileType2 == "jpg" || $imageFileType2 == "jpeg" || $imageFileType2 == "png" ) {
                if (move_uploaded_file($_FILES["ielts"]["tmp_name"], $temp_file2)) {
                    $file_2 = true;
                } 
            }else{
                $file_2 = false;
                
            }
            
            $imageFileType3 = strtolower(pathinfo($temp_file3,PATHINFO_EXTENSION));

            if ($uploadOk3 == 1 && $imageFileType3 == "jpg" || $imageFileType3 == "jpeg" || $imageFileType3 == "png" ) {
                if (move_uploaded_file($_FILES["nbi"]["tmp_name"], $temp_file3)) {
                    $file_3 = true;
                    
                } 
            }else{
                $file_3 = false;
               
            }

            $imageFileType4 = strtolower(pathinfo($temp_file4,PATHINFO_EXTENSION));

            if ($uploadOk4 == 1 && $imageFileType4 == "jpg" || $imageFileType4 == "jpeg" || $imageFileType4 == "png" ) {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $temp_file4)) {
                    $file_4 = true;
                   
                } 
            }else{
                $file_4 = false;
               
            }

            $tempfile01 = $temp_file1;
            $tempfile02 = $temp_file2;
            $tempfile03 = $temp_file3;
            $tempfile04 = $temp_file4;

            if($file_1 == true && $file_2 == true && $file_3 == true && $file_4 == true ){
                $datenow = date("Y-m-d");
                $month_substr = substr($monthName, 0, 3);

                $sql = "INSERT INTO `visa_application` (
                    `applicantsid`, 
                    `counter`, 
                    `category`, 
                    `title`, 
                    `firstname`, 
                    `middlename`, 
                    `lastname`, 
                    `gender`, 
                    `dateofbirth`, 
                    `birthplace`, 
                    `nationality`,
                    `civilstatus`, 
                    `address`, 
                    `passport`,
                    `home`, 
                    `mobile`, 
                    `emailaddress`, 
                    `status`, 
                    `datecreated`,
                    `countryofpassport`,
                    `dateofissue`,
                    `placeofissue`, 
                    `nso`, 
                    `ielts`, 
                    `nbi`, 
                    `picture`,
                    `month`,
                    `year`) VALUES (
                    '$category_id', 
                    '$counter0', 
                    '$category', 
                    '$title', 
                    '{$_POST['FirstName']}', 
                    '{$_POST['MiddleName']}', 
                    '{$_POST['LastName']}', 
                    '$gender', 
                    '$birthday', 
                    '$birthplace', 
                    '$nationality', 
                    '$civilstatus', 
                    '$address', 
                    '$passport',
                    '$homeNumber', 
                    '$mobileNumber', 
                    '$email', 
                    'Pending', 
                    '$datenow', 
                    '$cpassport', 
                    '$dissue', 
                    '$pissue', 
                    '$tempfile01', 
                    '$tempfile02', 
                    '$tempfile03', 
                    '$tempfile04', 
                    '$month_substr', 
                    '$year')";
                $insertApplication = $dbh->prepare($sql);
                $insertApplication->execute();
                
                $sql = "INSERT INTO `users`(
                    `fullname`, 
                    `username`, 
                    `password`, 
                    `usertype`, 
                    `disable`, 
                    `applicantsid`, 
                    `month`, 
                    `year`) VALUES(
                        '$name',
                        '$username', 
                        '$password', 
                        'Client', 
                        '0', 
                        '$category_id', 
                        '$month_substr', 
                        '$year')";
                $insertUser = $dbh->prepare($sql);
                $insertUser->execute(); 
                
                date_default_timezone_set("Asia/Manila");
                $dateNow = date('Y-m-d');
                $timeNow = date('h:i:s');
                $log_desc = $_POST['FirstName'].' '.$_POST['MiddleName'].' '.$_POST['LastName'].' - Visa Application Added';
                $sql = "INSERT INTO logs(
                    `log_description`,
                    `date`, 
                    `time`) VALUES(
                        '$log_desc',
                        '$dateNow',
                        '$timeNow')";
                $insertLog = $dbh->prepare($sql);
                $insertLog->execute();
                ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Visa Application Added",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                setTimeout(function(){location.href="../list-student-tourist.php";} , 500);   
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
        }
    }else {
        echo "error";
    }

    header("Location: ../list-student-tourist.php");
?>