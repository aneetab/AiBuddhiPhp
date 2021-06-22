<?php 
    require('connection.inc.php');
    require('functions.inc.php');
    extract($_POST);
    

       if(isset($_POST['deletemember']))
       {
           $id=get_safe_value($con,$_POST['id']);
           $team_id=get_safe_value($con,$_POST['team_id']);
           $sqldelete="delete from team_members where id='$id' and team_id='$team_id'";
           $res=modify($con,$sqldelete);
           if($res=='1')
           {
               echo "Success";
           }
           else
           {
               echo "Fail";
           }
       }
        if(isset($_POST['deletefile']))
        {
            $file_id=get_safe_value($con,$_POST['file_id']);
            $filetype=get_safe_value($con,$_POST['filetype']);
            $channel=get_safe_value($con,$_POST['channel']);
            if($filetype=='file')
            {
            $sqldelete="delete from files where file_id='$file_id'";
            $res=modify($con,$sqldelete);
            if($res=='1')
            {
               echo "Success";
            }
            else
            {
                echo "Fail";
            }
        }
       
        else if ($filetype=='folder')
        { 
            $sqlget="select * from files where file_id='$file_id'";
            //$res=mysqli_query($con,$sqlget);
            $rows=get_data($con,$sqlget);
            $folder_name=$row['folder_name'];
            $sqldelete="delete from files where parent_folder='$folder_name' and channel='$channel'";
            if(modify($con,$sqldelete)=='1')
            {
                $sqldelete="delete from files where file_id='$file_id' and channel='$channel'";
                if(modify($con,$sqldelete)=='1')
                {
                    echo "Success";
                }
                else
                echo "Failed";
            }
            else
            echo "Failed";

        }


        }
        if(isset($_POST['deleteclient']))
        {
            $id=get_safe_value($con,$_POST['id']);
            $email=get_safe_value($con,$_POST['email']);
            $sqldelete="delete from client_users where client_id='$id'";
            $res=modify($con,$sqldelete);
            $sqlcheck="select * from sme_apply where email='$email'";
            if(check_num_rows($con,$sqlcheck)=='1')
            {
                $sqldelete="delete from sme_apply where email='$email'";
                $res=modify($con,$sqldelete);
                $sqldelete="delete from resume where client_id='$id'";
                $res=modify($con,$sqldelete);
            }
            if($res=='1')
            {
               echo "Success";
            }
            else
            {
                echo "Fail";
            }
        }
        if(isset($_POST['deletepost']))
        {
            
            $post_id=get_safe_value($con,$_POST['post_id']);
            $sqldelete="delete from article_blog where post_id='$post_id'";
            $res=modify($con,$sqldelete);
            if($res=='1')
            {
               echo "Success";
            }
            else
            {
                echo "Fail";
            }
        }
        if(isset($_POST['deleteteam']))
        {
            $team_id=get_safe_value($con,$_POST['team_id']);
            $sqldelete="delete from project_team where team_id='$team_id'";
            if(modify($con,$sqldelete)=='1')
            {
                $sqldelete="delete from team_members where team_id='$team_id'";
                if(modify($con,$sqldelete)=='1')
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
            $requested_by=get_safe_value($con,$_POST['requested_by']);
            $fail='false';
            $sqlupdate="UPDATE project_team set status='1' where team_id='$team_id'";
            if(modify($con,$sqlupdate)=='0')
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
                if(modify($con,$insert)=='0')
                {
                  //echo "Failed";
                  $fail='true';
                }

            }
            $insert="INSERT into `team_members`(`team_id`,`client_id`,`added_on`,`role`) VALUES('$team_id','$requested_by','$date','member')";
            if(modify($con,$insert)=='0')
                {
                  //echo "Failed";
                  $fail='true';
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
                  if(modify($con,$insert)=='0'){ 
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
        if(modify($con, $sql)=='1')
        {
            echo "YES";
        }
        else
        {
            echo "NO";
        }
    }
    
   /* if(isset($_POST['readfile']))
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
                 <th scope="col">
                 </tr>
                 </thead><tbody>';
        if(check_num_rows($con,$displayquery)=='1'){
            $rows=get_data($con,$displayquery);
        foreach($rows as $row){
            if($row['file_type']=='folder')
            {
                
                $output .= '<tr>
                  <td><a href="viewfolder_admin.php?fid='.$row['file_id'].'&channel='.$channel.'"><i class="fas fa-folder" style="color:#dbbd7d;"></i>  '.$row['folder_name'].'</a></td>
                  <td>'.$row['added_on'].'</td>
                  <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                  <td><a onclick="delete_file('.$row['file_id'].','.'"folder"'.')" class="fas fa-trash text-primary fa-fw mr-3"></i></a>&nbsp;
                </tr>';
                
             }
             
           
             if($row['file_type']=='file')
             {
                        $output .= '<tr>
                          <td><a target="_blank" href="'.$row['file'].'"><i class="fas fa-file-alt" style="color:#dbbd7d;"></i>  '.$row['file_name'].'</a></td>
                          <td>'.$row['added_on'].'</td>
                          <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                          <td><a onclick="delete_file('.$row['file_id'].','.'"file"'.')" class="fas fa-trash text-primary fa-fw mr-3"></i></a>&nbsp;
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
                    $modified_by=$_SESSION['ADMIN_ID'];
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
          
}*/
        ?>
    
    
  