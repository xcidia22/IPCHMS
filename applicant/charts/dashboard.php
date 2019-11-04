<?php
    $year = date('Y');
    if(isset($_GET['year'])) {	$year=$_GET['year']; }

    $sJan = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jan' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJan->execute();
    $janStudent = $sJan->fetch();

    $sFeb = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Feb' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sFeb->execute();
    $febStudent = $sFeb->fetch();

    $sMarch = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Mar' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sMarch->execute();
    $marStudent = $sMarch->fetch();

    $sApril = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'April' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sApril->execute();
    $aprilStudent = $sApril->fetch();

    $sMay = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'May' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sMay->execute();
    $mayStudent = $sMay->fetch();

    $sJune = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jun' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJune->execute();
    $juneStudent = $sJune->fetch();

    $sJuly = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jul' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJuly->execute();
    $julyStudent = $sJuly->fetch();

    $sAug = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Aug' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sAug->execute();
    $augStudent = $sAug->fetch();

    $sSept = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Sep' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sSept->execute();
    $septStudent = $sSept->fetch();

    $sOct = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Oct' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sOct->execute();
    $octStudent = $sOct->fetch();

    $sNov = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Nov' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sNov->execute();
    $novStudent = $sNov->fetch();

    $sDec = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Dec' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sDec->execute();
    $decStudent = $sDec->fetch();


    // Tourist 

    $tJan = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jan' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJan->execute();
    $janTourist = $tJan->fetch();

    $tFeb = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Feb' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tFeb->execute();
    $febTourist = $tFeb->fetch();

    $tMarch = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Mar' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tMarch->execute();
    $marTourist = $tMarch->fetch();

    $tApril = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'April' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tApril->execute();
    $aprilTourist = $tApril->fetch();

    $tMay = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'May' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tMay->execute();
    $mayTourist = $tMay->fetch();

    $tJune = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jun' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJune->execute();
    $juneTourist = $tJune->fetch();

    $tJuly = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Jul' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJuly->execute();
    $julyTourist = $tJuly->fetch();

    $tAug = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Aug' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tAug->execute();
    $augTourist = $tAug->fetch();

    $sSept = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Sep' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sSept->execute();
    $sepTourist = $sSept->fetch();

    $sOct = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Oct' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sOct->execute();
    $octTourist = $sOct->fetch();

    $Nov = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Nov' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sNov->execute();
    $novTourist = $sNov->fetch();

    $sDec = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `month` = 'Dec' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sDec->execute();
    $decTourist = $sDec->fetch();
?>

<script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer",
            {
            theme: "light2",
            title: {
                text: "Number of Student and Tourist Per Month"
            },
            axisX: {
                title: "Month"
            },
            
            axisY: [
            {
                title: "Number of Clients",
                lineColor: "#4F81BC",
                tickColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                titleFontColor: "#4F81BC"
            }
            ],
            
            data: [
            {
                type: "column",
                showInLegend: true,	
                legendText: "Student",  	
                dataPoints: [
                { label: "January", y: <?php echo $janStudent['total'];  ?> },
                { label: "February", y: <?php echo $febStudent['total'];  ?> },
                { label: "March", y: <?php echo $marStudent['total'];  ?> },
                { label: "April", y: <?php echo $aprilStudent['total'];  ?> },
                { label: "May", y: <?php echo $mayStudent['total'];  ?> },
                { label: "June", y: <?php echo $juneStudent['total'];  ?> },
                { label: "July", y: <?php echo $julyStudent['total'];  ?> },
                { label: "August", y: <?php echo $augStudent['total'];  ?> },
                { label: "September", y: <?php echo $septStudent['total'];  ?> },
                { label: "October", y: <?php echo $octStudent['total'];  ?> },
                { label: "November", y: <?php echo $novStudent['total'];  ?> },
                { label: "December", y: <?php echo $decStudent['total'];  ?> },
                ]
            },
            {
            type: "column",
            showInLegend: true,	
            legendText: "Tourist",  	
            axisYIndex: 1,
            dataPoints: [      
                { label: "January", y: <?php echo $janTourist['total'];  ?> },
                { label: "February", y: <?php echo $febTourist['total'];  ?> },
                { label: "March", y: <?php echo $marTourist['total'];  ?> },
                { label: "April", y: <?php echo $aprilTourist['total'];  ?> },
                { label: "May", y: <?php echo $mayTourist['total'];  ?> },
                { label: "June", y: <?php echo $juneTourist['total'];  ?> },
                { label: "July", y: <?php echo $julyTourist['total'];  ?> },
                { label: "August", y: <?php echo $augTourist['total'];  ?> },
                { label: "September", y: <?php echo $sepTourist['total'];  ?> },
                { label: "October", y: <?php echo $octTourist['total'];  ?> },
                { label: "November", y: <?php echo $novTourist['total'];  ?> },
                { label: "December", y: <?php echo $decTourist['total'];  ?> },
                ]
            }
            ]
            });

            chart.render();
        }
</script>