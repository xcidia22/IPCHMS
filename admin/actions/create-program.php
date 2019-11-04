<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $program = $_POST['program']; 
        $category = $_POST['category'];
        $school = $_POST['school'];
        
        $existing = $dbh->prepare("SELECT course, school_id FROM `courses` WHERE `course` LIKE '%".$program."%' AND `school_id` LIKE '%".$school."%'  DESC LIMIT 1");
        $existing->execute();
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('".$program." Program Added','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
        $row = $existing->rowCount();

        if($row == 1) { ?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "Program Already Added",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    })
                };
                })();
                alert();
        </script>
        <?php }else {
            $insertSchool = $dbh->prepare("INSERT INTO `courses` (`course`, `school_id`, `category`) VALUES ('".$program."', '".$school."', '".$category."')");
            $insertSchool->execute(); ?>
            <script>
                (function() {
                    var proxied = window.alert;
                    window.alert = function() {
                        swal({
                            text: "Course Successfully Added",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            setTimeout(function(){location.href="../list-program-of-study.php"} , 500);   
                        })
                    };
                    })();
                    alert();
            </script>
        <?php }
    }

?>