<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$email_error='';
$password_error='';
$is_error='';
if(isset($_POST['submit'])){
 $email_id=get_safe_value($con,$_POST['email_id']);
 $password=get_safe_value($con,$_POST['password']);
 if($email_id=='')
 {
     $email_error='Please enter email id';
     $is_error='yes';
 }
 if($password=='')
 {
     $password_error='Please enter password';
     $is_error='yes';
 }
 if($is_error=='')
 {
 $sql="select * from admin_users where email_id='$email_id' and password='$password'";
 $res=mysqli_query($con,$sql);
 $count=mysqli_num_rows($res);
 if($count>0){
    $row=mysqli_fetch_assoc($res);
   $_SESSION['ADMIN_LOGIN']='yes';
   $_SESSION['ADMIN_EMAIL']=$email_id;
   $_SESSION['ADMIN_FNAME']=$row['firstname'];
   $_SESSION['ADMIN_LNAME']=$row['lastname'];

   header('location:index.php');
   die();

 }
 else{
    $msg="Please enter correct login credentials.";
  }
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
    <style>
        <?php include "css\admin.css"?>
    </style>
</head>
<body> 

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Enter email:</label>
                            <input autocomplete="off" required type="email" class="form-control" placeholder="Email" name="email_id">
                        </div>
                        <small><?php echo $email_error?></small>
                        <div class="form-group">
                            <label>Enter password:</label>
                            <input required type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <small><?php echo $password_error?></small>
                        <small><?php echo $msg?></small>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="#">Forgot Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Log in</button>
</body>
</html>

