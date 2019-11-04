<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 
    $newpassword = "";
    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];

        if($password != $newpassword && $confirmpass == $newpassword){
            
        $existing = $dbh->prepare("UPDATE `users` SET `password` = '$newpassword'
        WHERE `applicantsid` = '$id'");
        $existing->execute();    
           
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
                        setTimeout(function(){location.href="../dashboard.php"} , 500);   
                    })
                };
                })();
                alert();
       </script>
 <?php }elseif ($confirmpass != $newpassword){ ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Confirm Password was wrong!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                setTimeout(function(){location.href="../dashboard.php"}, 500);
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
                                text: "You are using the same password!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                setTimeout(function(){location.href="../dashboard.php"}, 500);
                            })
                        };
                    })();
                    alert();
                </script>
            <?php } }?>