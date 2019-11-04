<?php 

    include('../includes/db-connect.php');
        $id = $_GET['id'];
        
        $existing = $dbh->prepare("UPDATE `users` SET `disable` = '0' WHERE `userid` = $id");
        $existing->execute();
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Enabled a User','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
        echo "<script>window.location.href = '../list-users.php';</script>";


?>