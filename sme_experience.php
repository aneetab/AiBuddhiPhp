<?php
require('connection.inc.php');
require('functions.inc.php');
$email_id=$_SESSION['USER_EMAIL'];
$profession='';
$education='';
$experience='';
$speciality='';
$interests='';
$is_error='';
$profession_error='';
$education_error='';
$experience_error='';
$speciality_error='';
$interest_error='';
$sql="select * from sme_apply where email='$email_id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$profession=$row['profession'];
$education=$row['education'];
$experience=$row['experience'];
$speciality=$row['specialities'];
if(isset($_POST['submit']))
{
    $profession=get_safe_value($con,$_POST['profession']);
    $education=get_safe_value($con,$_POST['education']);
    $experience=get_safe_value($con,$_POST['experience']);
    $speciality=get_safe_value($con,$_POST['speciality']);
    $interests=get_safe_value($con,$_POST['interests']);
    if($profession=='')
    {
        $profession_error='Please enter profession';
        $is_error='yes';
    }
    if($education=='')
    {
        $education_error='Please enter education';
        $is_error='yes';
    }
    if($experience=='')
    {
        $experience_error='Please enter experience';
        $is_error='yes';
    }
    if($speciality=='')
    {
        $speciality_error='Please enter speciality';
        $is_error='yes';
    }
    if($interests=='')
    {
        $interest_error='Please enter interest';
        $is_error='yes';
    }
    if($is_error=='')
    {
        $sql="UPDATE sme_apply set profession='$profession',education='$education',experience='$experience',specialities='$speciality',interests='$interests' where email='$email_id'";
        $res=mysqli_query($con,$sql);
        if($res)
        {
        $msg="Updated Sucessfully!";
        $css_class="alert-success";
        header('location:sme_dashboard.php');
        die();
        }
        else
        {
            $msg="Failed to update!";
            $css_class="alert-danger";  
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>SUBJECT MATTER EXPERT APPLICATION</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--------*CSS files*--------->
  <!--font-awesome-->
  <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--Custom Css file-->
  <style>
    <?php
    include "css/style.css";
    include "css/sme.css";
    ?>
  </style>
  
</head>
<body>
  <!--BOOTSTRAP Responsive Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav mr-auto hide-nav">
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icons fas fa-envelope mt-3"></i><span class="badge badge-danger" id="msg-count">0</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-check-circle"></i><h5>You're all caught up!</h5><br/>
          <small>No new messages</small></a>
      </li>
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icons fas fa-bell mt-3"></i><span class="badge badge-danger" id="notif-count">0</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-check-circle"></i><h5>You're all caught up!</h5><br/>
          <small>No new notifications</small></a>
                      
      </li>
      </ul>
      <ul class="navbar-nav ml-auto d-sm-none d-none d-md-none d-lg-block">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <img src="assets/images/placeholder.jpg">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-user"></i>&nbsp;&nbsp;Profile</a>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
          <a class="dropdown-item" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
        </div>
      </li>
      <small>Hi, <?php echo $_SESSION['USER_NAME'] ?>!</small>
    </ul>
    <ul class="navbar-nav ml-auto d-sm-block d-block d-md-block d-lg-none">
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-user"></i>&nbsp;&nbsp;Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
  </div>
</nav>

  
  <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
        <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                        <?php echo $msg;?>
                        </div>
         <?php endif; ?>
            <div class="login-content">
                
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Profession:</label>
                            <input value="<?php echo $profession ?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter profession" name="profession">
                        </div>
                        <small><?php echo $profession_error?></small>
                        <div class="form-group">
                            <label>Education:</label>
                            <input value="<?php echo $education?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter education" name="education">
                        </div>
                        <small><?php echo $education_error?></small>
                        <div class="form-group">
                        <label>Experience:</label>
                        <input value="<?php echo $experience?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter experience" name="experience">
                        </div>
                        <small><?php echo $experience_error?></small>
                        <div class="form-group">
                        <label>Interests:</label>
                        <input value="<?php echo $interests?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter interests" name="interests">
                        </div>
                        <small><?php echo $interest_error?></small>
                        <div class="form-group">
                        <label>Specialities:</label>
                        <input value="<?php echo $speciality?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter specialities" name="speciality">
                        </div>
                        <small><?php echo $speciality_error?></small>
                        
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Submit</button>
                      </form>
                </div>
            </div>
        </div>
   
   
</div>
    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>  
</body>
</html>

