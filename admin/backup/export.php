<body>
<link href="../../plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<?php
$connection = mysqli_connect('localhost', 'id9868298_root', 'ipsmcis_db2019', '');

$tables = array();
$result = mysqli_query($connection, "SHOW TABLES");
while ($row = mysqli_fetch_row($result)){
    $tables[] = $row[0];
}

$return = '';

foreach ($tables as $table) {
    $result = mysqli_query($connection, "SELECT * FROM ". $table);
    $num_fields = mysqli_num_fields($result);

    $return .= 'DROP TABLE '.$table.';';
    $row2 = mysqli_fetch_row(mysqli_query($connection, 'SHOW CREATE TABLE '.$table));
    $return .= "\n\n".$row2[1].";\n\n";

    for ($i=0;$i<$num_fields;$i++){
        while ($row = mysqli_fetch_row($result)){
            $return .= 'INSERT INTO '.$table.' VALUES(';
            for ($j=0;$j<$num_fields;$j++){
                $row[$j] = addslashes($row[$j]);
                if(isset($row[$j])){$return .= '"' .$row[$j]. '"';} else {$return .= '""';}
                if($j<$num_fields-1){$return .= ',';}
            }
            $return .="); \n";
        }
    }

    $return .="\n\n\n";
}
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d");

$handle = fopen("ipmscs_db - $datetime.sql", 'w+');
fwrite($handle, $return);
fclose($handle);
?>
<script>
    (function() {
        var proxied = window.alert;
        window.alert = function() {
            swal({
                text: "Successfully backed up PTMIS database!",
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