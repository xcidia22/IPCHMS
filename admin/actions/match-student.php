<?php 
    include('../includes/db-connect.php');
    date_default_timezone_set('Asia/Manila');
    $userid = $_GET['userid'];
    $year = date('Y');
    $month = date('M');
    //$dateObj   = DateTime::createFromFormat('!m', $month);
    //$monthName = $dateObj->format('F'); // March
    $ids = explode(",",$_GET['ids']);
    
    foreach($ids as $id) {
        $match = $dbh->prepare("SELECT * FROM `school_details` INNER JOIN `courses` ON `school_details`.`school_id`=`courses`.`school_id` WHERE `courses`.`id` = '$id'");
        $match->execute();

        $array = $match->fetchAll(PDO::FETCH_ASSOC);

        foreach($array as $arr) {
            $country = $arr['school_country'];
            $now = date('Y-m-d H:i:s');
            $insertSchool = $dbh->prepare("INSERT INTO student_school_matching
            (`applicantsid`, `courseid`, `traveldest`, `country`, `date_encoded`, `month`, `year`, `accept`) values('$userid', '$id', '0', '$country', '$now', '$month', '$year', '0')");
            $insertSchool->execute();
            date_default_timezone_set("Asia/Manila");
            $dateNow = date('Y-m-d');
            $timeNow = date('h:i:s');
            $insertLog = $dbh->prepare("INSERT INTO logs(`log_description`, `date`, `time`) VALUES('Added New Match For Student','".$dateNow."','".$timeNow."')");
            $insertLog->execute(); 
        }
    }

    echo "<script>window.location.href = '../matching-student.php';</script>";

?>