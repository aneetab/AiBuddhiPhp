<?php
    require('connection.inc.php');
    require('functions.inc.php');
    $outgoing_id=$_SESSION['USER_ID'];
    $sql = "SELECT * FROM client_users WHERE NOT client_id = '$outgoing_id' ORDER BY firstname,lastname";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "chat_data.php";
    }
    echo $output;
?>
