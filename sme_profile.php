<?php
require('connection.inc.php');
require('functions.inc.php');
$id='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
    $sql="select * from sme_apply where id='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
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
  <link rel="stylesheet" href="css/sme.css">
</head>
<body>
  <!--BOOTSTRAP Responsive Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
      <li class="nav-item active dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link" href="clientpage.php">Experts <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link" href="#">Projects</a>
      </li>
 </ul>
    
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
       <img src="<?php echo  $_SESSION['USER_PIC'];?>">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$_SESSION['USER_ID']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
        ?>
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
    <li class="nav-item active">
        <a class="nav-link" href="#"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
    <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
    ?>
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



  <!--SORT BY SECTION-->
    <section>
        <div class="container profile">
          <button class="active" type="button">Profile</button>
          <button type="button">Schedule</button>
         </div>
    </section>
   
    <!--SME VIDEO INTRO SECTION-->
    <section class="video_intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 text-center">
                  <h2>User Profile</h2>
                    <div>
                        <img src="<?php echo $row['profile-pic']?>" alt="person 1">
                    </div>
                    
                    <h3><?php echo $row['firstname'].' '.$row['lastname']?></h3>
                    <h4>Industry: <?php echo $row['industry']?></h4>
                    <h4>Enterprise: <?php echo $row['enterprise']?></h4>
                    <button type="button">Message</button>
                </div>
                <div class="col-lg-6 col-md-6 col-12 text-center">
                    <h2>Video Introduction</h2>
                    <div>
                    <video id="video" width="320" height="300" controls>
                            <source src="<?php echo $row['video']?>" type=video/mp4>
                          </video>
                    </div>
                </div>
          
  </div>
    </section>
    <!--SME INFO SECTION-->
    <section class="info">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                  <h3>About Me <h3>  
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <p><?php echo $row['about_me']?></p>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                      <h3>Profession </h3>
                     
                    </div>
                    <div class="col-lg-9 col-md-9 col-12">
                        <p><?php echo $row['profession']?></p>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                          <h3>Education </h3>
                         
                        </div>
                        <div class="col-9">
                            <p><?php echo $row['education']?></p>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">
                              <h3>Experience </h3>
                             
                            </div>
                            <div class="col-9">
                                <p><?php echo $row['experience']?></p>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-12">
                                  <h3>Languages</h3>
                                 
                                </div>
                                <div class="col-9">
                                    <p><?php echo $row['language']?></p>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                      <h3>Specialities</h3>
                                     
                                    </div>
                                    <div class="col-9">
                                        <p><?php echo $row['specialities']?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">
                                          <h3>Interests</h3>
                                         
                                        </div>
                                        <div class="col-9">
                                            <p><?php echo $row['interests']?></p>
                                        </div>
                                        </div>
                                    </div>
                                  </section>
  
    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?> 
</body>
</html>

