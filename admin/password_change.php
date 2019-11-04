<body>
<link href="../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../assets/js/jquery.min.js"></script> 
<?php
include('includes/db-connect.php');

$username = $_POST['username'];
$newpassword = $_POST['newpassword'];
$confpassword = $_POST['confpassword'];
    if($newpassword == $confpassword){ 
$updatePassword = $dbh->prepare("UPDATE users SET password='$newpassword' where 
 username='$username'");
        $updatePassword->execute(); 

      ?>
 <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Password Changed!",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        setTimeout(function(){location.href="list-users.php"} , 500);   
                    })
                };
                })();
                alert();
       </script>
<?php  }else{ ?>
     <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Wrong Confirmation!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        setTimeout(function(){location.href="list-users.php"} , 500);   
                    })
                };
                })();
                alert();
       </script>
    <?php } ?>