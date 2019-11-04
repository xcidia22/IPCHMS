<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 
    
    include('../includes/db-connect.php');
    
    if(isset($_POST['add'])) {
        $name = $_POST['name']; 
        $issue = $_POST['issue'];
        $ddate = $_POST['ddate'];
        $remarks = $_POST['remarks'];
        $now = date('Y-m-d H:i:s');



         $existing = $dbh->prepare("SELECT * FROM `student_monitoring` WHERE `name` LIKE '%".$name."%' AND `dateencoded` LIKE '%".$now."%'  DESC LIMIT 1");
        $existing->execute();
        date_default_timezone_set('Asia/Manila');
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('New Monitoring record is added','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
        $row = $existing->rowCount();

        if($row == 1) { ?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Concern Already Added",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    })
                };
                })();
                alert();
        </script>
        <?php }else {
            $insertConcern = $dbh->prepare("INSERT INTO `student_monitoring` (`name`, `issue`, `duedate`, `remarks`,`dateencoded`,`status`) VALUES ('".$name."', '".$issue."', '".$ddate."','".$remarks."','".$now."','Pending')");
            $insertConcern->execute(); ?>
            <script>
                (function() {
                    var proxied = window.alert;
                    window.alert = function() {
                        swal({
                            text: "Concern Successfully Added",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            setTimeout(function(){location.href="../student_monitoring.php"} , 500);   
                        })
                    };
                    })();
                    alert();
            </script>
        <?php }
    }

?>