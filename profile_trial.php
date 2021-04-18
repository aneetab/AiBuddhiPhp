<?php
require('connection.inc.php');
require('functions.inc.php');
$id='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
    $sql="select * from sme_apply where id='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $email=$row['email'];
    $sqlget="select * from client_users where email_id='$email'";
    $res1=mysqli_query($con,$sqlget);
    $row1=mysqli_fetch_assoc($res1);
    $readid=$row1['client_id'];
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
    .resume-items{
      
    width:100%;height:auto;
    margin:20px 0;
    border-radius:20px;
    padding:10px 20px;
    background:#fff;
         
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
          padding:10px!important;
          margin:20px!important;
          font-size:16px!important;
      }
      .interest-badge .badge{
        border-radius:10% !important;
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

  



  <!--SORT BY SECTION-->
 
   
    <!--SME VIDEO INTRO SECTION-->
    <section class="intro_video">
    <div class="container">
    
            <div class="video-body">
            <video id="video" width="400" height="300" controls>
            <source src="<?php echo $row['video']?>" type=video/mp4>
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
            <img src="<?php echo $row['profile-pic']?>" alt="person 1">
            <h3><?php echo $row['firstname'].' '.$row['lastname']?></h3>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        
    
                    
    <button class="btn btn-dark" type='button' onclick="openchat('<?php echo $email?>')">Message</button>          
    </div>
    </div>
    <hr>
    <h3> ABOUT ME</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row['about_me']?>
       

    </div>
    <hr>
    <h3> Speaks</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row['language']?>
       

    </div>
    </div>
    </section>
  <!--
    <div class="col-lg-8 col-md-8 col-12 text-center">
           <div class="row">
           <h3><?php echo $row['firstname'].' '.$row['lastname']?></h3>
           </div>
           <div class="row">
            <div class="card bg-light mb-3 mr-2" style="width: 12rem;">
            <div class="card-body">
            <h5 class="card-title">INDUSTRY</h5><hr>
            <p class="card-text"><img src="assets/images/factory.png"><?php echo $row['industry']?></p>
            </div>
            </div>
            <div class="card bg-light mb-3 mr-2" style="width: 12rem;">
            <div class="card-body">
            <h5 class="card-title">ENTERPRISE</h5><hr>
            <p class="card-text"><img src="assets/images/teamwork.png"><?php echo $row['enterprise']?></p>
            </div>
            </div>
            <div class="card bg-light mb-3" style="width: 12rem;">
            <div class="card-body">
            <h5 class="card-title">CLIENTS</h5><hr>
            <p class="card-text"><img src="assets/images/rating.png">0</p>
            </div>
            </div>
           </div>
    -->
    <!--Specialities-->
    <section class="resume_container">
        <div class="container">
        <div class="resume-items">

         
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
         
               
          /*
          $interests=$row['interests'];
          $interests=explode(',',$interests);
          $colours=array('#FFE921','#28a745','#17a2b8','#FFE921',);
          foreach($interests as $value)
          {
          $res="<span style='background-color:#AD4553;' class='interest-badge badge badge-secondary'>$value</span>";
          echo $res;
          }*/
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
            <p><?php echo $row['industry']?></p>
          </div>
          </div>
    
          <div class="card">
            <img src="assets/images/teamwork.png" alt="">
            <p>ENTERPRISE</p>
            <div class="content">
            <p><?php echo $row['enterprise']?></p>
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

