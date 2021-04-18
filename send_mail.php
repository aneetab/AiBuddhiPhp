<?php
$template_file="./mail_template_register.php";
$email_to="daksh.hazard@gmail.com";
$swap_var=array(
    "{TO_NAME}"=>"Daksh",
    "{TO_EMAIL}"=>"daksh.hazard@gmail.com",
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
echo $message;
if(mail($email_to,$subject,$message,$headers)){
    echo "Success";
}
else
echo "Failed";

?>
