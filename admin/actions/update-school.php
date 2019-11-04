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
        $address = $_POST['address'];
        $country = $_POST['country'];
        $contact = $_POST['contact'];
        $contact_person = $_POST['contactPerson'];
        $email = $_POST['email'];
        
        $existing = $dbh->prepare("UPDATE `school_details` SET `school_name` = '$name', `school_address` = '$address', `school_country` = '$country', `school_contact` = '$contact', `contact_person` = '$contact_person', `email` = '$email' WHERE `school_id` = '$id'");
        $existing->execute();   
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Updated A School','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 

?>
    <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "School Updated",
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
<?php  } ?>