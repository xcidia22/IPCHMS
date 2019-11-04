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
        title: {
            text: "Visa Application Status Year <?php echo $year ?>"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            indexLabel: "{label} {y}",
            dataPoints: [
                <?php foreach($rows as $row) { ?>
                    {y: <?php echo $row['total'] ?>, label: "<?php echo $row['status'] ?>"},
                <?php } ?>
            ]
        }]
    });
    chart.render();
    setTimeout(function(){ window.print(); }, 500)
    }
</script>