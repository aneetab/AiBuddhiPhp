<?php
require('connection.inc.php');
require('functions.inc.php');
$email_id='';
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='')
{
  $email_id=$_SESSION['USER_EMAIL'];
  $fname=$_SESSION['USER_NAME'];
}
else{
    header('location:client_login.php');
    die();

}?>
<!DOCTYPE html>
<html>
<head>
    <title>AiBuddhi Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">

    <style>
        <?php include "css/admin.css" ?>
    </style>
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">
        <h4 class="m-0"></h4>
        <p class="font-weight-normal text-muted mb-0">Welcome,<small><?php echo ' '.$fname?>!</small> </p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="admin.php" class="nav-link text-dark">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                home
            </a>
    </li>
    <li class="nav-item">
      <a href="clients.php" class="nav-link text-dark">
                <i class="fas fa-users mr-3 text-primary fa-fw"></i>
                clients
            </a>
    </li>
    <li class="nav-item">
      <a href="experts.php" class="nav-link text-dark">
                <i class="fas fa-user-tie mr-3 text-primary fa-fw"></i>
                experts
            </a>
    </li>
    <li class="nav-item">
      <a href="industry.php" class="nav-link text-dark">
                <i class="fas fa-store mr-3 text-primary fa-fw"></i>
                industry
            </a>
    </li>
    <li class="nav-item">
      <a href="projects.php" class="nav-link text-dark">
                <i class="fas fa-tasks mr-3 text-primary fa-fw"></i>
                projects
            </a>
    </li>
    <li class="nav-item">
      <a href="enterprise.php" class="nav-link text-dark">
                <i class="fas fa-hand-sparkles mr-3 text-primary fa-fw"></i>
                enterprise
            </a>
    </li>
  </ul>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Settings</p>

<ul class="nav flex-column bg-white mb-0">
<li class="nav-item">
    <!--Link to notify.php--><a href="" class="nav-link text-dark">
              <i class="fas fa-bell mr-3 text-primary fa-fw"></i>
              notify
          </a>
  </li> 
  
  <li class="nav-item">
    <a href="logout.php" class="nav-link text-dark">
              <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw"></i>
              logout
          </a>
  </li>  
</ul>
</div>
