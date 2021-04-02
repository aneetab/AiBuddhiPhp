<?php
require('connection.inc.php');
require('functions.inc.php');
$email_id=$_SESSION['USER_EMAIL'];
$sql="Select * from sme_apply where email='$email_id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$msg="Thank you for applying at AiBuddhi. Your application will be reviewed shortly";
$css_class="alert-success";

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
       <img src="<?php echo "profilepics/".$row['profile-pic']?>">
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
    <footer class="footersection">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-6 text-center">
                  <div class="logo">
                  <img src="assets/images/logo.png">
                  </div>
                  <div>
                      <h3>AiBuddhi</h3>
                      <li><a href="file:///C:/Users/91982/OneDrive/Desktop/Website/sme_application.html#">Apply as an expert</a></li>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6">
                  <div>
                      <h3>Industry</h3>
                      <li><a href="#">Transport</a></li>
                      <li><a href="#">Hospital</a></li>
                      <li><a href="#">Computer</a></li>
                      <li><a href="#">Pharmaceutical</a></li>
                      <li><a href="#">Entertainment</a></li>
                      <li><a href="#">Telecommunication</a></li>
                      <li><a href="#">All industries</a></li>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6">
                  <div>
                      <h3>Enterprise</h3>
                      <li><a href="#">Manufacturing</a></li>
                      <li><a href="#">Coordinating</a></li>
                      <li><a href="#">Planning</a></li>
                      <li><a href="#">All enterprises</a></li>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-6">
                  <div>
                      <h3>Resources</h3>
                      <li><a href="#">Blog</a></li>
                  </div>
                  <div class="mt-4">
                      <h3>Contact & follow us</h3>
                      <li class="mb-3"><a href="#">Contact</a></li>
                      <ul class="social-icons">                            
                          <li class="social-icons"><a href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
                          <li class="social-icons"><a href="#"><i class="fab fa-instagram fa-2x"></i></a></li>
                          <li class="social-icons"><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                          <li class="social-icons"><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                  </ul>
                  </div>
              </div>
              </div>
              <div class="credits row">
                  <div class="col-lg-5 col-md-5 col-5">
                      <div class="social-links">
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">Terms and Conditions</a></li>
                          
                      </div>
                  </div>
                  
                  <div class="col-lg-7 col-md-7 col-7 text-center float-right">
                      <div>
                          <h4>AiBuddhi © COPYRIGHT 2021. ALL RIGHTS RESERVED.</h4>
                      </div>
                  </div>
                  
                  </div>
              </div>  
          </div>
  </footer> 
<!--JavaScript files-->
<script src="assets/fontawesome-icons/all.js"></script>
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

