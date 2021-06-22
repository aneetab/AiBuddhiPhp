<?php
include "connection.inc.php";
include "functions.inc.php";
$id='';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $get_post="SELECT * from article_blog where post_id='$id'";
    $post=get_data($con,$get_post);
}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php include "css/admin.css" ?>
        <?php include "css/sme.css"?>
        body{
            overflow-x:scroll;
        }
        .card{
            width:700px!important;
            padding:2px !important;
            
        }
        *{
            box-sizing:border-box;
        }
        
        @media(min-width:768px)
        {
            .parent:{
                display:flex;
            }
        }
    </style>
</head>
<body>
<?php include "outerpageheader.php" ?>
<div class="container mx-auto mt-5" style="padding:5px">
<div><button class="btn btn-primary mt-3 ml-3 mb-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i>All Posts</button></div>
<div class="card mx-auto" style="width:700px">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="<?php echo $post[0]['post_display']?>" class="img-fluid" />
        <a href="#!">
    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
    </div>
    <div class="card-body">
     <h4 class="card-title text-center"><?php echo $post[0]['post_title']?></h4>
     <h5 class="text-muted"><?php echo $post[0]['author'] ?></h5>
      <h6 class="text-muted"><i class="fas fa-calendar-alt"></i> <?php echo date('F j,Y',strtotime($post[0]['post_date'])) ?></h6>
      <?php
      if($post[0]['author_email']!='')
      {
      ?>
       <h6 class="text-muted"><i class="fas fa-envelope"></i> <?php echo $post[0]['author_email']?></h6><br>
       <h6 class="text-muted"><i class="fas fa-tag"></i><?php echo $post[0]['industry']?></h6>
      <?php
      }
      ?>
     <p class="card-text">
     
     <?php echo nl2br(html_entity_decode($post[0]['content']))?>
     </p>
    </div>
    </div>
</div>
<?php include "outerpagefooter.php" ?>



<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    var post_id='<?=$id?>';
    var setviews='setviews';
    $.ajax({
           url:"submit.php",
           method:"POST",
           data:{
             setviews:setviews,
             post_id:post_id,
             
           },
           success:function(data,status){
            
           
          }
           
        });
});
function go_back()
{
    window.history.back();
}
</script>
</body>
</html>
