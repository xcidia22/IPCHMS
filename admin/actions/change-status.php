<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['changeStatus']))
                            {  
                                $name = $_POST["name"];
                                $status = $_POST["status"];
                                if($status=="Pending"){
                                $resolved= "Resolved";
                                }else{
                                $resolved= "Pending";
                                }
                                $ids = $_POST["rowid"];
                            $schools = $dbh->prepare("UPDATE `student_monitoring` SET `status` = '".$resolved."' 
                            WHERE `id` = $ids");
                            $schools->execute();
        
        date_default_timezone_set("Asia/Manila");
            $dateNow = date('Y-m-d');
            $timeNow = date('h:i:s');
            $log_desc = $name.' - Changed Monitoring Status to '.$resolved;
            $insertLog = $dbh->prepare("INSERT INTO logs(
                `log_description`, 
                `date`, 
                `time`) VALUES('$log_desc','$dateNow','$timeNow')");
            $insertLog->execute();
                            
                
                ?>
                <script>
                    (function() {
                        var proxied = window.alert;
                        window.alert = function() {
                            swal({
                                text: "Status Changed",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                setTimeout(function(){location.href="../student_monitoring.php";} , 500);   
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
        
    
    
?>