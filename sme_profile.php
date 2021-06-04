<?php
require('connection.inc.php');
require('functions.inc.php');
$id='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
    $sql="select * from sme_apply where id='$id'";
    $row=get_data($con,$sql);
    $email=$row[0]['email'];
    $sqlget="select * from client_users where email_id='$email'";
    $row1=get_data($con,$sql_get);
    $readid=$row1[0]['client_id'];
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
  
  <style>
    <?php
    include "css/sme.css";
    ?>
    .resume-items{   
    width:100%;height:auto;
    margin:20px 0;
    border-radius:20px;
    padding:10px 20px;
    background:#fff;        
    }
    .profile-display img{
        border-radius:5px;
        width:200px;
        height:200px;
        margin-top:10px;
      }
    .user-profile{
    width:100%;height:auto;
    margin:20px 0;
    border-radius:20px;
    padding:10px 20px;
    }
    .user-profile button{
        margin:auto;    
    }
    .user-profile h3{
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 1rem;
    margin:6px 0 15px 0;
    font-weight:bold;
    line-height:1;
    word-spacing:4px;
    font-family:"Poppins",sans-serif; 
    color: rgb(34, 23, 15);
    }
    .card-text img{
        height:30px;
        width:30px;
        border-radius:10%;
    }
    .card-title{
        font-size:10px !important;
    }
    .card{
        margin-left:auto;
        margin-right:auto;     
    }
.video-body{
    width:auto;height:auto;
    margin:20px 0;
    border-radius:20px;
    padding:10px 20px;
    background:#fff;
    text-align:center;
}
.profile-display{
    width:100%;height:auto;
    margin:20px auto;
    border-radius:20px;
    padding:10px 20px;
    background:#fff;
    text-align:center;
} 
  .interest-badge{
          color:#fff;
          font-family:"Poppins",sans-seriff;
          font-weight:bold;
          text-transform:uppercase;
          padding:20px!important;
          margin:20px!important;
          font-size:16px!important;
          border-radius:3px!important;
          box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
      }
     .resume-icons
    {
        font-size:30px;
        color:rgb(82, 5, 5)!important;
        padding:3px;
    }
    .resume-items h4{  
    letter-spacing: 1px;
    font-size: 0.9rem;
    font-weight:bold;
    line-height:1.1;
    word-spacing:2px;
    font-family:"Poppins",sans-serif;
    color:rgb(49, 31, 17)
    }
    .resume-items h3{
      letter-spacing: 1px;
      font-size: 0.9rem;
      font-weight:bold;
      line-height:1.1;
      word-spacing:2px;
      font-family:sans-serif;
      color:#000;
      text-transform:uppercase;
      }
   .card_container{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    background:#fff;
    margin:20px auto;
    border-radius:20px;
    padding:10px 20px;
  }  
  .card_container .card{
    width:12rem;
    margin:1rem;
    background: #52090930;
    color:#000;
    font-weight:bold;
    border-radius: .5rem;
    box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
    overflow: hidden;
    position: relative;
    height:8rem;
    text-align:center;
  }
  .card_container .card img{
    height:60px;
    width: 60px;
    object-fit: cover;
    border-radius: 90%;
    margin:auto;
    margin-top:2px;
    font-weight:bold;
  }
  
  .card_container .content{
    padding-bottom: 2px;
    text-align: center;
    font-weight:bold !important;
  }
  .card_container .content p{
    color:#333;
    font-size: 0.9rem;
    padding:2px;
  }
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
          <a class="dropdown-item" href="logout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
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
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row[0]['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
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



  <!--SORT BY SECTION-->
    <section>
        <div class="container profile">
          <button class="active" type="button">Profile</button>
          <button type="button">Schedule</button>
         </div>
    </section>
   
 
    <!--SME VIDEO INTRO SECTION-->
    <section class="intro_video">
    <div class="container">
    
            <div class="video-body">
            <video id="video" width="400" height="300" controls>
            <source src="<?php echo $row[0]['video']?>" type=video/mp4>
            </video>
            </div>
    
    </div>
    </section>

    <section class="user-profile">
    <div class="container">
    <div class="profile-display">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
        <div>
            <img src="<?php echo $row[0]['profile-pic']?>" alt="person 1">
            <h3><?php echo $row[0]['firstname'].' '.$row[0]['lastname']?></h3>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        
    
                    
    <button class="btn btn-dark" type='button' onclick="openchat('<?php echo $email?>')">Message</button>          
    </div>
    </div>
    <hr>
    <h3> ABOUT ME</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row[0]['about_me']?>
       

    </div>
    <hr>
    <h3> Speaks</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row[0]['language']?>
       

    </div>
    <hr>
    <h3> Specialities</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php 
          $specialities=$row[0]['specialities'];
          $specialities=explode(',',$specialities);
          $colours=array('#FFE921','#28a745','#17a2b8','#FFE921',);
          foreach($specialities as $value)
          {
          $res="<span style='background-color:#8B0000;' class='interest-badge badge badge-secondary'>$value</span>";
          echo $res;
          }
        ?>
       

    </div>
    </div>
    </section>
  
    <!--Resume container-->
    <section class="resume_container">
        <div class="container">
        <div class="resume-items">
        <h3> Resume </h3><br>
          <?php
          $readSql="select * from resume where client_id='$readid' and exp_type='Experience'";
          $readRes=mysqli_query($con,$readSql);
          if(mysqli_num_rows($readRes)>0)
          {
              echo '<h3><i class="resume-icons fas fa-briefcase"></i>EXPERIENCE</h3>';
          }
          while($readRow=mysqli_fetch_assoc($readRes))
          {
            
                $output = '<div class="row offset-2">
                           <div class="col-lg-6 col-md-6 col-12">'."<h4><i class='resume-icons fas fa-calendar-alt'></i>".
                           $readRow['start'].'-'.$readRow['end'].'</h4></div>'
                           .'<div class="col-lg-6 col-md-6 col-12">
                            <h3>'.$readRow['title'] .'</h3><br><h4>'.$readRow['org'].'-'.$readRow['location'].'<br>'.$readRow['description'].'</h4>
                            </div></div><hr>';
                echo $output;
          }?>
           
           <?php
          $readSql="select * from resume where client_id='$readid' and exp_type='Education'";
          $readRes=mysqli_query($con,$readSql);
          if(mysqli_num_rows($readRes)>0)
          {
              echo '<h3><i class="resume-icons fas fa-university"></i>EDUCATION</h3>';
          }

          while($readRow=mysqli_fetch_assoc($readRes))
          {
            $output = '<div class="row offset-2">
                           <div class="col-lg-6 col-md-6 col-12">'."<h4><i class='resume-icons fas fa-calendar-alt'></i>".
                           $readRow['start'].'-'.$readRow['end'].'</h4></div>'
                           .'<div class="col-lg-6 col-md-6 col-12">
                            <h3>'.$readRow['title'] .'</h3><br><h4>'.$readRow['org'].'-'.$readRow['location'].'<br>'.$readRow['description'].'</h4>
                            </div></div><hr>';
                echo $output;
                
          }?>
          <?php
          $readSql="select * from resume where client_id='$readid' and exp_type='Certification'";
          $readRes=mysqli_query($con,$readSql);
          if(mysqli_num_rows($readRes)>0)
          {
              echo '<h3><i class="resume-icons fas fa-file-alt"></i>CERTIFICATION</h3>';
          }
          while($readRow=mysqli_fetch_assoc($readRes))
          {
            
                $output = '<div class="row offset-2">
                            <div class="col-lg-6 col-md-6 col-12">
                                '."<h3><i class='resume-icons fas fa-file-alt'></i>".$readRow['title'] .'</h3><br><h4>'.$readRow['org'].'-'.$readRow['location'].'<br>'.$readRow['description'].'</h4>
                            </div>'.'
                            <div class="col-lg-6 col-md-6 col-12">'."<h4><i class='resume-icons fas fa-calendar-alt'></i>".
                            $readRow['start'].'-'.$readRow['end'].'</h4></div>
                            </div><hr>';
                echo $output;
          }
         
          ?>
          </div>
        </div>
    </section>
   
    <section class="industry">
        <div class="card_container container">
          <div class="card">
            <img src="assets/images/factory.png" alt="">
            <p>INDUSTRY</p>
          <div class="content">
            <p><?php echo $row[0]['industry']?></p>
          </div>
          </div>
    
          <div class="card">
            <img src="assets/images/teamwork.png" alt="">
            <p>ENTERPRISE</p>
            <div class="content">
            <p><?php echo $row[0]['enterprise']?></p>
            </div>
          </div>
        <div class="card">
           <img src="assets/images/rating.png" alt="">
           <p>CLIENTS</p>
           <div class="content">
           <p>0</p>
           </div>
        </div>
        </div>
    </section>
  
  
    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?> 
<script>
  function openchat(email)
  {
  window.location.href='chat.php?email='+email;
  }

</script>
</body>
</html>

