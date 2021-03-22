<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
 $email_id=get_safe_value($con,$_POST['email_id']);
 $password=get_safe_value($con,$_POST['password']);
 $sql="select * from admin_users where email_id='$email_id' and password='$password'";
 $res=mysqli_query($con,$sql);
 $count=mysqli_num_rows($res);
 if($count>0){
   $_SESSION['ADMIN_LOGIN']='yes';
   $_SESSION['ADMIN_EMAIL']=$email_id;
   header('location:index.php');
   die();

 }
 else{
   $msg="Please enter correct login credentials.";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css">
    <style>
        <?php include "css\admin_login.css"?>
    </style>
</head>
<body> 
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
            <form class="login100-form flex-sb flex-w" method="post">
                <div class="wrap-input100 m-b-16">
                    <input required class="input100" type="email" name="email_id" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-16">
                    <input required class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <div class="w-full beforeNone text-center">
                        <input type="submit" name="submit" class="nv-login-submit login100-form-btn" name="submit">
                        <small><?php echo $msg?></small><br/>
                    </div>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <a href="#">Forget Password?</a>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>

