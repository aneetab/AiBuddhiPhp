<?php 
    require('connection.inc.php');
    require('functions.inc.php');
    $id=$_SESSION['USER_ID'];
    $output="";
    if(isset($_POST['hidden_user_id']))
    {
        
            $hidden_user_id=get_safe_value($con,$_POST['hidden_user_id']);
            $exp_type=get_safe_value($con,$_POST['exp_type']);
            $title=get_safe_value($con,$_POST['title']);
            $org=get_safe_value($con,$_POST['org']);
            $location=get_safe_value($con,$_POST['location']);
            $desc=get_safe_value($con,$_POST['desc']);
            $start=get_safe_value($con,$_POST['start']);
            $end=get_safe_value($con,$_POST['end']);
            if($end=='')
            $end="Present";
            if($exp_type=='1')
            $exp_type="Education";
            if($exp_type=='2')
            $exp_type="Experience";
            if($exp_type=='3')
            $exp_type="Certification";
            $updatequery="UPDATE `resume` SET `exp_type`='$exp_type',`title`='$title',`org`='$org',`location`='$location',`description`='$desc',`start`='$start',`end`='$end' WHERE id='$hidden_user_id'";
            mysqli_query($con,$updatequery);
        
    }
    if(isset($_POST['readrecord']))
    {
        $displayquery="SELECT * from resume where client_id='$id'";
        $res=mysqli_query($con,$displayquery);
        $i=1;
        if(mysqli_num_rows($res)>0){

        while($row = mysqli_fetch_assoc($res)){
                if($row['exp_type']=="Education")
                {
                $output .= '<div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <p>'."<i class='resume-icons fas fa-university'></i>".$row['title'] .'<br>'.$row['org'].'-'.$row['location'].'<br>'.$row['description'].'</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">'."<i class='resume-icons fas fa-calendar-alt'></i>".
                            $row['start'].'-'.$row['end'].'</div><div class="col-lg-4 col-md-4 col-12">'. "<button onclick='GetUserDetails(".$row['id'].")' class='btn btn-primary'><i class='fas fa-edit'></i></button>".
                            "&nbsp;<button onclick='DeleteUser(".$row['id'].")' class='btn btn-danger'><i class='fas fa-trash'></i></button>".
                            "
                            </div>

                            </div><hr>";
                }
                if($row['exp_type']=="Experience")
                {
                $output .= '<div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <p>'."<i class='resume-icons fas fa-briefcase'></i>".$row['title'] .'<br>'.$row['org'].'-'.$row['location'].'<br>'.$row['description'].'</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">'."<i class='resume-icons fas fa-calendar-alt'></i>".
                            $row['start'].'-'.$row['end'].'</div><div class="col-lg-4 col-md-4 col-12">'."<button onclick='GetUserDetails(".$row['id'].")' class='btn btn-primary'><i class='fas fa-edit'></i></button>".
                            "&nbsp;<button onclick='DeleteUser(".$row['id'].")' class='btn btn-danger'><i class='fas fa-trash'></i></button>".
                            "
                            </div>

                            </div><hr>";
                }
                if($row['exp_type']=="Certification")
                {
                $output .= '<div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <p>'."<i class='resume-icons fas fa-file-alt'></i>".$row['title'] .'<br>'.$row['org'].'-'.$row['location'].'<br>'.$row['description'].'</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">'."<i class='resume-icons fas fa-calendar-alt'></i>".
                            $row['start'].'-'.$row['end'].'</div><div class="col-lg-4 col-md-4 col-12">'."<button onclick='GetUserDetails(".$row['id'].")' class='btn btn-primary'><i class='fas fa-edit'></i></button>".
                            "&nbsp;<button onclick='DeleteUser(".$row['id'].")' class='btn btn-danger'><i class='fas fa-trash'></i></button>".'
                            </div>

                            </div><hr>';
                }
                
                $i++; 
        }
        
    }

echo $output;
}
           if(isset($_POST['client_id']) && isset($_POST['exp_type']) && isset($_POST['title']) && isset($_POST['org']) && isset($_POST['location']) && isset($_POST['desc']) && isset($_POST['start']) && isset($_POST['end']) )
           {
            $id=get_safe_value($con,$_POST['client_id']);
            $exp_type=get_safe_value($con,$_POST['exp_type']);
            $title=get_safe_value($con,$_POST['title']);
            $org=get_safe_value($con,$_POST['org']);
            $location=get_safe_value($con,$_POST['location']);
            $desc=get_safe_value($con,$_POST['desc']);
            $start=get_safe_value($con,$_POST['start']);
            $end=get_safe_value($con,$_POST['end']);
            if($end=='')
            $end="Present";
            if($exp_type=='1')
            $exp_type="Education";
            if($exp_type=='2')
            $exp_type="Experience";
            if($exp_type=='3')
            $exp_type="Certification";
            $sql="INSERT into resume(client_id, exp_type,title,org,location,description,start,end) VALUES('$id','$exp_type','$title','$org','$location','$desc','$start','$end')";
            $query = mysqli_query($con, $sql);
            
           }
           if(isset($_POST['deleteid'])){
               $userid=$_POST['deleteid'];
               $deletequery="delete from resume where id='$userid'";
               mysqli_query($con,$deletequery);
           }
           if(isset($_POST['id']) && isset($_POST['id'])!="")
           {
               $user_id=$_POST['id'];
               $query="SELECT * from resume where id='$user_id'";
               if(!$result=mysqli_query($con,$query)){
                   exit(mysqli_error());
               }
               $response=array();
               if(mysqli_num_rows($result)>0){
                   while($row=mysqli_fetch_assoc($result)){
                       $response=$row;
                   }
               }
               else
               {
                   $response['status']=200;
                   $response['message']="Data not found";
               }
               echo json_encode($response);
           }
           else
           {
               $response['status']=200;
               $response['message']="Invalid Request";
           }
        
    
    ?>
