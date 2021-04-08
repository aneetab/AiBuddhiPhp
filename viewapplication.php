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

</style>
</head>
<body>
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center text-center text-uppercase">
      <div class="media-body">
        <h4 class="m-0"></h4>
        <div class="container">
              <img src="<?php echo $row['profile-pic'] ?>" alt="">
             
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
                Complete Profile
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


<section class="container-fluid">
      <section class="row justify-content-center text-center">
          <section class="video_intro col-lg-10 col-md-8 col-sm-6 m-auto display-block py-2">
          <h2>Video Introduction</h2>
              <div class="container">
              <video id="video" width="320" height="300" controls>
                            <source src="<?php echo $row['video']?>" type=video/mp4>
                          </video>
             
</div>
</section>
</section>
</section>

    <!--SME VIDEO INTRO SECTION-->
   
    <section class="container-fluid">
      <section class="row justify-content-center">
          <section class="details col-lg-10 col-md-8 col-sm-6 m-auto display-block py-2">
          <div class="info container">
          <div class="table-responsive">
<table class="table table-bordered table-hover">

<tbody>
<tr>
    <td><h3> About me<h3> </td>
    <td><p><?php echo $row['about_me']?><p></td>
</tr>
<tr>
    <td><h3>Languages<h3> </td>
    <td><p><?php echo $row['language']?><p></td>
</tr>
<tr>
    <td><h3>Industry<h3> </td>
    <td><p><?php echo $row['industry']?><p></td>
</tr>
<tr>
    <td><h3>Enterprise<h3> </td>
    <td><p><?php echo $row['enterprise']?><p></td>
</tr>
<tr>
    <td><h3>Profession<h3> </td>
    <td><p><?php echo $row['profession']?><p></td>
</tr>
<tr>
    <td><h3>Education<h3> </td>
    <td><p><?php echo $row['education']?><p></td>
</tr>
<tr>
    <td><h3>Experience<h3> </td>
    <td><p><?php echo $row['experience']?><p></td>
</tr>
<tr>
    <td><h3>Specialities<h3> </td>
    <td><p><?php echo $row['specialities']?><p></td>
</tr>
<tr>
    <td><h3>Interests<h3> </td>
    <td><p><?php echo $row['interests']?><p></td>
</tr>
<tr>
    <td><h3>Resume<h3> </td>
    <td><p><a href="<?php echo $row['resume']?>"><?php echo $row['resume']?></a><p></td>
</tr>
<tr>
    <td><h3>Photo ID<h3> </td>
    <td><p><a href="<?php echo $row['photo-id']?>"><?php echo $row['photo-id']?></a><p></td>
</tr>
<tr>
    <td><h3>Industry sort tag<h3> </td>
    <td><p><a href="<?php echo $row['industry_tag']?>"><?php echo $row['industry_tag']?></a><p></td>
</tr>
<tr>
    <td><h3>Enterprise sort tag<h3> </td>
    <td><p><a href="<?php echo $row['enterprise_tag']?>"><?php echo $row['enterprise_tag']?></a><p></td>
</tr>


      
</tbody>
</table>
<div class="text-center">
<a href='experts.php'><button class="btn-success">Back</button>
    </div>
</div>
</div>
   
</section>
</section>
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

