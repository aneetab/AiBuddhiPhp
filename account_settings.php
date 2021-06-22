<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$css_class='';
$password_error='';
$role=$_SESSION['USER_ROLE'];
$email_id=$_SESSION['USER_EMAIL'];
$client_id=$_SESSION['USER_ID'];
$sql="select * from client_users where client_id='$client_id'";
$row=get_data($con,$sql);
$account_status=$row[0]['account_status'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<title></title>
<style>
<?php
include "css/style.css";
?>

</style>
</head>
<body>
<button class="btn btn-primary mt-3 ml-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i>Back</button>
<div class="d-flex align-content-center flex-wrap">

        <?php if($account_status==0){ ?>
        <div class="container mt-3 p-5" style="background:#fff" id="deactivated">
                   <p style="font-weight:bold;text-transform:uppercase;">Your account has been deactivated.</p>
                   <p> All your data,likes,comments will be hidden from other users. You can log back in using your same credentials anytime to reactivate your account.</p>
                   <a href="logout.php" style="text-decoration:underline;color:#0c5460;font-weight:bold">Click link to sign out</a>
        </div>
        <?php } ?>
        <?php if($account_status==1){?>
        <div class="container mt-3 p-5" style="background:#fff" id="#deactivate_form">
           
                <div class="profile-form">
                    <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                        <?php echo $msg;?>
                        </div>
                    <?php endif; ?>

                
                    <form method="post">
                   <p style="font-weight:bold;text-transform:uppercase">Temporarily Disable Your Account</p>
                   <p>Hi <?php echo $row[0]['firstname'].' '.$row[0]['lastname'] ?>,</p>
                   <p>You can deactivate your account instead of deleting it. This means your account will be hidden until you reactivate it by logging back in.</p>
                   
                   <div class="form-group">
                            <label>To continue,please re-enter your password</label>
                            <input autocomplete="off" required type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                        </div>
                        <div class="alert" id="submit_error"></div>
                        <p>When you press the button below, your photos, comments and likes will be hidden until you reactivate your account by logging back in.</p>    
                    </form>
                    <button type="submit" name="submit" class="btn btn-flat m-b-30 m-t-30" style="background-color:#800000;color:#fff" onclick="disable('<?php echo $email_id?>','<?php echo $client_id?>')">Temporarily disable account</button>
            </div>
        </div>
        <?php }?>
    </div>
    <script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
           
        function go_back(){
           window.history.back();

        }
        function disable(email,id)
        {
            var id=id;
            var email=email;
            var password = $('#password').val();
            
       $.ajax({
           url: 'submit.php',
           type: "POST",
           data:'action=deactivate&email='+email+'&password='+password+'&id='+id,
		   success: function(data) {
                 var data=data.trim();
                 if(data!=='Success')
                 {
                    $('#submit_error').addClass('alert-danger');
                    $('#submit_error').html(data);
                 }
                 if(data==='Success')
                 {
                   window.location.reload();
                 }
			       
				}
             });
        }
        
    </script>
</body>
</html>