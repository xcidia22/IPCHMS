<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>

<?php
ini_set('max_execution_time', 0);
$connection = mysqli_connect('localhost', 'id9868298_root', 'ipsmcis_db2019', 'id9868298_ipsmcis_db');
$date = date("Y-m-d H:i:s");
$filename = 'ipmscs_db.sql';
$handle = fopen($filename, "r+");
$contents = fread($handle, filesize($filename));

$sql = explode(';', $contents);
foreach ($sql as $query){
    $result = mysqli_query($connection, $query);


}
fclose($handle);
?>

<script>
    (function() {
        var proxied = window.alert;
        window.alert = function() {
            swal({
                text: "Successfully imported database!",
                type: 'success',
                confirmButtonClass: 'btn btn-confirm mt-2',
                confirmButtonText: 'OK'
            }).then(function() {
                setTimeout(function(){location.href="../dashboard.php?id=2019"} , 500);   
            })
        };
        })();
        alert();
</script>