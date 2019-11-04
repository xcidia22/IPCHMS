<?php
session_start();
$servername = "localhost";
$username = "id9868298_root";
$password = "ipsmcis_db2019";
$dbname = "id9868298_ipsmcis_db";
$con = mysqli_connect($servername,$username,$password,$dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$datetime = date("Y-m-d H:i:s");

if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
}
else{
	$user_id = "0";
}
$from = $_REQUEST['from'];
$result0 = mysqli_query($con, "SELECT * FROM `messages` WHERE `sender_id`='$from' AND `receiver_id`='$user_id' AND `seen` = '0'");
$unread_count = mysqli_num_rows($result0);
echo $unread_count;
?>