<?php
require('connection.inc.php');
require('functions.inc.php');
$email_id=$_SESSION['USER_EMAIL'];
$sql="Select * from sme_apply where email='$email_id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$status=$row['status'];
$id=$row['id'];
$count='';
$sql_get="select * from notifications where receiveid='$id'";
$res=mysqli_query($con,$sql_get);
$count=mysqli_num_rows($res);
if($status=='0')
{
$msg="Thank you for applying at AiBuddhi. Your application will be reviewed shortly";
$css_class="alert-success";
}
if($status=='1')
{
$msg="Congratulations!Your application has been approved. Welcome to AiBuddhi!";
$css_class="alert-success";
}
if($status=='2')
{
$msg="We're very sorry to inform you that your application has been rejected.";
$css_class="alert-danger";
}

?>

<!DOCTYPE html>
<html>
<head>
  <style>
    p{
    opacity: 0.9;
    font-size: 0.7rem;
    font-weight:medium;
    line-height:1.9;
    font-family:"Poppins",sans-serif;
    text-transform:none;
    }
  </style>
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
      <li class="nav-item">
      <li class="nav-item">
      <a class="nav-link" href="chat_users.php"><i class="nav-icons fas fa-envelope-open mt-3"></i></a>
      </li>
      </li>
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icons fas fa-bell mt-3"></i><span class="badge badge-danger" id="notif-count"><?php echo $count ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          $sql_get1=mysqli_query($con,"SELECT * from notifications where status='0' and receiveid='$id'");
          if(mysqli_num_rows($sql_get1)>0){
            while($res=mysqli_fetch_assoc($sql_get1))
            {
            echo '<a class="dropdown-item" href="#"><small>'.$res['fromname'].'</small><br/><p>'.$res['notification'].'</p>';
            echo '<div class="dropdown-divider"></div>';
            }

          }
          else
          {
            echo '<a class="dropdown-item" href="#"><i class="red-icons fas fa-check-circle"></i><h5>You are all caught up!</h5><br/><small>No new notifications</small></a>';
          }
          ?>
                      
      </li>
      </ul>
      <ul class="navbar-nav ml-auto d-sm-none d-none d-md-none d-lg-block">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <img src="<?php echo $row['profile-pic']?>">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href=""><i class="red-icons fas fa-user"></i>&nbsp;&nbsp;Profile</a>
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
<div class="application_status mt-5">
                    <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                        <?php echo $msg;?>
                        </div>
                    <?php endif; ?>
</div>

<!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>  
</body>
</html>

