<?php
$sql="select * from project_team where team_id='$id'";
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
        .manage_team{
            position:absolute;
            top: 40px !important;
            right: 100px !important;
        }
        .vertical-nav{
            overflow-x:auto;
        }
        .dropleft .dropdown-toggle::before {
         display: none !important;
        }
        .modal h3{
        text-transform: uppercase;
    text-align:center;
    letter-spacing: 1px;
    opacity: 0.9;
    font-size: 1rem;
    font-weight:bold;
    line-height:1.9;
    word-spacing:3px;
    font-family:"Poppins",sans-serif;
      }
      .modal-body{
          height:400px!important;
      }
      .modal small{
    opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
      }
      .modal label{
        opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
    text-transform:uppercase;
      }
      .modal .btn-dark{
          width:80px!important;
      }

    .create_or_join button,.modal-footer button{
        background:#363432!important;
        color:#fff !important;
    }
    .create_or_join button:hover,.modal-footer button:hover{

        background:#d4d2cf!important;
    }
    
   
    .card li a.dropdown-toggle::after{
        
        display:none !important;
    }
    .dropleft::before,.dropright::after{
     content: none!important;
     }
     #content{
            overflow-x:auto;
        }
        .nav-link{
            margin-right:5px!important;
        }
        li{
            list-style-type: none;
        }
        .manage_team{
            position:absolute;
            top: 40px !important;
            right: 100px !important;
            width:100%;
        }
        .vertical-nav{
            overflow-x:auto;
        }
        .dropleft .dropdown-toggle::before {
         display: none !important;
        }
        .modal h3{
        text-transform: uppercase;
    text-align:center;
    letter-spacing: 1px;
    opacity: 0.9;
    font-size: 1rem;
    font-weight:bold;
    line-height:1.9;
    word-spacing:3px;
    font-family:"Poppins",sans-serif;
      }
     
      .modal label{
        opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
    text-transform:uppercase;
      }
      .modal .btn-dark{
          width:90px!important;
      }

    .create_or_join button,.modal-footer button{
        background:#363432!important;
        color:#fff !important;
    }
    .create_or_join button:hover,.modal-footer button:hover{

        background:#d4d2cf!important;
    }
    .card li a.dropdown-toggle::after{
        
        display:none !important;
    }
    .dropleft::before,.dropright::after{
     content: none!important;
     }
     .dragdrop img{
        margin-left:auto;
        margin-right:auto;
        }
        .file_drag_area
        {
            width:100%;
            height:100%;
            background:#fff;
        }
        .file_drag_over{
            color:#000 !important;
            border-color:#000 !important;
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
        <a class="nav-link" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
 </div>
    </nav>
