<?php
    $year = date('Y');
    if(isset($_GET['year'])) {	$year=$_GET['year']; }

    $query = $dbh->prepare("SELECT status, count(*) AS total FROM visa_application WHERE `year` = '$year' GROUP BY status");
    $query->execute();
    $rows = $query->fetchAll();

    $sQuery = $dbh->prepare("SELECT COUNT(LEFT(applicantsid , 1)) as total FROM users WHERE LEFT(applicantsid , 1) = 'S' AND `year` = '$year'");
    $sQuery->execute();
    $student = $sQuery->fetch();

    // Tourist 

    $tQuery = $dbh->prepare("SELECT COUNT(LEFT(applicantsid , 1)) as total FROM users WHERE LEFT(applicantsid , 1) = 'T' AND `year` = '$year'");
    $tQuery->execute();
    $tourist = $tQuery->fetch();

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

    $sNov = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Laos' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sNov->execute();
    $novTourist = $sNov->fetch();

    $sDec = $dbh->prepare("SELECT COUNT(*) as total FROM `student_school_matching` WHERE `country` = 'Brunei' && `year` = '$year' && courseid = 0 and `accept` = 1");
    $sDec->execute();
    $decTourist = $sDec->fetch();

    $scQuery1 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Australia' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery1->execute();
    $janT = $scQuery1->fetch();

    $scQuery2 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Canada' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery2->execute();
    $febT = $scQuery2->fetch();

 $scQuery3 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'New Zealand' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery3->execute();
    $marT = $scQuery3->fetch();

$scQuery4 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Thailand' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery4->execute();
    $aprT = $scQuery4->fetch();

$scQuery5 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Vietnam' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery5->execute();
    $mayT = $scQuery5->fetch();

$scQuery6 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Indonesia' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery6->execute();
    $junT = $scQuery6->fetch();

$scQuery7 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Malaysia' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery7->execute();
    $julT = $scQuery7->fetch();

$scQuery8 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Singapore' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery8->execute();
    $augT = $scQuery8->fetch();

$scQuery9 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Myanmar' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery9->execute();
    $sepT = $scQuery9->fetch();

$scQuery10 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Cambodia' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery10->execute();
    $octT = $scQuery10->fetch();

$scQuery11 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Laos' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery11->execute();
    $novT = $scQuery11->fetch();

$scQuery12 = $dbh->prepare("SELECT student_school_matching.country, longitude, latitude, COUNT(*) as total FROM student_school_matching INNER JOIN country on student_school_matching.country = country.country WHERE `year` = '$year' and `accept` = 1 AND country.country = 'Brunei' GROUP BY student_school_matching.country LIMIT 12 ");
    $scQuery12->execute();
    $decT = $scQuery12->fetch();
?>

<script>
    window.onload = function() {
   
    var chart1 = new CanvasJS.Chart("chartContainer1", {
        title: {
            text: "Visa Application Status"
        },
        legend:{
		horizontalAlign: "left",
		verticalAlign: "center",
	    },
        data: [{
            type: "pie",
            startAngle: 180,
            indexLabel: "{label} {y}",
            dataPoints: [
                <?php foreach($rows as $row) { ?>
                    {y: <?php echo $row['total'] ?>, label: "<?php echo $row['status'] ?>", 
                    color: <?php if($row['status'] == 'Approved'){echo '"#296e01"';}
                    elseif($row['status'] == 'Denied'){echo '"#F00"';}
                    elseif($row['status'] == 'Pending'){echo '"#FF0"';}
                    elseif($row['status'] == 'Recieved'){echo '"#00F"';}
                    elseif($row['status'] == 'Recieved / Incomplete'){echo '"#0d98ba"';} ?>},
                <?php } ?>
            ]
        }]
    });
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        title: {
            text: "Number of Registered Applicants"
        },
        legend:{
		cursor: "pointer",
        },
        data: [{
            type: "pie",
            startAngle: 240,
            showInLegend: true,
            toolTipContent: "{label}: <strong>{y} Applicants</strong>",
            indexLabel: "{y} {label}",
            legendText: "{label} (#percent%)",  
            dataPoints: [
                {y: <?php echo $student['total']; ?>, label: "Students"},
                {y: <?php echo $tourist['total']; ?>, label: "Tourists"}
            ]
        }]
    });
        
        var chart3 = new CanvasJS.Chart("chartContainer3",
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
        
        var chart4 = new CanvasJS.Chart("chartContainer4",
            {
            theme: "light2",
            title: {
                text: "Frequently Visited & Selected Countries"
            },
            
            data: [
            {
                type: "column",			
                dataPoints: [
                { label: "Australia", y: <?php echo $janT['total'];  ?> },
                { label: "Canada", y: <?php echo $febT['total'];  ?> },
                { label: "New Zealand", y: <?php echo $marT['total'];  ?> },
                { label: "Thailand", y: <?php echo $aprT['total'];  ?> },
                { label: "Vietnam", y: <?php echo $mayT['total'];  ?> },
                { label: "Indonesia", y: <?php echo $junT['total'];  ?> },
                { label: "Malaysia", y: <?php echo $julT['total'];  ?> },
                { label: "Singapore", y: <?php echo $augT['total'];  ?> },
                { label: "Myanmar", y: <?php echo $sepT['total'];  ?> },
                { label: "Cambodia", y: <?php echo $octT['total'];  ?> },
                { label: "Laos", y: <?php echo $novT['total'];  ?> },
                { label: "Brunei", y: <?php echo $decT['total'];  ?> },
                ]
            }
            ]
            });

    
        chart1.render();
        chart2.render();
        chart3.render();
        chart4.render();
        window.print();

        
    

    }
</script>