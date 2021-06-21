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
    
}
$sql="select * from sme_apply where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$email=$row['email'];
$email_id=$row['id'];
$sqlget="select * from client_users where email_id='$email'";
$res1=mysqli_query($con,$sqlget);
$row1=mysqli_fetch_assoc($res1);
$readid=$row1['client_id'];
$email_to=$row1['email_id'];
$to_name=$row1['firstname'].' '.$row1['lastname'];
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
//include "css/sme.css";
include "css/admin.css";

?>
li{
  list-style-type:none;
}
#sidebar img{
    height:100px;
    width:100px;
    margin:auto;
    border-radius:20px;
}
select{
    width:80% !important;
}
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

@keyframes ldio-qols3mi1kcj {
  0% { opacity: 1 }
  100% { opacity: 0 }
}
.ldio-qols3mi1kcj div {
  left: 94px;
  top: 48px;
  position: absolute;
  animation: ldio-qols3mi1kcj linear 1s infinite;
  background: #730d2d;
  width: 12px;
  height: 24px;
  border-radius: 6px / 12px;
  transform-origin: 6px 52px;
}.ldio-qols3mi1kcj div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -0.9166666666666666s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -0.8333333333333334s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.75s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.6666666666666666s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.5833333333333334s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.5s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.4166666666666667s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.3333333333333333s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.25s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.16666666666666666s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.08333333333333333s;
  background: #730d2d;
}.ldio-qols3mi1kcj div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
  background: #730d2d;
}
.loadingio-spinner-spinner-159309ckpip {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: #f1f2f3;
}
.ldio-qols3mi1kcj {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-qols3mi1kcj div { box-sizing: content-box; }
/* generated by https://loading.io/ */
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
        ?>
        <img src="<?php echo $photo_id ?>">
              
             
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
  <div id="sendmail">
<li class="nav-item">
<a class="nav-link text-dark" id="test" data-target="#reject_modal" data-toggle="modal">
                <i class="fas fa-envelope mr-3 text-primary fa-fw"></i>
                Send Rejection Mail
</a>
  </li>
</div>
    
    
  </ul>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Settings</p>

<ul class="nav flex-column bg-white mb-0">  
  <li class="nav-item">
  <select class="form-control ml-3" id="status">
  <option value="">Update Status</option>
  <option value="1">Approved</option>
  <option value="2" id="#test">Rejected</option>
  </select> 
  <button class="btn btn-primary mt-3 ml-3" onclick="update_application_status(<?php echo $row['id']?>)" style="background:#800000;color:#fff;">Update</button>
  </li>  
</ul>

</div>
<div class="page-content p-5" id="content">
<div class="alert mt-3" id="msg">
</div>

<div><button class="btn btn-primary mt-3 ml-3 mb-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i>Back</button></div>
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <div class="container text-center"><div class="loadingio-spinner-spinner-159309ckpip" style="margin-left:auto;margin-right:auto;" id="spinner"><div class="ldio-qols3mi1kcj">
<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
</div></div></div>

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
<div class="modal" id="reject_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-uppercase text-center">
                <h6>Reasons for putting application on hold</h6>
                <button type="button" style="color:#fff;background-color:#800000;" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <form method="POST" id="reject_form">
                    <table class="table table-bordered" id="dynamic_field">
                    <tr>
                    <td><input type="text" name="reason[]" placeholder="Enter a reason" class="form-control reason_list" /></td>  
                    <td><i name="add" id="add" style="color:#00CED1;" class="fas fa-2x fa-plus-square"></i></td>  
                   </tr> 
                    </table> 
                
            </div>
            <div class="modal-footer justify-content-center">
            <input style="background-color:#800000;color:#fff" type="submit" name="submit" value="Send" class="btn btn-dark"/>
                        </div>
        </form>
       </div>
    </div>
</div>
    
<script>
  function go_back(){
           window.history.back();

   }
  function update_application_status(id)
  {
    var select_value=document.getElementById('status').selectedOptions[0].value;
    if(select_value=='1')
        {
          $('#sendmail').hide();
          var email_to="<?php echo $email_to?>";
          var to_name="<?php echo $to_name?>";
          var email_id="<?php echo $email_id?>";
          let form_data=$(this).serializeArray();
          form_data.push({ name:'email_to',value:email_to });
          form_data.push({ name:'id',value:email_id });
          form_data.push({ name:'to_name',value:to_name });
          console.log(form_data);
          $('#spinner').show();
          $.ajax({
           url:"sendmail_acceptance.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
             var result=$.trim(data);
               
            if(result==='Success')
            {
            $('#msg').addClass('alert-success');
            $('#msg').html('Mail sent successfully!');
            window.location.href='experts.php';
           
          }
          if(data==='No')
          {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Error!Could not send mail.');
          }
           
           },
           complete: function(){
        $('#spinner').hide();
         }
           
        });
        }
        else if(select_value=='2')
        {
        $('#sendmail').show();
        }
        else
        {
        $('#sendmail').hide();
        }

  }
    
</script>
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>
 $(document).ready(function() {
    $('#spinner').hide();
});
$('#reject_form').on('submit',function(event){
       event.preventDefault();
       let myForm=document.getElementById("reject_form");
       $('#reject_modal').modal('hide');
       var email_to="<?php echo $email_to?>";
       var to_name="<?php echo $to_name?>";
       var email_id="<?php echo $email_id?>";

       let form_data=$(this).serializeArray();
       form_data.push({ name:'email_to',value:email_to });
       form_data.push({ name:'id',value:email_id });
       form_data.push({ name:'to_name',value:to_name });
       console.log(form_data);
       $('#spinner').show();
       $.ajax({
           url:"sendmail_reject.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
             var result=$.trim(data);
               
            if(result==='Success')
            {
            myForm.reset();
            $('#msg').addClass('alert-success');
            $('#msg').html('Mail sent successfully!');
            sadejkefhke
          }
          if(data==='No')
          {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Error!Could not send mail.');
          }
           
           },
           complete: function(){
        $('#spinner').hide();
         }
           
        });
        
                  
      });

 
 $(document).ready(function(){ 
    $('#sendmail').hide(); 
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="reason[]" placeholder="Enter a reason" class="form-control reason_list" /></td><td><i name="remove" id="'+i+'"class="btn_remove fas fa-2x fa-minus-square" style="color:#800000;"></i></td></tr>');  
      });
            
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
     
  }); 
 </script>
</body>
</html>

