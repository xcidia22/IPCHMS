<?php 

    include('../includes/db-connect.php');
    
        $id = $_GET['id'];
        $existing = $dbh->prepare("DELETE FROM `school_details` WHERE `school_id` = $id");
        $existing->execute();   
        date_default_timezone_set("Asia/Manila");
                $dateNow = date('Y-m-d');
                $timeNow = date('h:i:s');
                $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Deleted a School','".$dateNow."','".$timeNow."')");
                $insertLog->execute(); 
        echo "<script>window.location.href = '../list-college-university.php';</script>";
        
?>