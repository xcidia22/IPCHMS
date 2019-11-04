<?php 

    include('../includes/db-connect.php');
    
        $id = $_GET['id'];
        $existing = $dbh->prepare("DELETE FROM `courses` WHERE `id` = '$id'");
        $existing->execute();   
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('Y-m-d');
        $timeNow = date('h:i:s');
        $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Deleted A Course','".$dateNow."','".$timeNow."')");
        $insertLog->execute(); 
        echo "<script>window.location.href = '../list-program-of-study.php';</script>";
        
?>