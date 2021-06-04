<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
    footer
  {
      background:rgba(252, 251, 251, 0.322);
      font-weight:bolder;
      width:100%;
      height:auto;
      padding:70px 0 20px 0;
      position:relative;
  }
  .footersection a, .credits a
  {
   text-transform:capitalize;
   opacity: 0.9;
   font-size: 0.7rem;
   font-weight:bold;
   line-height:1.5;
   font-family:"Poppins",sans-serif;
   color:#000;
  }
  .footersection h3
  {
      text-transform:uppercase;
      color:#000;
      margin-bottom:25px;
      font-size:1.2rem !important;
      font-weight:600;
      text-shadow: 0 2px 5px rgb(0,0,0,0.4);
  }
  .credits h4
  {
     text-transform:uppercase;
     color:#000;
     margin-bottom:25px;
     font-size:0.7rem !important;
     font-weight:600;
     float:right;
 
  }
  
  .credits
  {
      font-weight:bolder;
      width:100%;
      height:auto;
      padding:10px 0 0 0;
      position:relative;
      display:flex;
      justify-content:space-between;
  }
  .social-icons li{
     display:inline;
     float:left;
     padding-right:0.3rem;
  }
  
  .credits li{
      list-style: none;
      display:inline;
      float:left;
      padding-right:0.6rem;
  }
 
  .credits a:hover,.footersection a:hover{
      text-decoration: none;
      color:rgb(99, 16, 16)
  }

  .scrolltop
 {
    background:lightcoral!important;
    border-radius: 5px;
    padding:10px;
    position:fixed;
    bottom:20px;
    right:40px;
    display:none;
 }
 .scrolltop:hover
 {
     background:rgba(160, 115, 115, 0.609)!important;
 }
 #myBtn
 {
     position:fixed;
     bottom:20px;
     right:42px;
     z-index:99 !important;
     color:#fff!important;
 }
</style>
</head>
<body>
    <!--Website Footer-->
    <footer class="footersection">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-6 text-center">
                  <div class="logo">
                  <img src="assets/images/logo.png">
                  </div>
                  <div>
                      <h3>AiBuddhi</h3>
                      <li><a href="sme_application.php">Apply as an expert</a></li>
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
      
          <div class="scrolltop float-right text-center" id="scrolldiv">
              <i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
          </div>
          </div>
</footer>
<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Custom JS-->
