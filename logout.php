<?php
require ('connection.inc.php');
$email=$_SESSION['USER_EMAIL'];
$sme="SELECT * from sme_apply where email='$email'";
$res=mysqli_query($con,$sme);
$id=$_SESSION['USER_ID'];
if(mysqli_num_rows($res)<1)
{
    $delete="DELETE from resume where client_id='$id'";
    mysqli_query($con,$delete);
}
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
header('location:index.php');
die();
?>