<?php
require "connection.inc.php";
require "functions.inc.php";

if(isset($_POST['action']) && $_POST['action']=="add")
{
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['team_id']) && isset($_POST['description']))
 {	
	$title = get_safe_value($con,$_POST['title']);
	$start = get_safe_value($con,$_POST['start']);
	$end = get_safe_value($con,$_POST['end']);
    $team_id = get_safe_value($con,$_POST['team_id']);
    $description=get_safe_value($con,$_POST['description']);

	$sql = "INSERT INTO events(title, start, end,team_id,description) VALUES ('$title', '$start', '$end','$team_id','$description')";
    $res=modify($con,$sql);
    if($res=='0')
    {
        die("Error adding event");
    }
    else
    {
        echo "DONE";
    }
 }
}
if(isset($_POST['action']) && $_POST['action']=="update")
{
if (isset($_POST['title']))
 {	
    $id=get_safe_value($con,$_POST['id']);
	$title = get_safe_value($con,$_POST['title']);
    $sql = "UPDATE events SET  title = '$title' WHERE id = $id ";
    $res=modify($con,$sql);
    if($res=='0')
    {
        die ('Error Editing'); 
    }
    else
    {
        echo "DONE";
    }
   
 }
}

if(isset($_POST['action']) && $_POST['action']=="delete")
{
if (isset($_POST['id']))
 {
	$eventID= get_safe_value($con,$_POST['id']);
    $sql = "DELETE from events where id='$eventID'";
    $query=modify($con,$sql);
    if($query=='0')
    {
        die("Error deleting event");
    }
    else
    {
        echo "1";
    }
 }
}

if(isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	$id = get_safe_value($con,$_POST['Event'][0]);
	$start = get_safe_value($con,$_POST['Event'][1]);
	$end = get_safe_value($con,$_POST['Event'][2]);
	$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";
    $res=modify($con,$sql);
    if($res=='0')
    {
        die("OK");
    }
    else
    {
        die("Error updating date"); 
    }
}


header('Location: '.$_SERVER['HTTP_REFERER']);

?>
