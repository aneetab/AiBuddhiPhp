<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='')
{
  $email_id=$_SESSION['USER_EMAIL'];
  $sql="select * from client_users where email_id='$email_id' and role='1'";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  $id=$row['client_id'];
  $_SESSION['USER_ID']=$id;
  $_SESSION['USER_PIC']=$row['profile_photo'];
  $industry_select="Select * from sort_by where type='industry' order by name";
  $industry_res=mysqli_query($con,$industry_select);
  $enterprise_select="Select * from sort_by where type='enterprise' order by name";
  $enterprise_res=mysqli_query($con,$enterprise_select);
  $experts="select * from client_users,sme_apply where sme_apply.status='1' and client_users.email_id=sme_apply.email";
  $experts_res=mysqli_query($con,$experts);
}
else{
    header('location:client_signup.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
  <!--Custom Css file-->
  <title></title>
  
  
  <style>

  <?php
  
  include "css/client.css";
  ?>
   .btn-group button{
       border: 1px solid #000 !important;
       box-shadow:0 .3rem .5rem rgba(0,0,0,.3) !important;
   }
    .multiselect .dropdown-toggle .btn{
        box-shadow:0 .3rem .5rem rgba(0,0,0,.3) !important;
        background-color: red !important;
    }
    .multiselect-native-select ul
     {
         width:100% !important;
     }

      .all_teams table{
        background:#fff;
      }
    
    .create_or_join button,.modal-footer button{
        background:#363432!important;
        color:#fff !important;
    }
    .create_or_join button:hover,.modal-footer button:hover{

        background:#d4d2cf!important;
    }
    
   
        .form-container{
    background:#fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow:0px 0px 10px 0px #000;
    width: 100%;
    margin:12px 0px!important;
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
      <li class="nav-item">
        <a class="nav-link" href="clientpage.php">Experts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="project_team_create.php">Projects<span class="sr-only">(current)</span></a>
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
       <?php 
       $photo=$row['profile_photo'];
         
       ?>
       <img src="<?php echo $photo?>"> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id="."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
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
        <a class="nav-link" href="clientpage.php"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="project_team_create.php"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
    <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
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

<div class="container">
<button class="btn btn-primary mt-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i> Back</button>
</div>

<div class="alert mt-3" id="msg">
                        
</div>
     
<section class="request_team">
<div class="container mt-5">
<form  class="form-container" id="team_form" action="" method="POST">
                    <div class="form-group text-center text-uppercase" style="font-weight:bold">
                        Fill in your project requirements, a project team will be created for you.
                    </div>
                    <div class="form-group">
                    <label for="title">Team name</label>
                    <input required class="form-control" type="text" name="team_name" id="team_name" placeholder="Enter project team name"></input>
                    </div>
                    <div class="form-group">
                    <label for="title">Select industries under which you need expert consultation(You can select more than one option)</label><br>
                    <select name="industries[]" id="industries" multiple class="form-control">
                    <?php

                    if(mysqli_num_rows($industry_res)>0)
                    {
                        while($industry_row=mysqli_fetch_assoc($industry_res))
                        {
                            echo "<option value='".$industry_row['name']."'>".$industry_row['name']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="title">Select enterprises under which you need expert consultation(You can select more than one option)</label><br>
                    <select name="enterprises[]" id="enterprises" multiple class="form-control">
                    <?php

                    if(mysqli_num_rows($enterprise_res)>0)
                    {
                        while($enterprise_row=mysqli_fetch_assoc($enterprise_res))
                        {
                            echo "<option value='".$enterprise_row['name']."'>".$enterprise_row['name']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="title">Select any expert preferences you might have(Optional)</label><br>
                    <select name="experts[]" id="experts" multiple class="form-control">
                    <?php

                    if(mysqli_num_rows($experts_res)>0)
                    {
                        while($expert_row=mysqli_fetch_assoc($experts_res))
                        {
                            echo "<option value='".$expert_row['firstname'].' '.$expert_row['lastname']."(Client ID: ".$expert_row['client_id'].")"."'>".$expert_row['firstname'].' '.$expert_row['lastname']."(Industry: ".$expert_row['industry']." , Enterprise: ".$expert_row['enterprise'].")</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <br>
                    <div class="form-group">
                    <label for="desc">Describe your project requirements(Specify briefly what kind of help you require)</label>
                    <textarea required class="form-control" rows="5" name="team_desc" id="team_desc" placeholder="Briefly describe your project requirements"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input style="background-color:#800000;color:#fff" type="submit" name="submit" value="Submit" class="btn btn-dark"/>
                    </div>
                </form>
                </div>
</section>


    <!--FOOTER SECTION-->
<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
<script>
    $(document).ready(function(){
      $('#industries').multiselect({
          nonSelectedText:'Select industry',
          enableFiltering:true,
          enableCaseInsensitiveFiltering:true,
          buttonWidth:'400px',
          maxHeight: 200
      });
      $('#enterprises').multiselect({
          nonSelectedText:'Select enterprise',
          enableFiltering:true,
          enableCaseInsensitiveFiltering:true,
          buttonWidth:'400px',
          maxHeight: 200
      });
      $('#experts').multiselect({
          nonSelectedText:'Select expert',
          enableFiltering:true,
          enableCaseInsensitiveFiltering:true,
          buttonWidth:'400px',
          maxHeight: 200
      });

      $('#team_form').on('submit',function(event){
       event.preventDefault();
       let myForm=document.getElementById("team_form");
       var form_data=new FormData();
       form_data=$(this).serialize();
       console.log(form_data);
       $.ajax({
           url:"create_team.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
            if(data==='Success')
            {
            $('#industries option:selected').each(function(){
                $(this).prop('selected',false);
            });
            $('#industries').multiselect('refresh');
            $('#enterprises option:selected').each(function(){
                $(this).prop('selected',false);
            });
            $('#enterprises').multiselect('refresh');
            $('#experts option:selected').each(function(){
                $(this).prop('selected',false);
            });
            $('#experts').multiselect('refresh');
            myForm.reset();
            $('#msg').addClass('alert-success');
            $('#msg').html('Your request has been submitted successfully!')
          }
          if(data==='No')
          {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Error!Could not submit request');
          }
           
           }
           
        });
        
           
      });
      $("#search").keyup(function(){
        var searchText=$(this).val();
        if(searchText!=''){
            $.ajax({
                url:'create_team.php',
                method:'POST',
                data:{query:searchText},
                success:function(response){
                    $("#show-list").html(response);
                }
            });
            }
            else
            {
                $("#show-list").html(''); 
            }
    });
        
    $(document).on('click','a',function(){
        $("#search").val($(this).text());
        $("#show-list").html('');
    });
    
    });
   
   
    function go_back()
    {
        window.history.back();
    }
    
</script>

</body>
</html>
