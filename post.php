<?php
include "connection.inc.php";
include "functions.inc.php";
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $get_post="SELECT * from posts where post_id='$id'";
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
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        <img src="<?php echo $post[0]['image']?>" class="img-fluid" />
        <a href="#!">
    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
    </div>
    <div class="card-body">
     <h5 class="card-title"><?php echo $post[0]['post_title']?></h5>
     <h6 class="text-muted">Posted by <?php echo $post[0]['posted_by'] ?> on <?php echo date('F j,Y',strtotime($post[0]['created_on'])) ?></h6>
     <p class="card-text">
     <?php echo $post[0]['content']?>
     </p>
    </div>
    </div>
</div>

</div>
</div>
<div class="row">
<div class="col">
<div class="comment-box">
No comments

<form action="POST">
<div class="form-group">
<input type="text" name="comment" placeholder="Add comment..">
<input type="submit" value="post" name="submit">
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
<script type="text/javascript">
</script>
</body>
</html>
