
<?php
  set_time_limit(0);
  
try {
    $user = 'id9868298_root';
    $pass = 'ipsmcis_db2019';
    $dbh = new PDO('mysql:host=localhost;dbname=id9868298_ipsmcis_db', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
