<?php
    require('connection.inc.php');
    
    $outgoing_id = $_SESSION['USER_ID'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM client_users WHERE NOT client_id = {$outgoing_id} AND (firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "chat_data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>