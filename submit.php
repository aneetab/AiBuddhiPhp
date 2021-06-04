<?php
require ('connection.inc.php');
require ('functions.inc.php');

if(isset($_POST['industry']) && isset($_POST['enterprise']))
{
  $industry=get_safe_value($con,$_POST['industry']);
  $enterprise=get_safe_value($con,$_POST['enterprise']);
  if($industry!='' && $enterprise=='')
  {
      
    $sqlget="SELECT * from sme_apply where industry='$industry' and status='1'";
  }
  else if($enterprise!='' && $industry=='')
  {
   
    $sqlget="SELECT * from sme_apply where enterprise='$enterprise' and status='1'";
  }
  else if($industry!='' && $enterprise!='')
  {
   
    $sqlget="SELECT * from sme_apply where industry='$industry' and enterprise='$enterprise' and status='1'";

  }
  else
  {
    $sqlget="SELECT * from sme_apply where status='1'";
  }
   $res=mysqli_query($con,$sqlget);
   $output='';
   if(mysqli_num_rows($res)<1)
   {
    $sqlget="SELECT * from sme_apply where status='1'";
    $res=mysqli_query($con,$sqlget);
    while($row=mysqli_fetch_assoc($res))
    {
     $output.='<div class="col-lg-4 col-md-6 col-12 d-flex">
      <div class="sme-card py-3 py-sm-0">
        <img src="'.$row['profile-pic'].'" class="card-img-top" alt="...">
        <div class="card-body flex-fill">
          <h5 class="card-title">'.$row['firstname'].' '.$row['lastname'].'</h5>
          <h6 class="card-title">Industry:'. $row['industry'].'</h6>
          <h6 class="card-title">Enterprise:'.$row['enterprise'].'</h6>
          <p class="card-text">'. $row['about_me'].'</p>
          <a href="sme_profile.php?id='.$row['id'].'"class="btn btn-red btn-primary mb-2">View Profile</a>
        </div>
      </div>
      </div>';
    }
    }
    else{
        $res=mysqli_query($con,$sqlget);
        while($row=mysqli_fetch_assoc($res))
        {
         $output.=' <div class="col-lg-4 col-md-6 col-12 d-flex">
          <div class="sme-card py-3 py-sm-0">
            <img src="'.$row['profile-pic'].'" class="card-img-top" alt="...">
            <div class="card-body flex-fill">
              <h5 class="card-title">'.$row['firstname'].' '.$row['lastname'].'</h5>
              <h6 class="card-title">Industry:'.$row['industry'].'</h6>
              <h6 class="card-title">Enterprise:'.$row['enterprise'].'</h6>
              <p class="card-text">'.$row['about_me'].'</p>
              <a href="sme_profile.php?id='. $row['id'].'"class="btn btn-red btn-primary mb-2">View Profile</a>
            </div>
          </div>
          </div>';
        }

    }
    
    echo $output;
   }


if(isset($_POST["insert_file"]))
{
    if(!empty($_FILES["file"]["name"])) { 
        $fileName = basename($_FILES["file"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        $fileTmp= $_FILES["file"]["tmp_name"];
        $allowTypes = array('jpg','png','jpeg','doc','docx','pdf','txt','ppt','pptx'); 
        $team_id=get_safe_value($con,$_POST['team_id']);
        $channel=get_safe_value($con,$_POST['channel']);
        $folder_name=get_safe_value($con,$_POST['folder_name']);
            if(in_array($fileType, $allowTypes)){ 
                $destinationfile='uploaded_docs/'.time().'_'.$fileName;
                move_uploaded_file($fileTmp,$destinationfile);
                $modified_by=$_SESSION['USER_ID'];
                $date=date('Y-m-d h:i:s');
                $insert = "INSERT into files(`team_id`,`file_name`,`file_type`,`extension`,`file`,`added_on`,`modified_by`,`channel`,`parent_folder`) VALUES('$team_id','$fileName','file','$fileType','$destinationfile','$date','$modified_by','$channel','$folder_name')"; 
                  if(!mysqli_query($con,$insert)){ 
                  $msg = "File upload failed, please try again."; 
                  $css_class='alert-danger'; 
                  echo $msg;
                }
            }
        }
    }
    if(isset($_POST["createfolder"]))
    {
        $folder_name=get_safe_value($con,$_POST['folder_name']);
        $created_by=$_SESSION['USER_ID'];
        $date=date('Y-m-d h:i:s');
        $team_id=get_safe_value($con,$_POST['team_id']);
        $channel=get_safe_value($con,$_POST['channel']);
        $parent_folder=get_safe_value($con,$_POST['parent_folder']);
        $sql="INSERT into files(folder_name,team_id,added_on,modified_by,channel,parent_folder,file_type) VALUES('$folder_name','$team_id','$date','$created_by','$channel','$parent_folder','folder')";
        if(mysqli_query($con, $sql))
        {
            echo "YES";
        }
        else
        {
            echo "NO";
        }
    }
    
    if(isset($_POST['readfile']))
    {
        $team_id=get_safe_value($con,$_POST['team_id']);
        $channel=get_safe_value($con,$_POST['channel']);
        $parent_folder='';
        if(isset($_POST['parent_folder']))
        {
            $parent_folder=get_safe_value($con,$_POST['parent_folder']);
        }
               
        $displayquery="SELECT * from files,client_users where team_id='$team_id' and channel='$channel' and parent_folder='$parent_folder' and client_users.client_id=files.modified_by";
        $res=mysqli_query($con,$displayquery);
        $output='<table class="table table-hover">
                 <thead>
                 <tr>
                 <th scope="col">Name</th>
                 <th scope="col">Created</th>
                 <th scope="col">Created By</th>
                 </tr>
                 </thead><tbody>';
        if(mysqli_num_rows($res)>0){
            
        while($row = mysqli_fetch_assoc($res)){
            if($row['file_type']=='folder')
            {
                
                $output .= '<tr>
                  <td><a href="view_folder.php?fid='.$row['file_id'].'&channel='.$channel.'"><i class="fas fa-folder" style="color:#dbbd7d;"></i>  '.$row['folder_name'].'</a></td>
                  <td>'.$row['added_on'].'</td>
                  <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                </tr>';
                
             }
             
           
             if($row['file_type']=='file')
             {
                        $output .= '<tr>
                          <td><a target="_blank" href="'.$row['file'].'"><i class="fas fa-file-alt" style="color:#dbbd7d;"></i>  '.$row['file_name'].'</a></td>
                          <td>'.$row['added_on'].'</td>
                          <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                        </tr>';
                        
             }

         }
        }
           $output.='</tbody></table>';
           echo $output;
}

if(isset($_POST['dragdrop']))
{

    if(isset($_FILES['file']['name'][0]))
    { 
           
            foreach($_FILES['file']['name'] as $keys=>$values){
            $fileName = basename($values); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $fileTmp= $_FILES['file']['tmp_name'];
            $destinationfile='uploaded_docs/'.$fileName;  
            $allowTypes = array('jpg','png','jpeg','doc','docx','pdf'); 
            $channel=get_safe_value($con,$_POST['channel']);
            $team_id=get_safe_value($con,$_POST['team_id']);
            $folder_name=get_safe_value($con,$_POST['folder_name']);
                if(in_array($fileType, $allowTypes)){ 
                    $date=date('Y-m-d h:i:s');
                    $modified_by=$_SESSION['USER_ID'];
                    $insert = "INSERT into `files` (`team_id`,`parent_folder`,`file_name`,`file`,`channel`,`added_on`,`modified_by`,`file_type`,`extension`) VALUES('$team_id','$folder_name','$fileName','$destionationfile','$channel','$date','$modified_by','file','$fileType')"; 
                     
                    if(!mysqli_query($con,$insert)){ 
                      $msg = "File upload failed, please try again."; 
                      $css_class='alert-danger'; 
                      echo $msg;
                    }
                    else
                    {
                        echo "Done";
                    }
                }
     }
    }
          
}

?>