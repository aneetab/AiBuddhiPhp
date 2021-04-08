<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
 nav{
    box-shadow: 0 4px 6px -6px #222;
}
.navbar-brand img{
    width:100px!important;
    height:60px!important;
}
nav a:hover
{
    color:rgb(110, 16, 16)!important;
}
nav a
{
 
 letter-spacing: 0.3px;
 padding-right:14px!important;
 opacity: 0.9;
 font-size: 0.8rem;
 font-weight:bold;
 line-height:1.5;
 font-family:"Poppins",sans-serif;
 
}

</style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                  <a class="nav-link" href="landing.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="clientpage.php">Find an Expert</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
              </ul>
              <ul class="navbar-nav second-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="client_login.php">Login</a>
                    
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="client_signup.php">Sign Up</a>                    
                  </li>     
              </ul>
            </div>
</nav>