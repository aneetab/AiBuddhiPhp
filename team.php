<?php
require 'connection.inc.php';
require 'functions.inc.php';
$team_id='';
$channel='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
    $channel=get_safe_value($con,$_GET['channel']);
    $team_id=$id;
  
}
$sql="select * from project_team where team_id='$team_id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$client_id=$_SESSION['USER_ID'];
$sqlget="select * from client_users where client_id='$client_id'";
$resClient=mysqli_query($con,$sqlget);
$rowClient=mysqli_fetch_assoc($resClient);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php include "css/admin.css" ?>
        <?php include "css/sme.css"?>
        .ellipse p{
            overflow:hidden;
            text-overflow:ellipse;
            display:-webkit-box;
            -webkit-line-clamp:3;
            -webkit-box-orient:vertical;
            color:black;

        }
        .vertical-nav{
            overflow-x:auto;
        }
        .dropleft .dropdown-toggle::before {
         display: none !important;
        }
    </style>
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">
        <h4 class="m-0"></h4>
        <a href="project_team_create.php"><i class="fas fa-arrow-left"></i>&nbsp;All teams</a>
        <!--here-->
      </div>
    </div>
  </div>


  <ul><li class="dropdown dropleft">
        <a class="dropdown-toggle" href="#" id="manage_team_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0"><?php echo $row['team_name']?><i class=" float-right fas fa-ellipsis-h"></i></p>
        </a>
        <div class="manage_team dropdown-menu" aria-labelledby="manage_team_dropdown">
        
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#teammodal"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add Member</a>
          <a class="dropdown-item" href="#"><i class="fas fa-folder-plus"></i>&nbsp;&nbsp;Add Channel</a>
          <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Leave the team</a>
          <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#"><i class="fas fa-trash"></i>&nbsp;&nbsp;Delete the team</a>
       </div> 
      </li>
      </ul>
      

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                general
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
                <p class="text-gray font-weight-bold text-uppercase px-5 small">channel1<i class="float-right fas fa-lock"></i></p>
            </a>
    </li>
   
  </ul>


</div>
<div class="page-content pl-5" id="content">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="team.php?id=<?php echo $id?>&channel=<?php echo $channel?>">Posts <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="all_files.php?team_id=<?php echo $id?>&channel=<?php echo $channel?>">Files</a>
      </li>
 </ul>
 <ul class="navbar-nav ml-auto d-sm-none d-none d-md-none d-lg-block">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php 
       $photo=$rowClient['profile_photo'];   
       ?>
        <img src="<?php echo $photo?>">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$rowClient['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
        ?>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
          <a class="dropdown-item" href="logout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
        </div>
      </li>
      <small>Hi, <?php echo $_SESSION['USER_NAME'] ?>!</small>
    </ul>
    <ul class="navbar-nav ml-auto d-sm-block d-block d-md-block d-lg-none">
    <li class="nav-item active">
        <a class="nav-link" href="clientpage.php"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="project_team_create.php"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
    <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$rowClient['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
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
        <a class="nav-link" href="logout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
 </div>
</nav>
<main class="my-5">
    <div class="container">
     
      <section class="text-center">
        <h4 class="mb-5"><strong>ALL POSTS</strong></h4>
        <?php
        $get_posts="SELECT * from posts where team_id='$team_id'";
        $posts=get_data($con,$get_posts);
        ?>
        
        <div class="row">
        <?php
        foreach($posts as $post)
        {
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card ellipse">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img style="height:200px" src="<?php echo $post['image']?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $post['post_title']?></h5>
                <p class="card-text">
                  <?php echo $post['content']?>
                </p>
                <a href="post.php?id=<?php echo $id?>" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>
        
        <?php
        }
        ?>
        </div>

          

          
      </section>
      
    </div>
  </main>
<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
