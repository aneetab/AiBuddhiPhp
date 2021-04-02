<!DOCTYPE html>
<html>
<head>
<style>
body{
    box-sizing:border-box;
    margin:0;
    padding:0;
    overflow-x:hidden;
}
.dropdown-toggle::after,.dropdown-toggle::before {
            content: none!important;
        }
.dropleft::before{
    content: none!important;
}
.nav-link i{
    font-size:14px !important;
    margin-top:auto;
    margin-bottom:auto;
}
.dropdown img{
    height:60px!important;
    width:60px !important;
    border-radius:30px !important;
}
</style>
    <title>AiBuddhi Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-check-circle fa-2x"></i><h6> You're all caught up!</h6><br/><small>No new messages</a>
    </li>
    </div>
    <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-check-circle fa-2x"></i><h6> You're all caught up!</h6><br/><small>No new notifications</a>
      </li>
      </div>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <img src="assets/images/placeholder.jpg">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-user">&nbsp;</i>Profile</a>
          <a class="dropdown-item" href="#">Account Settings</a>
          <a class="dropdown-item" href="#">Messages</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt">&nbsp;</i>Sign Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>
--------------------------------------------------------------------------------
<ul class="navbar-nav">
    <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-check-circle fa-2x"></i><h6> You're all caught up!</h6><br/><small>No new messages</a>
          </div>
          </li>
          </ul>
    <ul class="navbar-nav">
    <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-check-circle fa-2x"></i><h6> You're all caught up!</h6><br/><small>No new notifications</a>
          </div>
          </li>
      
      </ul>