<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$css_class='';
$_SESSION['USER_ROLE']='client';
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='')
{
  $email_id=$_SESSION['USER_EMAIL'];
  $sql="select * from client_users where email_id='$email_id' and role='1'";
  $row=get_data($con,$sql);
  $id=$row[0]['client_id'];
  $_SESSION['USER_ID']=$id;
  $_SESSION['USER_PIC']=$row[0]['profile_photo'];
}
else{
    header('location:client_signup.php');
    die();
}

$industry_select="SELECT * from sort_by where type='industry' order by name";
$industry_list=get_data($con,$industry_select);
$enterprise_select="SELECT * from sort_by where type='enterprise' order by name";
$enterprise_list=get_data($con,$enterprise_select);
$client_id=$_SESSION['USER_ID'];
if(isset($_GET['insert']) && $_GET['insert']=='success')
{
    $msg='Project team request sent successfully!';
    $css_class='alert-success';
}
if(isset($_GET['category']) && $_GET['category']!='')
{
  $category=get_safe_value($con,$_GET['category']);
  if($category=='create_project_team')
  {
      if(isset($_GET['requirement']) && $_GET['requirement']!='')
      {
          $requirement=get_safe_value($con,$_GET['requirement']);
          if($requirement=='type_here')
          {
              $team_name=get_safe_value($con,$_GET['team_name']);
              $industry=get_safe_value($con,$_GET['industry']);
              $enterprise=get_safe_value($con,$_GET['enterprise']);
              $team_desc=get_safe_value($con,$_GET['desc']);
              $date=date('Y-m-d h:i:s');
              $requested_by=$_SESSION['USER_ID'];
              $insert="INSERT into project_team(team_name,team_desc,industry,enterprise,requested_on,requested_by) VALUES('$team_name','$team_desc','$industry','$enterprise','$date','$requested_by')";
              if(mysqli_query($con,$insert))
              {
                
                $msg='Project Request sent';
                $css_class='alert_success';
                
              }
        else
        {
            $msg='Error occured while submitting request! Please try again';
            $css_class='alert-danger';

        }

          }
      }
  }
}
include ('calculator.php');

/*------------------------------ CHATBOT STARTS ------------------------------*/

/*-------------------------------------- ChatBOT ENDS --------------------------------------------*/
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
  <link rel="stylesheet" type="text/css" href="css/jquery.convform.css">

  <!--Custom Css file-->
  <title></title>
  <style>
      <?php
      include "css/client.css";
      ?>
      select.btn-group{
        width: 180px !important;
      }
      /*-----------Chatbot syle starts -------*/
      .chat_icon{
          position:fixed;
          right:40px;
          bottom:20px;
          color:#800000;
          cursor:pointer;
          z-index:100;
      }
      .chat_box{
          position:fixed;
          right:20px;
          bottom:100px;
          width:400px;
          height:80vh;
          background:#dedede;
          z-index:100;
          transition:all 0.3s ease-out;
          transform:scaleY(0);
          
      }
      .chat_box.active{
        transform:scaleY(1);
      }
      .conv-form-wrapper textarea{
          height:30px;
          overflow:hidden;
          resize:none;
      }
      #messages{
          padding:20px;
      }
  /*-----------------Chatbot style ends----------------*/
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
        <a class="nav-link" href="">Experts</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="project_team_create.php">Projects<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="client_calendar.php">Calendar<span class="sr-only"></span></a>
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
       $photo=$row[0]['profile_photo'];
         
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
        <a class="nav-link" href=""><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="project_team_create.php"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="client_calendar.php">Calendar<span class="sr-only"></span></a>
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
<div class="alert <?php echo $css_class?>">
<?php echo $msg?>
</div>
<div class="chat_icon">
    <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
</div>
<section class="sort">
      <div class="container dropdowns text-center text-uppercase">
        Sort By:
       
        <div class="form-group">
        <select id="industry_select" onchange="sorting()" class="btn-group form-control">
          <option value="">Select Industry</option>
        <?php foreach($industry_list as $industry_res)
            {
        ?>
            <option value="<?php echo $industry_res['name']?>"><?php echo $industry_res['name']?></option>
            <?php
            }
            ?>
        </select>
        <select id="enterprise_select" onchange="sorting()" class="btn-group form-control">
          <option value="">Select Enterprise</option>
        <?php foreach($enterprise_list as $enterprise_res)
            {
        ?>
            <option value="<?php echo $enterprise_res['name']?>"><?php echo $enterprise_res['name']?></option>
            <?php
            }
            ?>
        </select>
      </div>
    </section>
    <?php
    foreach($event_results as $val)
    {   
    ?>
    <div class="container mt-3 mb-3">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="alert alert-info" style="font-weight:bold;">
          <div onclick="closeAlert(this ,'<?php echo $val['eventid']?>')">
          <i class="fas fa-window-close float-right"></i>
          </div>
            <strong><?php echo $val['start'].'-'.$val['end'].'<br>'.$val['name']?><strong>
            
        </div>
        </div>
        </div>
        </div>
   <?php
    }
    ?>
    
    
    <!--SUBJECT MATTER EXPERTS SECTION-->
    <section class="sme">
      <div class="container">
      <div class="row mx-auto" id="sme_list">
        <?php
        $get_expert=get_experts($con);
        foreach($get_expert as $list){
        ?>
      <div class="col-lg-4 col-md-6 col-12 d-flex">
      <div class="sme-card py-3 py-sm-0">
        <img src="<?php echo $list['profile-pic']?>" class="card-img-top" alt="...">
        <div class="card-body flex-fill">
          <h5 class="card-title"><?php echo $list['firstname'].' '.$list['lastname']?></h5>
          <h6 class="card-title">Industry: <?php echo $list['industry']?></h6>
          <h6 class="card-title">Enterprise: <?php echo $list['enterprise']?></h6>
          <p class="card-text"><?php echo $list['about_me']?></p>
          <a href="sme_profile.php?id=<?php echo $list['id']?>" class="btn btn-red btn-primary mb-2">View Profile</a>
        </div>
      </div>
      </div>
      <?php }?>
     </div>
     
      </div>       
    </section>
    <div class="chat_box">
	    <div class="container">
	    <div class="card no-border">
	    <div class="conv-form-wrapper">
	    <form action="" method="GET" class="hidden">
            <select name="category" data-conv-question="Hi,how can I help you?">
	          <option value="apply_expert">Apply as expert</option>
              <option value="create_project_team">Create project team </option>
            </select>
            <div data-conv-fork="category">
	          <div data-conv-case="apply_expert">
              <input type="text" name="name" data-conv-question="To apply on AiBuddhi as an expert, you can find the 'Apply as an Expert' tab on the footer of this page." data-no-answer="true">
              <input type="text" name="name" data-conv-question="You have to complete the application form, and your application will be reviewed by our team shortly," data-no-answer="true">
              <select data-conv-question="Do you want to go to Expert Application form?">
		        <option value="expert" data-callback="expert">Expert Application Form</option>
		        <option value="cancel" data-callback="cancel">Cancel</option>
              </select>
	          </div>
	          <div data-conv-case="create_project_team">
              <input type="text" name="name" data-conv-question="To create a new project team, click on the 'Projects' tab in the menu bar, then click on the 'Create Project' button to submit a project team request." data-no-answer="true">
              <input type="text" name="name" data-conv-question="If you do not have any preferred experts in mind, type in your project requirements, and a project team will be created for you." data-no-answer="true">
              <select name="requirement" data-conv-question="Do you want to go to Projects page?">
		        <option value="project" data-callback="project">Projects Tab</option>
		        <option value="type_here">Type in your requirements</option>
              </select>
              </div>
            </div>
            <div data-conv-fork="requirement">
	          <div data-conv-case="type_here">
              <input type="text" name="team_name" data-conv-question="Please enter the name of your project team">
              <input type="text" name="industry" data-conv-question="Please enter the industries from which you need experts in your team">
              <input type="text" name="enterprise" data-conv-question="Please enter the enterprises from which you need experts in your team">
              <input type="text" rows="5" name="desc" data-conv-question="Please describe your project requirements clearly">
            </div>
            </div>
	    </form>
	    </div>
	    </div>
	    </div>
	  </div>


<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.convform.js"></script>
<!--------------------- JS for CHATBOT starts-------------------------->
<script>
    function closeAlert(e,id)
    {
      var updateevent='updateevent';
      $.ajax({
        url:'updateEvent.php',
        type:"post",
        data:{updateevent:updateevent,eventid:id},
        success:function(data){
          console.log(data);
          data=data.trim();
          console.log(data);
          if(data==="UPDATED")
          {
          e.parentNode.parentNode.parentNode.parentNode.remove();
          }
          else
          {
            alert("ERROR");
          }

        }

      });
     
    } 
     $(document).ready(function(){
        $('.chat_icon').click(function(event){
            $('.chat_box').toggleClass('active');
        });
    });

    function expert(stateWrapper, ready) {
		window.open("sme_application.php");
		ready();
	}
    function cancel(stateWrapper, ready) {
		window.location.reload();
		ready();
	}
    function project(stateWrapper, ready) {
		window.open("project_team_create.php");
		ready();
	}
  function sorting()
  {
    var industry=document.getElementById("industry_select").value;
    var enterprise=document.getElementById("enterprise_select").value;
    $.ajax({
           url:"submit.php",
           method:"POST",
           data:{
             industry:industry,
             enterprise:enterprise,
           },
           success:function(data,status){
            $('#sme_list').html(data);
           
          }
           
        });
  }
	jQuery(function($){
		convForm = $('.conv-form-wrapper').convform({selectInputStyle: 'disable'});
		console.log(convForm);
		});
</script>
<!--------------------- JS for CHATBOT ends-------------------------->
</body>
</html>
