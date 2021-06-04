<?php
include "connection.inc.php";
include "functions.inc.php";
$template_file="./mail_template_acceptance.php";
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
/*if(mail($email_to,$subject,$message,$headers)){
    if(mysqli_query($con,"update sme_apply set status='1' where id='$id'"))
    {
    echo "Success";
    }
    else
    {
        echo "Failed";
    }
}
else
echo "Failed to send mail";
}*/
else
echo "Failed";

?>
