<?php
    $year = date('Y');
    if(isset($_GET['year'])) {	$year=$_GET['year']; }

    $sQuery = $dbh->prepare("SELECT COUNT(LEFT(applicantsid , 1)) as total FROM users WHERE LEFT(applicantsid , 1) = 'S' AND `year` = '$year'");
    $sQuery->execute();
    $student = $sQuery->fetch();

    // Tourist 

    $tQuery = $dbh->prepare("SELECT COUNT(LEFT(applicantsid , 1)) as total FROM users WHERE LEFT(applicantsid , 1) = 'T' AND `year` = '$year'");
    $tQuery->execute();
    $tourist = $tQuery->fetch();

?>

<script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
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
    chart.render();
    }
</script>