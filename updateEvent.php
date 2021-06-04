<?php
include "functions.inc.php";
include "connection.inc.php";
if(isset($_POST['updateevent']))
{
$id=get_safe_value($con,$_POST['eventid']);
$update="UPDATE events set alerted='1' where id='$id'";
if(mysqli_query($con,$update))
echo "UPDATED";
else 
echo "NO";
}
?>