<?php
require('connection.inc.php');
require('functions.inc.php');
$id='';
$industry='';
$enterprise='';
$is_error='';
$industry_error='';
$enterprise_error='';

if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
}
$sql="select * from sme_apply where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$industry=$row['industry'];
$enterprise=$row['enterprise'];
if(isset($_POST['submit']))
{
    $industry=get_safe_value($con,$_POST['industry']);
    $enterprise=get_safe_value($con,$_POST['enterprise']);
    
    if($industry=='')
    {
        $industry_error='Please enter industry sort tag';
        $is_error='yes';
    }
    if($enterprise=='')
    {
        $enterprise_error='Please enter education sort tag';
        $is_error='yes';
    }
    
    if($is_error=='')
    {
        $sql="UPDATE sme_apply set industry='$industry',enterprise='$enterprise' where id='$id'";
        $res=mysqli_query($con,$sql);
        if($res)
        {
        $msg="Updated Sucessfully!";
        $css_class="alert-success";
        }
        else
        {
            $msg="Failed to update!";
            $css_class="alert-danger";  
        }
    }

}
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
<a href="viewapplication.php?id=<?php echo $id ?>" class="nav-link text-dark">
                <i class="fas fa-clipboard-list mr-3 text-primary fa-fw"></i>
                Application
            </a>
  </li>
    <li class="nav-item">
<a href="fill_details.php?id=<?php echo $id ?>" class="nav-link text-dark">
                <i class="fas fa-magic mr-3 text-primary fa-fw"></i>
                Update Profile
            </a>
  </li>
    
    
  </ul>
  
</div>
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
        <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                        <?php echo $msg;?>
                        </div>
         <?php endif; ?>
            <div class="login-content">
                
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Industry Tag:</label>
                            <input value="<?php echo $industry ?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter industry sort tag" name="industry">
                        </div>
                        <small><?php echo $industry_error?></small>
                        <div class="form-group">
                            <label>Enterprise Tag:</label>
                            <input value="<?php echo $enterprise?>" autocomplete="off" required type="text" class="form-control" placeholder="Enter enterprise sort tag" name="enterprise">
                        </div>
                        <small><?php echo $enterprise_error?></small>
                                               
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Submit</button>
                      </form>
                </div>
            </div>
        </div>
   
   
</div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>