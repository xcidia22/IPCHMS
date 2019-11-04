
<?php 
    $year = date('Y');
    include("admin/includes/db-connect.php");
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = $dbh->prepare("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND disable = 0");
        $sql->execute();
        $result = $sql->fetch();
        $row = $sql->rowCount();
        if($row == 1) {
            if($result['usertype'] == 'Admin') {
                $_SESSION['userid'] = $result['userid'];
                $_SESSION['applicantsid'] = $result['applicantsid'];
                $_SESSION['user_id'] = $result['userid'];
                $_SESSION['login_username'] = $result['username'];
                $_SESSION['fullname'] = $result['fullname'];
                $_SESSION['usertype'] = $result['usertype'];
                echo "<script>window.location.href = 'admin/dashboard.php?year=".$year."';</script>";
            }else {
                 $_SESSION['userid'] = $result['userid'];
                $_SESSION['applicantsid'] = $result['applicantsid'];
                $_SESSION['user_id'] = $result['userid'];
                $_SESSION['login_username'] = $result['username'];
                $_SESSION['fullname'] = $result['fullname'];
                $_SESSION['usertype'] = $result['usertype'];
                echo "<script>window.location.href = 'applicant/dashboard.php?year=".$year."';</script>";
            }
        }else {
            echo "<script>alert('Incorrect Username or Password'); window.location.href = 'index.php';</script>";
        }

    }
?>