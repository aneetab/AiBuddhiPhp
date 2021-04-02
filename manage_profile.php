<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$css_class='';
if(isset($_GET['id']) && $_GET['id']!='') {
  $id=get_safe_value($con,$_GET['id']);
  $sql="select * from client_users where client_id='$id' and role='1'";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  }
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $profileImageName=time().'_'.$_FILES['profileImage']['name'];
    $fileext=explode('.',$profileImageName);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg');
    if(in_array($filecheck,$fileextstored)){
        $target='profilepics/'.$profileImageName;       
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
        $sql="update client_users set profile_photo='$profileImageName',firstname='$firstname',lastname='$lastname' where client_id='$id'";
        if(mysqli_query($con,$sql)){
        $msg="Successfully updated";
        $css_class="alert-success";
        }
        else
        {
        $msg="Database Error-Failed to update";
        $css_class="alert-danger";
        }
    }
    else
    {
        $msg="Failed to update";
        $css_class="alert-danger";  
    }
  }else{
        $msg="Image should be in png,jpeg or jpeg format";
        $css_class="alert-danger";
    }
}
if(isset($_POST['remove']))
{

   
        $sql="update client_users set profile_photo='placeholder.jpg' where client_id='$id'";
        if(mysqli_query($con,$sql)){
        $msg="Successfully updated";
        $css_class="alert-success";
        }
        else
        {
        $msg="Database Error-Failed to update";
        $css_class="alert-danger";
        }
}  

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
#profileDisplay{
    display:block;
    width:200px;
    height:180px;
    margin:10px auto;
    border-radius:50%;

}
.btn-dark,.btn-info{
    width:80px!important;
    padding-top:5px!important;
    padding-bottom:5px!important;
    text-align:center !important;
    border-radius:3px !important;
}
.btn-dark:hover,.btn-info:hover{
    color:#000;
    background:#fff;
}
.btn-dark{
    padding-left:2px!important;
}
.btn-info{
    padding-left:15px!important;
}
.login-logo {
    text-align: center;
    margin-bottom: 15px; }
    .login-logo span {
      color: #ffffff;
      font-size: 24px; }
  
  .login-content {
    max-width: 540px;
    margin: 8vh auto; }
  
  .profile-form {
    background: #ffffff;
    padding: 30px 30px 20px;
    border-radius: 2px; }
  
  .profile-form h4 {
    color: #878787;
    text-align: center;
    margin-bottom: 50px; }
  
  .profile-form .checkbox {
    color: #878787; }
  
  .profile-form .checkbox label {
    text-transform: none; }
  
  .profile-form .btn {
    width: 100%;
    text-transform: uppercase;
    font-size: 14px;
    padding: 15px;
    border: 0px; }
  
  .profile-form label {
    color: #000;
    text-transform: uppercase; }
  
  .profile-form label a {
    color: #516abb; }
  
  .social-login-content {
    margin: 0px -30px;
    border-top: 1px solid #e7e7e7;
    border-bottom: 1px solid #e7e7e7;
    padding: 30px 0px;
    background: #fcfcfc; }
  
  .social-button {
    padding: 0 30px; 
  }
    .social-button .facebook {
      background: #3b5998;
      color: #fff; }
      .social-button .facebook:hover,.social-button .google:hover,.login-form .btn:hover {
        background: #e8e9eb;
        color:#000; }
    .social-button .google {
      background: #80171c;
      color: #fff; }
  
  .social-button i {
    padding: 19px;
 }
  
  .register-link a {
    color: #3a62ac; }
</style>
</head>
<body>

<div class="d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="profile-form">
                    <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                        <?php echo $msg;?>
                        </div>
                    <?php endif; ?>

                
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group text-center">
                            <img src="<?php
                                        if($row['profile_photo'])
                                        {
                                            echo "profilepics/".$row['profile_photo'];
                                        }
                                        else
                                        {
                                            echo "placeholder.jpg";
                                        }
                                        ?>"
                             id="profileDisplay" onclick="triggerClick()" alt=""/>
                            <label for="profileImage">Profile Image</label>
                            <input style="display:none;" onchange="displayImage(this)" type="file" name="profileImage" id="profileImage" class="form-control"><br/>
                            <?php if($row['profile_photo']!="placeholder.jpg")
                            {
                                echo "<button class='btn-dark' type='submit' name='remove'>Remove</button>";
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="firstname">FirstName:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['lastname']?>">
                        </div>
                        <div class="social-login-content">
                            <div class="social-button text-center">
                                <button type="button" onclick="go_back()" class="btn-group btn-info">Back</button>
                                <button type="submit" name="submit" class="btn-group btn-info">Save</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function go_back(){
            window.location.href="clientpage.php";
        }
        function triggerClick(){
            document.querySelector('#profileImage').click();
        }
        function displayImage(e){
            if(e.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>
</html>