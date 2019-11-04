<!-- Sweet Alert Js  -->
<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $status = $_POST['status']; 
        
        $existing = $dbh->prepare("UPDATE `visa_application` SET `status` = '$status' WHERE `applicantsid` = '$id'");
        $existing->execute();

        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Updated a Visa Application','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Visa Application Updated",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        setTimeout(function(){location.href="../list-student-tourist.php"} , 500);   
                    })
                };
                })();
                alert();
       </script>
       
<?php  } ?>