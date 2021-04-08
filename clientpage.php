<?php
require('connection.inc.php');
require('functions.inc.php');
$_SESSION['USER_ROLE']='client';
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='')
{
  $email_id=$_SESSION['USER_EMAIL'];
  $sql="select * from client_users where email_id='$email_id' and role='1'";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  $id=$row['client_id'];
  $_SESSION['USER_ID']=$id;
  $_SESSION['USER_PIC']='profilepics/'.$row['profile_photo'];
}
else{
    header('location:client_signup.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
  <title></title>
  <style>
      <?php
      include "css/client.css";
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

  <ul class="navbar-nav mr-auto">
      <li class="nav-item active dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link" href="#">Experts <span class="sr-only">(current)</span></a>
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
       <img src="<?php echo "profilepics/".$row['profile_photo'];?>">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
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
        <a class="nav-link" href="clientpage.php"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
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
    <section class="sort">
      <div class="container dropdowns text-center text-uppercase">
        Sort By:
        <div class="dropdown btn-group">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Industry
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"></a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <div class="dropdown btn-group">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Enterprise
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"></a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
    </section>

    <!--SUBJECT MATTER EXPERTS SECTION-->
    <section class="sme">
      <div class="container">
      <div class="row mx-auto">
        <?php
        $get_expert=get_experts($con);
        foreach($get_expert as $list){
        ?>
      <div class="col-lg-4 col-md-6 col-12 d-flex">
      <div class="card py-3 py-sm-0">
        <img src="<?php echo $list['profile-pic']?>" class="card-img-top" alt="...">
        <div class="card-body flex-fill">
          <h5 class="card-title"><?php echo $list['firstname'].' '.$list['lastname']?></h5>
          <h6 class="card-title">Industry: <?php echo $list['industry']?></h6>
          <h6 class="card-title">Enterprise: <?php echo $list['enterprise']?></h6>
          <p class="card-text"><?php echo $list['about_me']?></p>
          <a href="sme_profile.php?id=<?php echo $list['id']?>" class="btn btn-primary mb-2">View Profile</a>
        </div>
      </div>
      </div>
      <?php }?>
     </div>
     
      </div>       
    </section>

    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>  
</body>
</html>
