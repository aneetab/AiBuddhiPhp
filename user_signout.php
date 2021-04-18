<?php
require ('connection.inc.php');
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_EMAIL']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ROLE']);
unset($_SESSION['USER_LNAME']);
unset($_SESSION['USER_PIC']);
$status = "Offline";
$id=$_SESSION['USER_ID'];
$sql = mysqli_query($con, "UPDATE client_users SET status = '$status' WHERE client_id ='$id'");
unset($_SESSION['USER_ID']);
header('location:landing.php');
die();
?>