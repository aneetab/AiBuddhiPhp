<?php
$event_sql="SELECT events.id as id,`title`,`start`,`end` from events,team_members where events.team_id=team_members.team_id and team_members.client_id='$client_id' and alerted='0'";
$event_results=array();
$event_rows=get_data($con,$event_sql);
if(check_num_rows($con,$event_sql)=='1'){  
$time=time();
$t=date("h:i:s",$time);
//echo $t;
foreach($event_rows as $event_row)
{
    $start=strtotime($event_row['start']);
    $diff=($start-$time)/60;
    $start_date=date("h:i a", strtotime($event_row['start']) );
    $end_date=date("h:i a", strtotime($event_row['end']) );
    
    if($diff<30 && $diff>0)
    {
        $res=array(
         'eventid'=>$event_row['id'],
         'name'=>$event_row['title'],
         'start'=>$start_date,
         'end'=>$end_date,
        );
        
        array_push($event_results,$res);
    }
   

}

}

if(isset($_POST['updateevent']))
{
$id=get_safe_value($con,$_POST['eventid']);
$update="UPDATE events set alerted='1' where id='$id'";
if(modify($con,$update)=='1')
echo "UPDATED";
else 
echo "NO";
}

?>
