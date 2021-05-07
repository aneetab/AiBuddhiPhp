
<!--
<?php
require('connection.inc.php');
require('functions.inc.php');
$id=$_SESSION['USER_ID'];
$sql="select * from client_users where client_id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
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
  <!--Custom Css file-->
  <title></title>
  <style>
      .all_teams table{
        background:#fff;
      }
      .modal h3{
        text-transform: uppercase;
    text-align:center;
    letter-spacing: 1px;
    opacity: 0.9;
    font-size: 1rem;
    font-weight:bold;
    line-height:1.9;
    word-spacing:3px;
    font-family:"Poppins",sans-serif;
      }
      .modal small{
    opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
      }
      .modal label{
        opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
    text-transform:uppercase;
      }
      .modal .btn-dark{
          width:80px!important;
      }

    .create_or_join button,.modal-footer button{
        background:#363432!important;
        color:#fff !important;
    }
    .create_or_join button:hover,.modal-footer button:hover{

        background:#d4d2cf!important;
    }
    
   
    .card li a.dropdown-toggle::after{
        
        display:none !important;
    }
    .dropleft::before,.dropright::after{
     content: none!important;
     }
      <?php
      include "css/client.css";
      ?>
      .card:hover{
          background:#d4d2cf;
      }
      .card{
        width:18rem;
    margin:1rem;
    background: #fff;
    border-radius: .5rem;
    box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
    position: relative;
    height:220px;
    text-align:center;
      }
      .team-title{
          height:80px;
          width:80px;
          border-radius:5px;
          background:orange;
          box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
          margin:auto;
          color:#fff;
          font-weight:bold;
         padding-top:25px;
         margin-bottom:20px!important;
          margin-bottom:auto;
          text-align:center;
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
          <a class="dropdown-item" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
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
        <a class="nav-link" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
  </div>
</nav>

 <!--  
<section class="teams">
    <div class="container">
    <h3>Teams</h3>
    <div class="create_or_join float-right">
        <button class="btn btn-light" data-toggle="modal" data-target="#teammodal"><i class="fas fa-cog"></i>&nbsp;Create Team </button>
    </div>
    <div class="row teams-menu mx-auto mt-5">
     
                 
    </div> 
         
    </div> 
    </div>

</section>-->
<div class="container">
<div class="create_or_join float-right mt-3 mb-3">
        <button class="btn btn-light" data-toggle="modal" data-target="#teammodal"><i class="fas fa-cog"></i>&nbsp;Create Team </button>
    </div>
  
     <div class="all_teams" id="all_teams">
     
  </div>
</div>
     

<div class="modal" id="teammodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create your team</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-header">
                <small>Collaborate closely with a group of people inside your organization based on project, initiative, or common interest.</small>
            </div>
            <div class="modal-body">
                <form id="team_form" action="" method="POST">
                    <div class="form-group">
                    <label for="title">Team name</label>
                    <input class="form-control" type="text" name="team_name" id="team_name" placeholder=""></input>
                    </div>
                    <div class="form-group">
                    <label for="desc">Description(Optional)</label>
                    <textarea class="form-control" rows="5" name="team_desc" id="team_desc" placeholder="Let people know what this team is all about"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-dark" onclick="createTeam('<?php echo $id?>','<?php echo date('Y-m-d h:i:s')?>')" name='save' id="submitForm" data-dismiss="modal">Next</button>
            </div>
</div>
</div>
</div>


    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>  
<script>
    readTeams();
    function open_team(id)
    {
        window.location.href="team.php?id="+id+"&channel=general";
    }
    function readTeams(){
       
    var getteam="getteam";
    $.ajax({
        url:"create_team.php",
        type:"post",
        data:{getteam:getteam},
        success:function(data,status){
            $('.all_teams').html(data);
        }
    });

    }
    function createTeam(id,date)
    {
      var team_name=$('#team_name').val();
      var team_desc=$('#team_desc').val();
      var arr=team_name.split(" ");
      var display_title='';
      if(arr.length>1)
      {
      var first=arr[0].charAt(0);
      var second=arr[1].charAt(0);
      display_title=first+second;
      }
      else
      {
        var first=arr[0].charAt(0);
      var second=arr[0].charAt(1);
      display_title=first+second;  
      }
      var client_id=id;
      var date=date;
      $.ajax({
       url:"create_team.php",
       type:'post',
       data:{
           team_name:team_name,
           display_title:display_title,
           team_desc:team_desc,
           client_id:client_id,
           date:date
   },
        success:function(data,status)
           {
              readTeams();
            }
});
}
  
   
</script>
</body>
</html>

-->