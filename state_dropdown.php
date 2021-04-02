<?php
require('connection.inc.php');
$id=$_GET['cid'];
$sql=mysqli_query($con,"select states.name as statename, cities.name as cityname,cities.id as id from countries,states,cities where states.country_id=countries.id and cities.state_id=states.id and countries.id='$id'");
if(mysqli_num_rows($sql)){
    $data[]=array();
    while($row=mysqli_fetch_assoc($sql)){
        $data[]=array(
            'id'=> $row['id'],
            'cityname'=>$row['cityname'],
            'statename'=>$row['statename']
        );
    }
    header('Content-type:application/json');
    echo json_encode($data);
}
?>