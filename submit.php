<?php
require ('connection.inc.php');
require ('functions.inc.php');


if(isset($_POST['getposts']))
{
  $industry=get_safe_value($con,$_POST['industry']);
  if($industry=='all')
  {
    $sqlget="SELECT * from article_blog";
  }
    
  else
  {
    $sqlget="SELECT * from article_blog where industry='$industry'";
  }
  
  $res=mysqli_query($con,$sqlget);
   $output='';
   if(mysqli_num_rows($res)>0)
   {
     while($row=mysqli_fetch_assoc($res))
     {
     $output.='<div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
     <div class="card">
       <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
         <img src="'.$row['post_display'].'" class="img-fluid" />
         <a href="#!">
           <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
         </a>
       </div>
       <div class="card-body">
                <h5 class="card-title"><a style="text-decoration:underline" href="post.php?id='.$row['post_id'].'">'.$row['post_title'].'</a></h5>
                <h6 class="text-muted"><i class="fas fa-tag"></i>'.' '.$row['industry'].'</h6>
                <p class="card-text">'.
                  $row['post_desc'].
               '</p>
              </div>
     </div>
   </div>
   </div>';
   }
  }
   else{
        
    $output="<p>No results found</p>";

}

echo $output;
}
if(isset($_POST['updatepost']))
{
  $destinationfile='';
  $post_id=get_safe_value($con,$_POST['post_id']);
  $post_title=get_safe_value($con,$_POST['post_title']);
  $post_desc=get_safe_value($con,$_POST['post_desc']);
  $post_date=date('Y-m-d H:i:s');
  $author=get_safe_value($con,$_POST['author']);
  $author_email=get_safe_value($con,$_POST['author_email']);
  $industry=get_safe_value($con,$_POST['industry']);
  $content=filter_var(htmlentities($_POST["content"]),FILTER_SANITIZE_STRING);
  if($_FILES["post_display"]["name"]!='') { 
    $fileName = basename($_FILES["post_display"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileTmp=$_FILES["post_display"]["tmp_name"]; 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
      $destinationfile='post_display/'.$fileName;
      move_uploaded_file($fileTmp,$destinationfile);
    }
    $sqlupdate="UPDATE article_blog set post_title='$post_title',post_desc='$post_desc',author='$author',author_email='$author_email',industry='$industry',content='$content',post_date='$post_date',post_display='$destinationfile' where post_id='$post_id'";
  }
  else
  {
   $sqlupdate="UPDATE article_blog set post_title='$post_title',post_desc='$post_desc',author='$author',author_email='$author_email',industry='$industry',content='$content',post_date='$post_date' where post_id='$post_id'";
  }
 
  if(mysqli_query($con,$sqlupdate))
  {
    echo "Success";
  }
  else
  {
    echo "Failed";
  }

}
if(isset($_POST['createpost']))
{
  $destinationfile='';
  $post_title=get_safe_value($con,$_POST['post_title']);
  $post_desc=get_safe_value($con,$_POST['post_desc']);
  $post_date=date('Y-m-d H:i:s');
  $author=get_safe_value($con,$_POST['author']);
  $author_email=get_safe_value($con,$_POST['author_email']);
  $industry=get_safe_value($con,$_POST['industry']);
  $content=filter_var(htmlentities($_POST["content"]),FILTER_SANITIZE_STRING);
  if(!empty($_FILES["post_display"]["name"])) { 
    $fileName = basename($_FILES["post_display"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileTmp=$_FILES["post_display"]["tmp_name"]; 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
      $destinationfile='post_display/'.$fileName;
      move_uploaded_file($fileTmp,$destinationfile);
    }
  }
   $sql="INSERT into article_blog(post_title,post_desc,author,author_email,industry,content,post_date,post_display) VALUES('$post_title','$post_desc','$author','$author_email','$industry','$content','$post_date','$destinationfile')";
  if(mysqli_query($con,$sql))
  {
    echo "Success";
  }
  else
  {
    echo "Failed";
  }
}
if(isset($_POST['setviews']))
{
  $post_id=get_safe_value($con,$_POST['post_id']);
  $sqlget="SELECT * from article_blog where post_id='$post_id'";
  $article=get_data($con,$sqlget);
  $count=$article[0]['views']+1;
  $sqlupdate="UPDATE article_blog set views='$count' where post_id='$post_id'";
  if(modify($con,$sqlupdate)=='1')
  echo "Success";
  else 
  echo "Failed";
}
if(isset($_POST['getadminposts']))
{
  $industry=get_safe_value($con,$_POST['industry']);
  if($industry=='all')
  {
    $sqlget="SELECT * from article_blog";
  }
    
  else
  {
    $sqlget="SELECT * from article_blog where industry='$industry'";
  }
  
  $res=mysqli_query($con,$sqlget);
   $output='';
   if(mysqli_num_rows($res)>0)
   {
     while($row=mysqli_fetch_assoc($res))
     {
     $output.='<div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
     <div class="card">
       <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
         <img src="'.$row['post_display'].'" class="img-fluid" />
         <a href="#!">
           <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
         </a>
       </div>
       <div class="card-body">
                <h5 class="card-title"><a style="text-decoration:underline" href="post_admin.php?id='.$row['post_id'].'">'.$row['post_title'].'</a></h5>
                <h6 class="text-center text-muted"><i class="fas fa-eye"></i>'.' '.$row['views'].'</h6><br>
                <h6 class="text-muted"><i class="fas fa-tag"></i>'.' '.$row['industry'].'</h6>
                <p class="card-text">'.
                  $row['post_desc'].
               '</p>
              </div>
     </div>
   </div>
   </div>';
   }
  }
   else{
        
    $output="<p>No results found</p>";

}

echo $output;
}
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
   if(mysqli_num_rows($res)>0)
   {
   // $sqlget="SELECT * from sme_apply where status='1'";
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
        
         $output="<p>No results found</p>";

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
if(isset($_POST['action']) && $_POST['action']=='deactivate')
{
  $client_id=get_safe_value($con,$_POST['id']);
  $sql="select * from client_users where client_id='$client_id'";
  $row=get_data($con,$sql);
  $password=get_safe_value($con,$_POST['password']);
  $password=md5($password);
  $cpassword=$row[0]['password'];
  $msg='';
  $email_id=get_safe_value($con,$_POST['email']);
  if($password==='')
   {
       $msg='Please enter your password';
       
   }
   else if($password!=$cpassword)
   {
    $msg='Incorrect password.Please try again';
    
   }
   else if($password==$cpassword)
   {
       $sql="UPDATE client_users set account_status='0' where email_id='$email_id'";
       if(modify($con,$sql)=='1')
       {
         echo "Success";
       }
       else
       {
         echo "Fail";
       }
   }
   if($msg!='')
   {
     echo $msg;
   }
   
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