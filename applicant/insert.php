<?php
session_start();
$servername = "localhost";
$username = "id9868298_root";
$password = "ipsmcis_db2019";
$dbname = "id9868298_ipsmcis_db";
$con = mysqli_connect($servername,$username,$password,$dbname);
date_default_timezone_set("Asia/Manila");
$datetime = date('Y-m-d h:i:sa');
$uname = $_POST['uname'];
$msg = $_POST['msg'];
$sendto = $_POST['sendto'];
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
}
else{
	$user_id = "0";
}
mysqli_query($con,"INSERT into `messages` (`username`, `msg`,`datetime`,`sender_id`,`receiver_id`) VALUES ('".$uname."', '".$msg."','".$datetime."','".$user_id."','".$sendto."')");

?>