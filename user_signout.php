<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_EMAIL']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ROLE']);
unset($_SESSION['USER_LNAME']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_PIC']);
header('location:landing.php');
die();
?>