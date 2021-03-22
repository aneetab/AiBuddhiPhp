<?php
require('connection.inc.php');
require('functions.inc.php');
if(ISSET($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $language=$_POST['language'];
    $industry=$_POST['industry'];
    $enterprise=$_POST['enterprise'];
    $about_me=$_POST['about_me'];
    
    $profile_pic=$_FILES['profile-pic'];
    $video=$_FILES['video'];
    $resume=$_FILES['resume'];
    $photo_id=$_FILES['photo-id'];
    print_r($_FILES);

}
print_r($_FILES);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        <?php include "css/sme.css"?>
    </style>
</head>
<body>
<div class="container my-5">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name </th>
        <th>Gender </th>
        <th>Photo </th>
        <th>Resume </th>
        <th> Industry </th>
        <th> Enterprise </th>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<footer class="footersection">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-12 col-12 text-center">
                  <div>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Terms and Conditions</a></li>
                      <li><a href="#">Jobs</a></li>
                      <li><a href="#">Contact</a></li>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12 text-center">
                  <div>  
                      <li><a href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
                      <li><a href="#"><i class="fab fa-instagram fa-2x"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                      <li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12 text-center">
                  <div>
                      <h3>AiBuddhi © COPYRIGHT 2021. ALL RIGHTS RESERVED.</h3>
                  </div>
              </div>             
              </div>
          </div>             
      </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
</div>


<!-- End demo content -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>