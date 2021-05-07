<?php 
    require('connection.inc.php');
    require('functions.inc.php');
    extract($_POST);
    
        if(isset($_POST['deleteteam']))
        {
            $team_id=get_safe_value($con,$_POST['team_id']);
            $sqldelete="delete from project_team where team_id='$team_id'";
            if(mysqli_query($con,$sqldelete))
            {
                $sqldelete="delete from team_members where team_id='$team_id'";
                if(mysqli_query($con,$sqldelete))
                {
                    echo "Success";
                }
                else
                {
                    echo "Fail";
                }

            }
            else
            {
                echo "Fail";
            }
        }
        if(isset($_POST['experts']))
        {
            $team_id=get_safe_value($con,$_POST['team_id']);
            $fail='false';
            $sqlupdate="UPDATE project_team set status='1' where team_id='$team_id'";
            if(!mysqli_query($con,$sqlupdate))
            {
              $fail='true';
              echo "Project update failed";
            }
            else         
            {
            foreach($_POST['experts'] as $row)
            {
                $name=explode(':',$row);
                $expert=$name[1];
                $expert=substr($expert,1,(strlen($expert)-2));
                $date=date('Y-m-d h:i:s');
                $insert="INSERT into `team_members`(`team_id`,`client_id`,`added_on`,`role`) VALUES('$team_id','$expert','$date','member')";
                if(!mysqli_query($con,$insert))
                {
                  //echo "Failed";
                  $fail='true';
                }

            }
            if($fail==='false')
            {
             echo "Success";
            }
            else
            {
                echo "Team member update failed";
            }
        
        }
       
        }
    
    
  