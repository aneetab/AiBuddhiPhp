<?php 
    require('connection.inc.php');
    require('functions.inc.php');
    extract($_POST);
    if(isset($_POST['team_name']))
    {
        
            $team_name=get_safe_value($con,$_POST['team_name']);
            $team_desc=get_safe_value($con,$_POST['team_desc']);
            $display_title=get_safe_value($con,$_POST['display_title']);
            $id='13';
            $date=get_safe_value($con,$_POST['date']);
            $sql="insert into project_team(team_name,display_title,team_desc,created_by,created_on) VALUES('$team_name','$display_title','$team_desc','$id','$date')";
            mysqli_query($con,$sql);
            
    }

    if(isset($_POST['getteam']))
    {
        $displayquery="SELECT * from project_team where created_by='13'";
        $res=mysqli_query($con,$displayquery);
        if(mysqli_num_rows($res)>0){
       $output='';
        while($row = mysqli_fetch_assoc($res)){
                
                $output .= '<div class="col-lg-4 col-md-6 col-12 d-flex">
                <div class="card py-3 py-sm-0" id="test" onclick="open_team()">
                  <div class="card-body flex-fill">
                      <p class="card-text"><div class="team-title">'.$row['display_title'].'</div>'.$row['team_name'].'</p>
                  </div>
                </div>
                </div>';
             
}
echo $output;
        }
    }
         
             
    ?>
