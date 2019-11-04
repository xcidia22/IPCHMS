<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        
        $existing = $dbh->prepare("UPDATE `users` SET `fullname` = '$name', `username` = '$username', `password` = '$password', `email` = '$email'
        WHERE `userid` = $id");
        $existing->execute();   

        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`User ".$name." Updated`, `date`, `time`) VALUES('Updated A User','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "User Updated",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        setTimeout(function(){location.href="../list-users.php"} , 500);   
                    })
                };
                })();
                alert();
       </script>
<?php } ?>