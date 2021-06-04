<?php
include "connection.inc.php";
include "functions.inc.php";
$template_file="./mail_template_register.php";
$to_name='';
$email_to='';

if(isset($_POST['email_to']) && isset($_POST['to_name']) && $_POST['email_to']!='' && $_POST['to_name']!='' && isset($_POST['id']) && $_POST['id']!='')
{
 $email_to=get_safe_value($con,$_POST['email_to']);
 $to_name=get_safe_value($con,$_POST['to_name']);
 $id=get_safe_value($con,$_POST['id']);
 $swap_var=array(
    "{TO_NAME}"=>$to_name,
    "{TO_EMAIL}"=>$email_to,
 );
   
    $msg='';
     $industry='';
     $date_val=date("Y-m-d H:i:s");
     $firstname=get_safe_value($con,$_POST['firstname']);
     $lastname=get_safe_value($con,$_POST['lastname']);
     $gender=get_safe_value($con,$_POST['gender']);
     $language=get_safe_value($con,$_POST['language']);
     $enterprise=get_safe_value($con,$_POST['enterprise']);
     $about_me=get_safe_value($con,$_POST['about_me']);
     $specialities=get_safe_value($con,$_POST['specialities']);
     $interests=get_safe_value($con,$_POST['interests']);
     if(isset($_POST['industry_select']) && $_POST['industry_select']!='other' && $_POST['industry_select']!='')
     {
       $industry=$_POST['industry_select'];

     }
     else if(isset($_POST['industry1']))
     {
       $industry=$_POST['industry1'];
     }
     else
     {
       $msg='Select an Industry';
     }

     /*PROFILE PIC STARTS*/
     
     if(!empty($_FILES["profile-pic"]["name"])) { 
       $fileName1 = basename($_FILES["profile-pic"]["name"]);
       $fileTemp1=$_FILES["profile-pic"]["tmp_name"]; 
       $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION); 
       $allowTypes = array('jpg','png','jpeg'); 
       if(in_array($fileType1, $allowTypes)){ 
         $destinationfile1='uploaded_docs/'.$fileName1;
         move_uploaded_file($fileTemp1,$destinationfile1);
       }
     }
            


     /*PROFILE PIC ENDS*/
     /*VIDEO STARTS*/
     $video=$_FILES['video'];
     $filename2=$video['name'];
     $fileerror2=$video['error'];
     $filetmp2=$video['tmp_name'];
     $destinationfile2='uploaded_docs/'.$filename2;
     move_uploaded_file($filetmp2,$destinationfile2);
     

     /*VIDEO ENDS*/
     
     /*PHOTO ID STARTS*/
     if(!empty($_FILES["photo-id"]["name"])) { 
       $fileName3 = basename($_FILES["photo-id"]["name"]); 
       $fileType2 = pathinfo($fileName3, PATHINFO_EXTENSION);
       $fileTmp3=$_FILES["photo-id"]["tmp_name"]; 
       $allowTypes = array('jpg','png','jpeg'); 
       if(in_array($fileType2, $allowTypes)){ 
         $destinationfile3='uploaded_docs/'.$fileName3;
         move_uploaded_file($fileTmp3,$destinationfile3);
       }
     }
           
           
     /*PHOT0 ID ENDS*/  
     $sqlget="select * from resume where client_id='$id'";
     
     if(check_num_rows($con,$sqlget)=='1')
     {
      if($msg=='')
      {
     
     $q="INSERT INTO `sme_apply`(`email`,`firstname`,`lastname`,`gender`,`language`,`industry`,`profile-pic`,`enterprise`,`about_me`,`interests`,`specialities`,`photo-id`,`video`,`status`,`date_time`) VALUES ('$email_to','$firstname','$lastname','$gender','$language','$industry','$destinationfile1','$enterprise','$about_me','$interests','$specialities','$destinationfile3','$destinationfile2','0','$date_val')";
    
     $query=mysqli_query($con,$q);
     if($query)
     {
 
     $sqlupdate="UPDATE client_users set profile_photo='$destinationfile1' where email_id='$email_to'";
     
     if(mysqli_query($con,$sqlupdate))
     {
        $subject="Welcome to AiBuddhi!";
        $headers="From:	AiBuddhi Recruiting<recruiting.careers@aibuddhi.com>\r\n";
        $headers.="MIME-Version: 1.0\r\n";
        $headers.="Content-Type:text/html;charset=ISO-8859-1\r\n";
        if(file_exists($template_file))
        $message=file_get_contents($template_file);
        else
        die("unable to locate the template file");
        
        foreach(array_keys($swap_var) as $key){
            if(strlen($key)>2 && trim($key)!='')
            $message=str_replace($key,$swap_var[$key],$message);
        }
        //echo $message;
        if(mail($email_to,$subject,$message,$headers)){
            echo "Done";
           }
        else
        {
        echo "Failed to send mail";
         $sqldelete="delete from resume where client_id='$id'";
         mysqli_query($con,$sqldelete);
        }
        
     
     }
     else
     {
         echo "Failed to update client";
         $sqldelete="delete from resume where client_id='$id'";
         mysqli_query($con,$sqldelete);
     }
     }
     else
     {
       echo "No";
       $sqldelete="delete from resume where client_id='$id'";
       mysqli_query($con,$sqldelete);
   }
     
   }
   else
   {
     echo $msg;
    
   }
 }
   else
   {
     $msg="Resume";
     $css_class='alert-danger';
     $sqldelete="delete from resume where client_id='$id'";
     mysqli_query($con,$sqldelete);
   }     
}

?>
