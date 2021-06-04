<?php
require "connection.inc.php";
require "functions.inc.php";
if(isset($_GET['team_id']) && $_GET['team_id']!='')
{
$team_id=get_safe_value($con,$_GET['team_id']);
$data = array();
$query = "SELECT * FROM events where team_id='$team_id' ORDER BY id";
$res = mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($res))
{
 $data[] = array(
  'id' =>$row["id"],
  'title'=> $row["title"],
  'start'=> $row["start"],
  'end'=> $row["end"],
  'color'=>'#83c0de',
  'editable'=>true,
  'description'=>$row["description"]
  
 );
}

echo json_encode($data);
}
if(isset($_GET['client_id']) && $_GET['client_id']!='')
{
$client_id=get_safe_value($con,$_GET['client_id']); 
$data = array();
$query = "SELECT * FROM events,team_members where events.team_id=team_members.team_id and team_members.client_id='$client_id'";
$res = mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($res))
{
 $data[] = array(
  'id' =>$row["id"],
  'title'=> $row["title"],
  'start'=> $row["start"],
  'end'=> $row["end"],
  'color'=>'#83c0de',
  'editable'=>true,
  'description'=>$row["description"]
  
 );
}

echo json_encode($data);
}

?>
