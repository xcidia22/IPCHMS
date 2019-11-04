<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php 

    include('../includes/db-connect.php');
    if(isset($_POST['submit'])) {
        $name = $_POST['name']; 
        $address = $_POST['address'];
        $country = $_POST['country'];
        $contactP = $_POST['contactPerson'];
        $email = $_POST['emailAddress'];
        $contact = $_POST['contactNumber'];
        
        $existing = $dbh->prepare("SELECT * FROM `school_details` WHERE `school_name` LIKE '%".$name."%' LIMIT 1");
        $existing->execute();
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('".$name." School Added','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
        $row = $existing->rowCount();

        if($row == 1) { ?>
        <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "School Already Added",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    })
                };
                })();
                alert();
        </script>
        <?php }else {
            $insertSchool = $dbh->prepare("INSERT INTO `school_details` (`school_name`, `school_address`, `school_country`,`contact_person`,`email`, `school_contact`) VALUES ('".$name."', '".$address."', '".$country."', '".$contactP."', '".$email."', '".$contact."')");
            $insertSchool->execute(); ?>
            <script>
                (function() {
                    var proxied = window.alert;
                    window.alert = function() {
                        swal({
                            text: "School Successfully Added",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            setTimeout(function(){location.href="../list-college-university.php"} , 500);   
                        })
                    };
                    })();
                    alert();
            </script>
        <?php }
    }

?>