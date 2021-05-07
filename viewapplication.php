<?php
require('connection.inc.php');
require('functions.inc.php');
$id='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
    $id=get_safe_value($con,$_GET['id']);
    $status=get_safe_value($con,$_GET['status']);
    mysqli_query($con,"update sme_apply set status='$status' where id='$id'");
    if($status=='2')
    {
      //CHANGE THIS TO AUTOMATED EMAIL
     $msg="We are extremely sorry to inform you that your application has been rejected. We truly appreciate you taking your time to apply to AiBuddhi, and we wish you the very best for your future endeavours.";
      $sql="select * from sme_apply where id='$id'";
      $res=mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($res);
      $email_id=$row['email'];
      $from=$_SESSION['ADMIN_FNAME'].' '.$_SESSION['ADMIN_LNAME'];

      $date_val=date("Y-m-d H:i:s");
     
      
      $sql_insert="INSERT INTO `notifications`(`receiveid`,`fromname`,`notification`,`sent_date`) VALUES('$id','$from','$msg','$date_val')";
      $res=mysqli_query($con,$sql_insert);
      

    }
}
$sql="select * from sme_apply where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$email=$row['email'];
$sqlget="select * from client_users where email_id='$email'";
$res1=mysqli_query($con,$sqlget);
$row1=mysqli_fetch_assoc($res1);
$readid=$row1['client_id'];
?>

<!DOCTYPE html>
<html>
<head>
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

<title></title>
<style>
<?php
include "css/sme.css";
include "css/admin.css";

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
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center text-center text-uppercase">
      <div class="media-body">
        <h4 class="m-0"></h4>
        <div class="container">
        <?php
        $photo_id=$row['profile-pic'];
        $getimage="select * from images where id='$photo_id'";
        $resimg=mysqli_query($con,$getimage);
        $rowimg=mysqli_fetch_assoc($resimg);
        $image=$rowimg['image'];
        ?>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>">
              
             
</div>
<p class="font-weight-normal text-muted mb-0"><?php echo $row['firstname'].' '.$row['lastname'] ?></p>
        
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Application Status</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
      <i class="fas fa-info-circle mr-3 text-primary fa-fw"></i>
      <?php 
      if($row['status']==0){
        echo "Applied";
      }
      if($row['status']==1){
        echo "Approved";
      }
      if($row['status']==2){
        echo "Rejected";
      }
      ?></td>
            </a>
    </li>
    <li class="nav-item">
<a href="fill_details.php?id=<?php echo $id ?>" class="nav-link text-dark">
                <i class="fas fa-clipboard-list mr-3 text-primary fa-fw"></i>
                Update Profile
            </a>
  </li>
    
    
  </ul>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Settings</p>

<ul class="nav flex-column bg-white mb-0">  
  <li class="nav-item">
  <select class="form-control ml-3" onchange="update_application_status(<?php echo $row['id']?>,this.options[this.selectedIndex].value)">
  <option value="">Update Status</option>
  <option value="1">Approved</option>
  <option value="2">Rejected</option>
  </select> 
  </li>  
</ul>

</div>
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

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
    <h3> ABOUT ME</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row['about_me']?>
       

    </div>
    <hr>
    <h3> Speaks</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php echo $row['language']?>
       

    </div>
    <hr>
    <h3> Specialities</h3><br/>
    <div class="row d-flex justify-content-center">
        
        <?php 
          $specialities=$row['specialities'];
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
        <div class="card_container container justify-content-center">
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
        </div>
    </section>

   
   
</div>
    
<script>
    function update_application_status(id,select_value)
    {
        window.location.href='viewapplication.php?id='+id+'&type=update&status='+select_value;
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>

