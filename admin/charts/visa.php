<?php
    $year = date('Y');
    if(isset($_GET['year'])) {	$year=$_GET['year']; }

    $query = $dbh->prepare("SELECT status, count(*) AS total FROM visa_application WHERE `year` = '$year' GROUP BY status");
    $query->execute();
    $rows = $query->fetchAll();

?>

<script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Visa Application Status"
        },
        legend:{
		horizontalAlign: "left",
		verticalAlign: "center",
	    },
        data: [{
            type: "pie",
            startAngle: 240,
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
    chart.render();

    }
</script>