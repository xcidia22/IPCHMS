<?php 
    include('../includes/db-connect.php');
    date_default_timezone_set('Asia/Manila');
    $userid = $_GET['userid'];
    $year = date('Y');
    $month = date('m');
    $dateObj   = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F'); // March
    $ids = explode(",",$_GET['ids']);

    
    foreach($ids as $id) {
        $now = date('Y-m-d H:i:s');
        $insertSchool = $dbh->prepare("UPDATE student_school_matching SET `accept` = 1 
            WHERE `traveldest` = '$id' 
            AND `applicantsid` = '$userid'");
        $insertSchool->execute();
    }

    echo "<script>window.location.href = '../find-match-tourist.php?id=$userid';</script>";

?>