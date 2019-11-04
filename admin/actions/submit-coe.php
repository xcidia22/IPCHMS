<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 
    
    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
         $con=mysqli_connect("localhost","id9868298_root","ipsmcis_db2019","id9868298_ipsmcis_db");
        $applicantsid = $_POST['userID'];
        $sql="SELECT * FROM visa_admission WHERE applicantsid='".$applicantsid."'";
        $applicantsid = "";
        $givenname = "";
        $lastname =  "";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
        $applicantsid = $row[1];
        $givenname = $row[4];
        $lastname =  $row[5];
    }
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($con);
        
        $check = $_FILES['lettercoe'];
        $temp1 = explode(".", $_FILES["lettercoe"]["name"]);
                $file1 = "certificate of enrollment".'.'.end($temp1);
        $applicantsid = $_POST['userID'];
        
        date_default_timezone_set("Asia/Manila");
            $dateNow = date('Y-m-d');
            $timeNow = date('h:i:s');
            $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('".$givenname." ".$lastname." - Certificate of Enrollment Submitted','".$dateNow."','".$timeNow."')");
                $insertLog->execute();
        
        if(end($temp1)!=""){
            if (!file_exists('../../uploads/'.$applicantsid)) {
                mkdir('../../uploads/'.$applicantsid, 0777, true);
            }
            $target_dir = "../../uploads/".$applicantsid."/";
            $file1 = "";
            if(isset($_FILES['lettercoe'])) {
                $temp1 = explode(".", $_FILES["lettercoe"]["name"]);
                $file1 = "certificate of enrollment".'.'.end($temp1);
            }
            $temp_file1 = $target_dir . basename($file1);
            $uploadOk1 = 1;
            $file_1 = false;

            $imageFileType1 = strtolower(pathinfo($temp_file1,PATHINFO_EXTENSION));

            if ($uploadOk1 == 1 && $imageFileType1 == "jpg" || $imageFileType1 == "jpeg" || $imageFileType1 == "png" ) {
                if (move_uploaded_file($_FILES["lettercoe"]["tmp_name"], $temp_file1)) {
                    $file_1 = true;
                    
                } 
            }else{
                $file_1 = false;
               
            }

            $tempfile01 = $temp_file1;
                ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Certificate of Enrollment Uploaded",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                setTimeout(function(){location.href="../certificate_of_enrollment.php";} , 500);   
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
                            }).then(function() {
                                setTimeout(function(){location.href="../certificate_of_enrollment.php";} , 500);   
                            })
                        };
                        })();
                        alert();
                </script>
            <?php }
        }
    
    
?>