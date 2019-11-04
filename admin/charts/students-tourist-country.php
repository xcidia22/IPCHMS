<?php
    $year = date('Y');
    if(isset($_GET['year'])) {	$year=$_GET['year']; }

    $sJan = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Australia' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJan->execute();
    $janStudent = $sJan->fetch();

    $sFeb = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Canada' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sFeb->execute();
    $febStudent = $sFeb->fetch();

    $sMarch = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'New Zealand' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sMarch->execute();
    $marStudent = $sMarch->fetch();

    $sApril = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Thailand' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sApril->execute();
    $aprilStudent = $sApril->fetch();

    $sMay = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Vietnam' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sMay->execute();
    $mayStudent = $sMay->fetch();

    $sJune = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Indonesia' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJune->execute();
    $juneStudent = $sJune->fetch();

    $sJuly = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Malaysia' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sJuly->execute();
    $julyStudent = $sJuly->fetch();

    $sAug = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Singapore' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sAug->execute();
    $augStudent = $sAug->fetch();

    $sSept = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Myanmar' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sSept->execute();
    $septStudent = $sSept->fetch();

    $sOct = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Cambodia' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sOct->execute();
    $octStudent = $sOct->fetch();

    $sNov = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Laos' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sNov->execute();
    $novStudent = $sNov->fetch();

    $sDec = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Brunei' && `year` = '$year' && traveldest = 0 and `accept` = 1");
    $sDec->execute();
    $decStudent = $sDec->fetch();


    // Tourist 

    $tJan = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Australia' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJan->execute();
    $janTourist = $tJan->fetch();

    $tFeb = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Canada' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tFeb->execute();
    $febTourist = $tFeb->fetch();

    $tMarch = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'New Zealand' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tMarch->execute();
    $marTourist = $tMarch->fetch();

    $tApril = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Thailand' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tApril->execute();
    $aprilTourist = $tApril->fetch();

    $tMay = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Vietnam' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tMay->execute();
    $mayTourist = $tMay->fetch();

    $tJune = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Indonesia' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJune->execute();
    $juneTourist = $tJune->fetch();

    $tJuly = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Malaysia' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tJuly->execute();
    $julyTourist = $tJuly->fetch();

    $tAug = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Singapore' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $tAug->execute();
    $augTourist = $tAug->fetch();

    $sSept = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Myanmar' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sSept->execute();
    $sepTourist = $sSept->fetch();

    $sOct = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Cambodia' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sOct->execute();
    $octTourist = $sOct->fetch();

    $Nov = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Laos' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sNov->execute();
    $novTourist = $sNov->fetch();

    $sDec = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Brunei' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sDec->execute();
    $decTourist = $sDec->fetch();
?>

<script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer",
            {
            theme: "light2",
            title: {
                text: "Number of Student and Tourist Per country"
            },

            axisX: {
                title: "Country"
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
                { label: "Australia", y: <?php echo $janStudent['total'];  ?> },
                { label: "Canada", y: <?php echo $febStudent['total'];  ?> },
                { label: "New Zealand", y: <?php echo $marStudent['total'];  ?> },
                { label: "Thailand", y: <?php echo $aprilStudent['total'];  ?> },
                { label: "Vietnam", y: <?php echo $mayStudent['total'];  ?> },
                { label: "Indonesia", y: <?php echo $juneStudent['total'];  ?> },
                { label: "Malaysia", y: <?php echo $julyStudent['total'];  ?> },
                { label: "Singapore", y: <?php echo $augStudent['total'];  ?> },
                { label: "Myanmar", y: <?php echo $septStudent['total'];  ?> },
                { label: "Cambodia", y: <?php echo $octStudent['total'];  ?> },
                { label: "Laos", y: <?php echo $novStudent['total'];  ?> },
                { label: "Brunei", y: <?php echo $decStudent['total'];  ?> },
                ]
            },
            {
            type: "column",
            axisYIndex: 1,
            showInLegend: true,
            legendText: "Tourist",  
            dataPoints: [      
                { label: "Australia", y: <?php echo $janTourist['total'];  ?> },
                { label: "Canada", y: <?php echo $febTourist['total'];  ?> },
                { label: "New Zealand", y: <?php echo $marTourist['total'];  ?> },
                { label: "Thailand", y: <?php echo $aprilTourist['total'];  ?> },
                { label: "Vietnam", y: <?php echo $mayTourist['total'];  ?> },
                { label: "Indonesia", y: <?php echo $juneTourist['total'];  ?> },
                { label: "Malaysia", y: <?php echo $julyTourist['total'];  ?> },
                { label: "Singapore", y: <?php echo $augTourist['total'];  ?> },
                { label: "Myanmar", y: <?php echo $sepTourist['total'];  ?> },
                { label: "Cambodia", y: <?php echo $octTourist['total'];  ?> },
                { label: "Laos", y: <?php echo $novTourist['total'];  ?> },
                { label: "Brunei", y: <?php echo $decTourist['total'];  ?> },
                ]
            }
            ]
            });

            chart.render();
        }
</script>