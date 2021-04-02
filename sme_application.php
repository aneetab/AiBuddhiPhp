<?php
require('connection.inc.php');
require('functions.inc.php');
$_SESSION['USER_ROLE']='sme';
$email_id='';

if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='')
{
  $email_id=$_SESSION['USER_EMAIL'];
  $sql="select * from sme_apply where email='$email_id'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0)
  {
    header('location:sme_dashboard.php');
    die();
  }
  $sql="select * from client_users where email_id='$email_id' and role='2'";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  $id=$row['client_id'];
}
else{
    header('location:client_login.php');
    die();
}

  if($_SERVER['REQUEST_METHOD']=='POST'){
      $date_val=date("Y-m-d H:i:s");
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $gender=$_POST['gender'];
      $language=$_POST['language'];
      $industry=$_POST['industry'];
      $enterprise=$_POST['enterprise'];
      $about_me=$_POST['about_me'];
      /*PROFILE PIC STARTS*/
      $profile_pic=$_FILES['profile-pic'];
      $filename1=$profile_pic['name'];
      $fileerror1=$profile_pic['error'];
      $filetmp1=$profile_pic['tmp_name'];
      $fileext=explode('.',$filename1);
      $filecheck=strtolower(end($fileext));
      $fileextstored=array('png','jpg','jpeg');
      if(in_array($filecheck,$fileextstored)){
          $destinationfile1='profilepics/'.$filename1;
          move_uploaded_file($filetmp1,$destinationfile1);
      }else{
          $msg1="Extension must be png/jpg/jpeg";
      }
      /*PROFILE PIC ENDS*/
      /*VIDEO STARTS*/
      $video=$_FILES['video'];
      $filename2=$video['name'];
      $fileerror2=$video['error'];
      $filetmp2=$video['tmp_name'];
      $destinationfile2='intros/'.$filename2;
      move_uploaded_file($filetmp2,$destinationfile2);
      /*VIDEO ENDS*/
      /*RESUME STARTS*/
      $resume=$_FILES['resume'];
      $filename3=$resume['name'];
      $fileerror3=$resume['error'];
      $filetmp3=$resume['tmp_name'];
      $destinationfile3='resume/'.$filename3;
      move_uploaded_file($filetmp3,$destinationfile3);
      /*RESUME ENDS*/
      /*PHOTO ID STARTS*/
      $photo_id=$_FILES['photo-id'];
      $filename4=$photo_id['name'];
      $fileerror4=$photo_id['error'];
      $filetmp4=$photo_id['tmp_name'];
      $fileext=explode('.',$filename4);
      $filecheck=strtolower(end($fileext));
      if(in_array($filecheck,$fileextstored)){
          $destinationfile4='photoID/'.$filename4;
          move_uploaded_file($filetmp4,$destinationfile4);
      }else{
          $msg2="Extension must be png/jpg/jpeg.";
      }
      /*PROFILE PIC ENDS*/
      if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
        $id=get_safe_value($con,$_GET['id']);
        mysqli_query($con,"delete from sme_apply where id='$id'");
      }
      $q="INSERT INTO `sme_apply`(`email`,`firstname`,`lastname`,`gender`,`profile-pic`,`language`,`industry`,`enterprise`,`video`,`about_me`,`resume`,`photo-id`,`status`,`date_time`) VALUES ('$email_id','$firstname','$lastname','$gender','$destinationfile1','$language','$industry','$enterprise','$destinationfile2','$about_me','$destinationfile3','$destinationfile4','0','$date_val')";
      $query=mysqli_query($con,$q);
      header('location:sme_dashboard.php');
      die();

      
     
}
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
       <img src="assets/images/placeholder.jpg">
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


  <!--INTRODUCTION SECTION-->
 
    <section>
        <div class="container intro">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 742.418 712.575">
                    <g id="Group_29" data-name="Group 29" transform="translate(-245 -109)">
                      <path id="Path_339" data-name="Path 339" d="M825.818,262.524h-3.9V155.547A61.915,61.915,0,0,0,760,93.632H533.353a61.915,61.915,0,0,0-61.916,61.916V742.43a61.915,61.915,0,0,0,61.915,61.915H760a61.915,61.915,0,0,0,61.915-61.915V338.672h3.9Z" transform="translate(-147.004 15.369)" fill="#3f3d56"/>
                      <path id="Path_340" data-name="Path 340" d="M808.736,150.925V746.1a46.959,46.959,0,0,1-46.942,46.952h-231.3A46.966,46.966,0,0,1,483.521,746.1V150.925a46.965,46.965,0,0,1,46.971-46.951H558.55a22.329,22.329,0,0,0,20.656,30.74H711.074a22.329,22.329,0,0,0,20.656-30.74h30.055a46.959,46.959,0,0,1,46.951,46.942Z" transform="translate(-146.449 15.843)" fill="#fff"/>
                      <g id="Group_26" data-name="Group 26" transform="translate(402.822 206.2)">
                        <path id="Path_45" data-name="Path 45" d="M446.878,474.642a99.3,99.3,0,0,1-99.337-99.254V375.3c0-.208,0-.427.012-.635.3-54.4,44.863-98.7,99.325-98.7a99.337,99.337,0,1,1,.011,198.674h-.011Zm0-196.587a97.454,97.454,0,0,0-97.233,96.677c-.011.222-.011.4-.011.569a97.258,97.258,0,1,0,97.259-97.246Z" transform="translate(-347.54 -275.967)" fill="#e6e6e6"/>
                        <g id="Group_27" data-name="Group 27" transform="translate(17.768 55.394)">
                          <ellipse id="Ellipse_7" data-name="Ellipse 7" cx="21.322" cy="21.322" rx="21.322" ry="21.322" transform="translate(16.803 0.451)" fill="#3f3d56"/>
                          <path id="Path_63" data-name="Path 63" d="M476.175,412.51h-104.6a2.141,2.141,0,0,1-.391-.031l49.472-85.686a3.463,3.463,0,0,1,6.029,0l33.2,57.5,1.59,2.751Z" transform="translate(-371.188 -325.034)" fill="#980e2e"/>
                          <path id="Path_65" data-name="Path 65" d="M533.713,412.268H443.245l17.53-25.464,1.261-1.835,22.844-33.184a4.622,4.622,0,0,1,6.866-.41,4.131,4.131,0,0,1,.329.41Z" transform="translate(-370.49 -324.791)" fill="#980e2e"/>
                        </g>
                      </g>
                      <path id="Path_39" data-name="Path 39" d="M516.164,595.55H310.627a3.81,3.81,0,0,1-3.806-3.806V540.76a3.811,3.811,0,0,1,3.806-3.806H516.164a3.811,3.811,0,0,1,3.806,3.806v50.985a3.811,3.811,0,0,1-3.806,3.806ZM310.627,538.476a2.286,2.286,0,0,0-2.284,2.284v50.985a2.286,2.286,0,0,0,2.284,2.284H516.164a2.286,2.286,0,0,0,2.284-2.284V540.76a2.286,2.286,0,0,0-2.284-2.284Z" transform="translate(88.717 -86.233)" fill="#e6e6e6"/>
                      <circle id="Ellipse_5" data-name="Ellipse 5" cx="15.986" cy="15.986" r="15.986" transform="translate(410.001 464.033)" fill="#980e2e"/>
                      <path id="Path_40" data-name="Path 40" d="M397.513,562.313a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,1,0,.087-5.328H397.513Z" transform="translate(65.395 -92.952)" fill="#e6e6e6"/>
                      <path id="Path_41" data-name="Path 41" d="M397.513,584.061a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,1,0,.087-5.328H397.513Z" transform="translate(65.395 -98.714)" fill="#e6e6e6"/>
                      <path id="Path_42" data-name="Path 42" d="M516.164,711.54H310.627a3.81,3.81,0,0,1-3.806-3.806V656.75a3.811,3.811,0,0,1,3.806-3.806H516.164a3.811,3.811,0,0,1,3.806,3.806v50.985A3.811,3.811,0,0,1,516.164,711.54ZM310.627,654.466a2.286,2.286,0,0,0-2.284,2.284v50.985a2.286,2.286,0,0,0,2.284,2.284H516.164a2.286,2.286,0,0,0,2.284-2.284V656.75a2.286,2.286,0,0,0-2.284-2.284Z" transform="translate(88.717 -116.963)" fill="#e6e6e6"/>
                      <circle id="Ellipse_6" data-name="Ellipse 6" cx="15.986" cy="15.986" r="15.986" transform="translate(410.001 549.292)" fill="#980e2e"/>
                      <path id="Path_43" data-name="Path 43" d="M397.513,678.3a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,0,0,.087-5.328H397.513Z" transform="translate(65.395 -123.682)" fill="#e6e6e6"/>
                      <path id="Path_44" data-name="Path 44" d="M397.513,700.051a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,0,0,.087-5.328H397.513Z" transform="translate(65.395 -129.444)" fill="#e6e6e6"/>
                      <path id="Path_39-2" data-name="Path 39" d="M516.164,595.55H310.627a3.81,3.81,0,0,1-3.806-3.806V540.76a3.811,3.811,0,0,1,3.806-3.806H516.164a3.811,3.811,0,0,1,3.806,3.806v50.985a3.811,3.811,0,0,1-3.806,3.806ZM310.627,538.476a2.286,2.286,0,0,0-2.284,2.284v50.985a2.286,2.286,0,0,0,2.284,2.284H516.164a2.286,2.286,0,0,0,2.284-2.284V540.76a2.286,2.286,0,0,0-2.284-2.284Z" transform="translate(88.717 84.286)" fill="#e6e6e6"/>
                      <circle id="Ellipse_5-2" data-name="Ellipse 5" cx="15.986" cy="15.986" r="15.986" transform="translate(410.001 634.552)" fill="#980e2e"/>
                      <path id="Path_40-2" data-name="Path 40" d="M397.513,562.313a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,1,0,.087-5.328H397.513Z" transform="translate(65.395 77.567)" fill="#e6e6e6"/>
                      <path id="Path_41-2" data-name="Path 41" d="M397.513,584.061a2.664,2.664,0,1,0,0,5.329H523.118a2.665,2.665,0,1,0,.087-5.328H397.513Z" transform="translate(65.395 71.805)" fill="#e6e6e6"/>
                      <g id="Group_28" data-name="Group 28" transform="translate(733.282 333.482)">
                        <path id="Path_409" data-name="Path 409" d="M616.354,733.283H603.9l-5.924-48.033h18.379Z" transform="translate(-579.376 -258.561)" fill="#feb8b8"/>
                        <path id="Path_410" data-name="Path 410" d="M781.847,821.454H741.693v-.508a15.63,15.63,0,0,1,15.628-15.629h24.527Z" transform="translate(-741.693 -334.661)" fill="#2f2e41"/>
                        <path id="Path_411" data-name="Path 411" d="M764.825,725.426,752.7,728.28l-16.778-45.4,17.89-4.213Z" transform="translate(-573.145 -258.858)" fill="#feb8b8"/>
                        <path id="Path_412" data-name="Path 412" d="M932.408,812.63l-39.085,9.2-.116-.494a15.63,15.63,0,0,1,11.63-18.8h0l23.872-5.621Z" transform="translate(-734.869 -335.04)" fill="#2f2e41"/>
                        <path id="Path_413" data-name="Path 413" d="M775.572,619.007c.024-2.5.765-61.577,16.958-83.913l.239-.33L849.2,542.55l-1.262,12.4c2.482,2.414,22.006,22.816,27.644,71.128l59.9,160.867-27.845,2.531L825.205,613.867l-43.62,190.884h-27.6Z" transform="translate(-741.138 -346.881)" fill="#2f2e41"/>
                        <path id="Path_414" data-name="Path 414" d="M784.539,541.411l5.516-28.96c-1.08-1.39-5.865-8.065-4.8-15.89.695-5.105,3.742-9.582,9.059-13.309l14.3-33.362.193-.113c.963-.567,23.728-13.731,36.139-1.311.31.24,30.867,24.5,18.6,57.218l-15.148,45.45Z" transform="translate(-739.758 -351.018)" fill="#ccc"/>
                        <path id="Path_415" data-name="Path 415" d="M766.675,576.428a10.241,10.241,0,0,0,8.649-13.106l29.527-21.273-17.676-6.723-25.329,21.232a10.3,10.3,0,0,0,4.829,19.871Z" transform="translate(-741.086 -346.855)" fill="#feb8b8"/>
                        <path id="Path_416" data-name="Path 416" d="M771.369,546.127l45.078-35.516-13.4-45.787a16.451,16.451,0,0,1,1.661-13.02,15.216,15.216,0,0,1,9.977-7.2c7.717-1.633,14.722,2.688,20.817,12.845l.047.092c1.008,2.465,24.492,60.516,6.561,72.931-17.541,12.143-58.215,29.821-58.624,30l-.477.206Z" transform="translate(-740.353 -350.968)" fill="#ccc"/>
                        <circle id="Ellipse_66" data-name="Ellipse 66" cx="27.308" cy="27.308" r="27.308" transform="translate(63.619 30.758)" fill="#feb8b8"/>
                        <circle id="Ellipse_67" data-name="Ellipse 67" cx="24.158" cy="24.158" r="24.158" transform="translate(109.58)" fill="#2f2e41"/>
                        <path id="Path_417" data-name="Path 417" d="M891.2,398.231A24.16,24.16,0,0,1,853.9,385.546a24.16,24.16,0,1,0,47.126-9.907A24.151,24.151,0,0,1,891.2,398.231Z" transform="translate(-736.626 -354.068)" fill="#2f2e41"/>
                        <path id="Path_418" data-name="Path 418" d="M798.37,398.1c4.217-7.55,5.831-10.7,11.269-15.3,4.809-4.061,10.724-5.253,15.495-1.406a28.737,28.737,0,1,1-17.044,23C803.942,403.815,802.517,398.686,798.37,398.1Z" transform="translate(-739.134 -353.913)" fill="#2f2e41"/>
                      </g>
                      <path id="Path_419" data-name="Path 419" d="M1395.965,822.09H657.424c-1.071,0-1.938-.468-1.938-1.045s.868-1.045,1.938-1.045h738.541c1.07,0,1.938.468,1.938,1.045S1397.036,822.09,1395.965,822.09Z" transform="translate(-410.486 -0.515)" fill="#e6e6e6"/>
                    </g>
                  </svg>
                  

            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
            <h1>Subject Matter Expert Application</h1>
            <h4>Thank you for applying on AiBuddhi.</h4>
            <h2>Please keep in mind.</h2>
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam dolorum explicabo sed. Nemo distinctio eveniet voluptatibus perspiciatis unde dignissimos exercitationem voluptas voluptatum beatae. Beatae nostrum mollitia, quod est incidunt impedit.</h4>
            <small><span>*</span>All fields are required.</small>  
            </div>
            </div>        
  </div>
    </section>

    <!--PROFILE INFORMATION SECTION-->
    <section class="container-fluid">
      <section class="row justify-content-center">
          <section class="col-lg-10 col-md-8 col-sm-6 m-auto display-block">
    <form class="form-container" action="" method="post" enctype="multipart/form-data">
    <section>
        <div class="container profile-info">
            <h3>Profile</h3>
                    <div>
                        <h4>General Information</h4>
                              <div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" required>
                              </div>
                              <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                              </div>
                              <div class="form-group">
                                <label for="gender">Gender:</label>
                                <input type="text" class="form-control" id="gender" name="gender" required>
                              </div>
                        <div class="form-group">
                        <label for="file">Profile Pic:</label>
                        <input type="file" name="profile-pic" id="profile-pic" class="form-control" required>
</div>
  </div>
</div>
    </section>
    <!--LANGUAGES SECTION-->
    <section>
        <div class="container languages">
            <h3>Languages</h3>
            <h4>What is your language of instruction and what topics you offer consultation on</h4>
                
                    <div>
                        
                            <div class="form-group">
                              <label for="language">Languages you speak:</label>
                              <input type="text" class="form-control" name="language" id="language" required>
                            </div>
                            <div class="form-group">
                              <label for="industry">Industry of expertise:</label>
                              <input type="text" class="form-control" id="industry" name="industry" required>
                            </div>
                            <div class="form-group">
                              <label for="enterprise">Enterprise of expertise:</label>
                              <input type="text" class="form-control" id="enterprise" name="enterprise" required>
                            </div>                                   
  </div>
  </div>
    </section>
  <!--INTRODUCTION VIDEO SECTION-->
    <section>
        <div class="container video-container">
            <h3>Video</h3>
            <h4>Record a short subject matter expert profile video.</h4>
                
                    <div>
                                 <div class="form-group">
                                <label for="video">Link to introduction video:</label>
                                <input type="file" name="video" id="video" class="form-control" required>
                              </div>
                         </div>                   
  </div>
  
    </section>
    <section>
      <!--ABOUT ME SECTION-->
        <div class="container biography-container">
            <h3>Biography</h3>
            <h4>Write about yourself and your qualifications.</h4>
            <small>Introduce yourself to the AiBuddhi community.Include your qualifications and experiences.</small>
               
                    <div class="">
                            <div class="form-group">
                                <label for="about_me">About Me:</label>
                                <textarea class="form-control" rows="5" id="about_me" name="about_me" required></textarea>
                              </div>                        
                         </div>                   
  
</div>
    </section>
    <!--RESUME SECTION-->
    <section>
        <div class="container resume-container">
            <h3>Upload Resume</h3>
            <h4>List your qualifications</h4>
            <small>Tell us more about your education,certifications and relevant work experience.Please upload your resume(PDF format).
            <div>
                <div class="form-group">
                <input type="file" name="resume" id="resume" accept="application/pdf" class="form-control" required>  
         </div>
</div>
     </div>
    </section>
    <!--PHOTO-ID SECTION-->
    <section>
        <div class="container photo-id">
            <h3>Photo of your ID</h3>
            <small>Please upload a government ID(passport,driver's license or other form of governmental identity card) verifying your identity.</small>
             <div class="form-group">
             <label for="photo-id">Upload photo:</label>
                 <input type="file" name="photo-id" id="photo-id" class="form-control" required>
</div>
  </div>

    </section>
    <!--SUBMIT FORM SECTION-->
    <section>
        <div class="form-group container submission text-center">
        <input type="submit" name="submit" value="SUBMIT">
        </div>
</form>
    </section>
</section>
</section>
</section>
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

