<?php 
    require('connection.inc.php');
    require('functions.inc.php');
    extract($_POST);
    
    if(isset($_POST['team_name']))
    {
        $team_name=get_safe_value($con,$_POST['team_name']);
        $team_desc=get_safe_value($con,$_POST['team_desc']);
        $industry='';
        $enterprise='';
        $experts='';
        if(isset($_POST['industries']))
        {
            $industry='';
            foreach($_POST['industries'] as $row)
            {
                $industry.=$row.', ';
            }
            $industry=substr($industry,0,strlen($industry)-2);
            
        }
        if(isset($_POST['enterprises']))
        {
            $enterprise='';
            foreach($_POST['enterprises'] as $row)
            {
                $enterprise.=$row.', ';
            }
            $enterprise=substr($enterprise,0,strlen($enterprise)-2);
            
        }
        if(isset($_POST['experts']))
        {
            $expert='';
            foreach($_POST['experts'] as $row)
            {
                $expert=$row.', ';

            }
            $expert=substr($expert,0,strlen($expert)-2);
        }
        $date=date('Y-m-d h:i:s');
        $insert="INSERT into project_team(team_name,team_desc,industry,experts,enterprise,requested_on,requested_by) VALUES('$team_name','$team_desc','$industry','$expert','$enterprise','$date','13')";
        if(mysqli_query($con,$insert))
        {
            echo "Success";
        }
        else
        {
            echo "No";
        }

    }
    if(isset($_POST['searchID']))
    {
        $searchID=$_POST['searchID'];
        $team_id=$_POST['team_id'];
        $date=date("Y-m-d h:i:s");
        $sql="INSERT into team_members(team_id,client_id,added_on) VALUES('$searchID','$team_id','$date')";
        mysqli_query($con,$sql);
    }
    if(isset($_POST['query'])){
        $inpText=$_POST['query'];
        $query="select * from sme_apply,client_users where (client_users.firstname LIKE '%Bin%' OR client_users.lastname LIKE '%Bin%') and sme_apply.email=client_users.email_id";
        $res=mysqli_query($con,$query);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['firstname'].' '.$row['lastname']."(Industry:".$row['industry']."Enterprise:".$row['enterprise'].")</a>";
            }
        }
        else
        {
            echo "<p class='list-group-item border-1'>No Record</p>";
        }
    }
    /*if(isset($_POST['team_name']))
    {
        
            $team_name=get_safe_value($con,$_POST['team_name']);
            $team_desc=get_safe_value($con,$_POST['team_desc']);
            $display_title=get_safe_value($con,$_POST['display_title']);
            $id=get_safe_value($con,$_POST['client_id']);
            $date=get_safe_value($con,$_POST['date']);
            $sql="insert into project_team(team_name,display_title,team_desc,created_by,created_on) VALUES('$team_name','$display_title','$team_desc','$id','$date')";
            mysqli_query($con,$sql);
            
    }*/

    /*if(isset($_POST['getteam']))
    {
        $id=$_SESSION['USER_ID'];
        $displayquery="SELECT * from project_team where created_by='$id'";
        $res=mysqli_query($con,$displayquery);
        if(mysqli_num_rows($res)>0){
       $output='';
        while($row = mysqli_fetch_assoc($res)){
                
                $output .= '<div class="col-lg-4 col-md-6 col-12 d-flex">
                <div class="card py-3 py-sm-0" id="test" onclick="open_team('.$row['team_id'].')">
                  <div class="card-body flex-fill">
                      <p class="card-text"><div class="team-title">'.$row['display_title'].'</div>'.$row['team_name'].'</p>
                  </div>
                </div>
                </div>';
             
}
echo $output;
        }
    }*/
    if(isset($_POST['getteam']))
    {
        $id=$_SESSION['USER_ID'];
        $displayquery="SELECT * from project_team where status='1' and requested_by='13'";
        $res1=mysqli_query($con,$displayquery);
        $output='';
        if(mysqli_num_rows($res1)>0){
            $output.='<span class="float-left" style="font-weight:bold"> PROJECT TEAMS </span><table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created</th>
            </tr>
            </thead><tbody>';
            while($row1 = mysqli_fetch_assoc($res1)){
                $output.='<tr onclick="open_team('.$row1['team_id'].')">
                <td>'.$row1['team_name'].'</td>
                <td>'.$row1['team_desc'].'</td>
                <td>'.$row1['requested_on'].'</td>
              </tr>';
            }
            $output.='</tbody></table>';

        }
        $displayquery1="SELECT * from project_team where status='0' and requested_by='13'";
        $res2=mysqli_query($con,$displayquery1);
        if(mysqli_num_rows($res2)>0){
            
            $output.='<span class="float-left" style="font-weight:bold"> PROJECT REQUESTS </span><table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created</th>
            <th scope="col">Status</th>
            </tr>
            </thead><tbody>';
            while($row2 = mysqli_fetch_assoc($res2)){
                $output.='<tr>
                <td>'.$row2['team_name'].'</td>
                <td>'.$row2['team_desc'].'</td>
                <td>'.$row2['requested_on'].'</td>
                <td>Applied</td>
              </tr>';
            }
            $output.='</tbody></table>';
          

    }
    if($output==='')
    {
        echo "<p style='font-family':".'Poppins'."',sans-seriff;font-weight:bold> No projects created yet</p>";
    }
    echo $output;

    
}

         
             
    ?>
